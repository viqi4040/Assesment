<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UnionCouncil;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
			'phone' => 'required|string|max:20',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:1,2', // Ensure the selected role is either 1 or 2
        ]);

        User::create([
            'role_id' => $request->input('role'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
			'contact_number' => $request->input('phone'),
			'union_council_id' => $request->input('union_council'),
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect('/login')->with('success', 'Registration successful. You can now log in.');
    }
	
	public function unionCouncils()
	{
		$ucs = UnionCouncil::all(['id', 'name']); // Fetch only the necessary columns
		return response()->json($ucs);
	}
}