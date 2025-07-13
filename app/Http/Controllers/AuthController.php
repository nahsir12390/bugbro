<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'name'=>'required|min:6|max:200',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        
      
if (auth()->attempt($validatedData)) {
    request()->session()->regenerate();
    return redirect()->route('show.post')->with('success', 'Login successful!');
}
return redirect()->back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
           'name' => 'required|string|min:6|max:200|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        // Create the user
        $user=User::create($validatedData);


        return redirect()->route('show.login')->with('success', 'Registration successful!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        
$request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home')->with('success', 'Logged out successfully.');

    }
}
