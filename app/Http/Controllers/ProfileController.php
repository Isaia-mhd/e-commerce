<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{


    public function index()
    {
        $user = auth()->user();
        return view("auth.profile", compact("user"));
    }
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        $request->validate([
            "name" => "string",
            "email" => "email|string",
            "delivery_address" => "string|min:5",
            "phone" => "string|min:8",
        ]);

        // dd($request);
        $user->update([
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "delivery_address" => $request->delivery_address,

        ]);

        return redirect()->back()->with('success', 'Profile Saved');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function changePassword(Request $request, User $user)
    {
        $request->validate([
            "current_password" => "required|string",
            "new_password" => "required|string|confirmed"
        ]);

        if(!$user->google_id)
        {
            if(!Hash::check($request->currentPassword, $user->password))
            {
                return redirect()->back()->with("error", "Current Password incorrect");
            }
        }

        $user->update([
            "password" => Hash::make($request->new_password)
        ]);

        return redirect()->back()->with('success', 'Password changed.');


    }

}
