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

// Dans votre AuthController ou LoginController
    public function Formlogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        
        \Log::info('Login attempt', ['email' => $request->email]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            
            // FORCE le rechargement depuis la base de données
            $user = $user->fresh();
            
            \Log::info('User authenticated', [
                'user_id' => $user->id,
                'email' => $user->email,
                'role' => $user->role,
                'role_hex' => bin2hex($user->role)
            ]);

            // Nettoyage AGGRESSIF du rôle
            $role = trim($user->role);
            $role = strtolower($role);
            $role = preg_replace('/[^a-z]/', '', $role); // Supprime tout sauf les lettres
            
            \Log::info('Processed role', [
                'original_role' => $user->role,
                'cleaned_role' => $role
            ]);

            // Stocker en session
            session([
                'user_id' => $user->id,
                'user_name' => $user->name,
                'user_email' => $user->email,
                'user_role' => $role
            ]);

            // Redirection BASÉE SUR LA SESSION pour plus de fiabilité
            switch ($role) {
                case 'admin':
                    \Log::info('Redirecting to admin dashboard');
                    return redirect()->route('admin.dashboard');
                case 'creator':
                    \Log::info('Redirecting to creator dashboard');
                    return redirect()->route('creator.dashboard');
                default:
                    \Log::info('Redirecting to home');
                    return redirect()->route('home');
            }
        }

        \Log::warning('Login failed', ['email' => $request->email]);
        return back()->withErrors(['email' => 'Identifiants invalides.']);
    }
}