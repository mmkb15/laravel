<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PasswordController extends Controller
{
    public function requestForm(): View
    {
        return view('admin.pages.auth.forgot-password');
    }

    public function sendResetLink(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'email' => ['required', 'email'],
        ]);

        $status = Password::sendResetLink($data);

        if ($status === Password::RESET_LINK_SENT || $status === Password::INVALID_USER) {
            return back()->with(
                'status',
                'If an account exists for that email address, a password reset link will be sent.'
            );
        }

        return back()->withErrors(['email' => __($status)]);
    }

    public function resetForm(string $token): RedirectResponse
    {
        $resetUrl = rtrim(config('app.frontend_url'), '/').'/reset-password?'.http_build_query([
            'token' => $token,
            'email' => request()->query('email'),
        ]);

        return redirect()->away($resetUrl);
    }

    public function reset(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'token' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $resetUser = null;
        $status = Password::reset($data, function (User $user, string $password) use (&$resetUser): void {
            $user->forceFill([
                'password' => $password,
                'remember_token' => Str::random(60),
            ])->save();

            event(new PasswordReset($user));
            $resetUser = $user;
        });

        if ($status !== Password::PASSWORD_RESET || ! $resetUser) {
            return back()->withErrors(['email' => __($status)]);
        }

        Auth::login($resetUser);
        $request->session()->regenerate();

        $destination = $resetUser->isAdmin()
            ? route('dashboard')
            : rtrim(config('app.frontend_url'), '/').'/account';

        return redirect()->away($destination)->with('success', 'Your password has been reset.');
    }
}
