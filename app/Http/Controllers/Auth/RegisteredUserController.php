<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register'); // بنستخدم فورم واحدة عامة
    }

    public function store(Request $request)
    {
        // لازم email يتبعت ويتحفظ ف users.email
        $validated = $request->validate([
            'name'     => ['required','string','max:255'],
            'email'    => ['required','string','lowercase','email','max:255','unique:users,email'],
            'password' => ['required','string','min:8','confirmed'],
        ]);

        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
            'is_admin' => 0,  // عدّليها لو عايزة
        ]);

        Auth::login($user);

        return redirect()->intended(route('dashboard'));
    }
}
