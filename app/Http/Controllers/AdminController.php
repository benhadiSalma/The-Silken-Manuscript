<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();

        return view('admin.dashboard', compact('users'));
    }

    public function toggleRole(User $user)
    {
        if ($user->id === auth()->id()) {
            return back()->with('error', 'You cannot demote yourself, Grand Archivist.');
        }

        $user->is_admin = ! $user->is_admin;
        $user->save();

        return back()->with('success', "Role updated for {$user->name}.");
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['nullable', 'string', 'max:255', 'unique:users,username'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'birthday' => ['nullable', 'date'],
            'bio' => ['nullable', 'string', 'max:1000'],
            'password' => ['required', Rules\Password::defaults()],
            'is_admin' => ['nullable'],
        ]);

        User::create([
            'name' => $validated['name'],
            'username' => $validated['username'] ?? null,
            'email' => $validated['email'],
            'birthday' => $validated['birthday'] ?? null,
            'bio' => $validated['bio'] ?? null,
            'password' => $validated['password'],
            'is_admin' => $request->has('is_admin'),
        ]);

        return back()->with('success', 'New reader has been added to the archive.');
    }
}