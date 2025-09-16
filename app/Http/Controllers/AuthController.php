<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Creator;
use App\Models\Demande;


use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function Showregister()
    {
        return view('signup');
    }

    public function Formregistercustomer(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'role' => 'string',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'       => 'customer',
        ]);

        return redirect()->route('home')->with('success', 'Customer registration successful!');
    }

    public function Formregistercreator(Request $request)
    {
        $request->validate([
            'name'          => 'required',
            'email'         => 'required|email|unique:creators,email',
            'password'      => 'required|min:6|confirmed',
            'vice_ID_card'     => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
            'versa_ID_card'    => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
            'face_selfie'   => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
            'face_card'     => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
             'role' => 'string',
        ]);

        $vice_card_Path   = $request->file('vice_ID_card')->store('ID_card', 'public');
        $versa_card_Path  = $request->file('versa_ID_card')->store('ID_card', 'public');
        $face_selfie_Path = $request->file('face_selfie')->store('face_selfie', 'public');
        $face_card_Path   = $request->file('face_card')->store('face_card', 'public');

        Demande::create([
            'name'         => $request->name, 
            'email'        => $request->email,
            'password'     => Hash::make($request->password),
            'vice_ID_card'    => $vice_card_Path,
            'versa_ID_card'   => $versa_card_Path,
            'face_selfie'  => $face_selfie_Path,
            'face_card'    => $face_card_Path,
            'status'       => 'pending',
        ]);

        return redirect()->route('home')->with('success', 'Creator registration successful!');
    }
    public function Showlogin ()
    {
        return view('login');
    }   

    public function Formlogin (Request $request){
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user()->fresh();
            session(['user_id' => $user->id, 'user_name' => $user->name, 'user_role' => $user->role]);
            
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role === 'creator') {
                return redirect()->route('creator.dashboard');
            } else {
                return redirect()->route('home');
            }
        }
        // Ajoutez une redirection en cas d'échec d'authentification
        return redirect()->back()->withErrors(['email' => 'Identifiants invalides.']);
    }
}