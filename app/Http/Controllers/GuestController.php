<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class GuestController extends Controller
{
    //

    public function loginAsGuest(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Create a guest user without email
        $guestUser = User::create([
            'name' => $request->name,
            'role' => 'guest',
        ]);

        // Log in the guest user
        Auth::login($guestUser);

        // Redirect to the dashboard
        return redirect()->route('dashboard');
    }
}
