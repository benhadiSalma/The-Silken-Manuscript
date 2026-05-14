<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'bio' => 'nullable|string|max:1000',
            'birthday' => 'nullable|date',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $user = $request->user();

        if ($request->hasFile('profile_picture')) {
            $image = $request->file('profile_picture');

            $filename = time() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('avatars'), $filename);

            $user->profile_picture = $filename;
        }

        $user->bio = $request->input('bio');
        $user->birthday = $request->input('birthday');

        $user->save();

        return Redirect::route('profile')->with('status', 'profile-updated');
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

        return back()->with('success', 'Profile updated successfully.');
    }

    /**
     * Display a public profile page.
     */
    public function showPublic(User $user): View
    {
        $user->load('favorites');

        return view('profile-public', compact('user'));
    }
}