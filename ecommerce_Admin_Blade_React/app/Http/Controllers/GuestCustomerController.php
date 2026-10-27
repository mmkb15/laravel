<?php

namespace App\Http\Controllers;

use App\Models\GuestCustomer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class GuestCustomerController extends Controller
{
    public function index(Request $request): View
    {
        $search = '%'.$request->input('search').'%';
        $guestCustomers = GuestCustomer::query()
            ->withCount('orders')
            ->withMax('orders', 'created_at')
            ->when($request->filled('search'), function ($query) use ($search): void {
                $query->where(function ($customerQuery) use ($search): void {
                    $customerQuery
                        ->where('name', 'like', $search)
                        ->orWhere('phone', 'like', $search)
                        ->orWhere('email', 'like', $search);
                });
            })
            ->orderByDesc('orders_max_created_at')
            ->paginate(10)
            ->withQueryString();

        return view('admin.pages.user.guests', compact('guestCustomers'));
    }

    public function edit(GuestCustomer $guestCustomer): View
    {
        return view('admin.pages.user.guest-edit', compact('guestCustomer'));
    }

    public function update(Request $request, GuestCustomer $guestCustomer): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => [
                'required',
                'string',
                'max:255',
                Rule::unique('guest_customers', 'phone')->ignore($guestCustomer->id),
            ],
            'address' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $previousImage = $guestCustomer->image;
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('guest-customers', 'public');
        } else {
            unset($data['image']);
        }

        $guestCustomer->update($data);

        if (isset($data['image']) && $previousImage) {
            Storage::disk('public')->delete($previousImage);
        }

        return redirect()
            ->route('users.guests')
            ->with('success', 'Guest customer updated successfully.');
    }

    public function destroy(GuestCustomer $guestCustomer): RedirectResponse
    {
        $image = $guestCustomer->image;
        $guestCustomer->delete();

        if ($image) {
            Storage::disk('public')->delete($image);
        }

        return redirect()
            ->route('users.guests')
            ->with('success', 'Guest customer deleted. Their order history has been preserved.');
    }
}
