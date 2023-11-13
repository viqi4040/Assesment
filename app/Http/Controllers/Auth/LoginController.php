<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
	{
		$request->validate([
			'email' => 'required|email',
			'password' => 'required',
		]);

		$credentials = $request->only('email', 'password');

		// Retrieve the user based on the provided email
		$user = User::where('email', $credentials['email'])->first();

		if (!$user || !Hash::check($credentials['password'], $user->password)) {
			// Authentication failed...
			return redirect()->route('login')->withErrors(['error' => 'Invalid credentials']); // Redirect back with an error message
		}

		// Check the role of the user
		$role = $user->role_id;

		// Assuming default role for Polio Worker is 2
		if ($role != 1 && $role != 2) {
			// Invalid role...
			return redirect()->route('login')->withErrors(['error' => 'Invalid role']); // Redirect back with an error message
		}

		// Authentication passed...
		Auth::login($user, $request->remember);

		// Redirect based on role
		return redirect($role == 1 ? '/adminDashboard' : '/workerDashboard');
	}



	public function logout(Request $request)
	{
		Auth::logout();

		$request->session()->invalidate();

		$request->session()->regenerateToken();

		return redirect('/');
	}
}
