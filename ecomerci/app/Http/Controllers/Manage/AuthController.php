<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('manage.page.auth.login');
    }

    public function login(Request $request)
    {
        // Validate the form data
        $request->validate([
            'phone' => 'required|string',
            'password' => 'required|string',
        ]);

        // Attempt to log the user in
        $user = User::where('phone', $request->phone)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Log the user in
            Auth::login($user);
            return redirect()->intended('dashboard'); // or wherever you want to redirect
        }

        // If login fails, redirect back with an error message
        return redirect()->back()->withErrors(['phone' =>  __('auth.password')]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
