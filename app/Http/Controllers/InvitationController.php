<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Models\User;
use App\Mail\InvitationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class InvitationController extends Controller
{
    public function invite(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email|unique:invitations,email',
        ]);

        $token = bin2hex(random_bytes(32)); 
        Invitation::create(['email' => $request->email, 'token' => $token]);

        Mail::to($request->email)->send(new InvitationMail($token));

        return redirect()->back()->with('success', 'Invitation sent!');
    }

    public function accept($token)
    {
        $invitation = Invitation::where('token', $token)->firstOrFail();
    
        return view('auth.register', ['email' => $invitation->email, 'token' => $token]);
    }
    
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|exists:invitations,email',
            'password' => 'required|confirmed',
        ]);

        $invitation = Invitation::where('token', $request->token)->firstOrFail();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'Employee', 
        ]);
        
        Invitation::where('email', $request->email)->delete();

        Auth::login($user);

        return redirect()->route('home');
    }
}
