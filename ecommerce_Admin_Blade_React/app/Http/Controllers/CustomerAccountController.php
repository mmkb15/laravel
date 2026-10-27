<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CustomerAccountController extends Controller
{
    public function index(): View
    {
        $customer = Auth::user();
        $orders = $customer->orders()->latest()->paginate(10);

        return view('frontend.pages.account.index', compact('customer', 'orders'));
    }

    public function showOrder(int $order): View
    {
        $customerOrder = Auth::user()
            ->orders()
            ->with('items')
            ->whereKey($order)
            ->firstOrFail();

        return view('frontend.pages.account.order', compact('customerOrder'));
    }

    public function updateProfile(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'address' => ['nullable', 'string'],
        ]);

        Auth::user()->update($data);

        return redirect()->route('account.index')->with('success', 'Your account details have been updated.');
    }
}
