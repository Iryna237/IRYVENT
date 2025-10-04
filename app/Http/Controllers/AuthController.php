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
            'email'         => 'required|email|unique:users,email|unique:demandes,email',
            'password'      => 'required|min:6|confirmed',
            'vice_ID_card'  => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
            'versa_ID_card' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
            'face_selfie'   => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
            'face_card'     => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
        ]);

        $vice_card_Path   = $request->file('vice_ID_card')->store('ID_card', 'public');
        $versa_card_Path  = $request->file('versa_ID_card')->store('ID_card', 'public');
        $face_selfie_Path = $request->file('face_selfie')->store('face_selfie', 'public');
        $face_card_Path   = $request->file('face_card')->store('face_card', 'public');

        Demande::create([
            'name'         => $request->name, 
            'email'        => $request->email,
            'password'     => Hash::make($request->password),
            'vice_ID_card' => $vice_card_Path,
            'versa_ID_card'=> $versa_card_Path,
            'face_selfie'  => $face_selfie_Path,
            'face_card'    => $face_card_Path,
            'status'       => 'pending',
        ]);

        return redirect()->route('home')->with('success', 'Votre inscription créateur est en attente de validation par l\'administrateur.');
    }
    public function Showlogin ()
    {
        return view('login');
    }   

    public function Formlogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $email = $request->email;
        $password = $request->password;

        \Log::info('Login attempt', ['email' => $email]);

        // Vérifier UNIQUEMENT dans la table User
        $user = User::where('email', $email)->first();

        if (!$user) {
            \Log::warning('User not found in users table', ['email' => $email]);
            
            // Vérifier si c'est une demande en attente
            $demande = Demande::where('email', $email)->where('status', 'pending')->first();
            if ($demande) {
                return back()->withErrors(['email' => 'Votre compte créateur est en attente de validation par l\'administrateur.']);
            }
            
            return back()->withErrors(['email' => 'Utilisateur non trouvé.']);
        }

        \Log::info('User found in users table', [
            'id' => $user->id,
            'email' => $user->email,
            'role' => $user->role
        ]);

        // Tenter la connexion
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $user = Auth::user();
            
            \Log::info('Login successful', [
                'user_id' => $user->id,
                'role' => $user->role
            ]);

            // Nettoyer le rôle
            $role = $this->cleanRole($user->role);

            session([
                'user_id' => $user->id,
                'user_name' => $user->name,
                'user_email' => $user->email,
                'user_role' => $role
            ]);

            // Redirection basée sur le rôle
            if ($role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($role === 'creator') {
                return redirect()->route('creator.dashboard');
            } else {
                return redirect()->route('home');
            }
        }

        \Log::warning('Login failed - password incorrect', ['email' => $email]);
        return back()->withErrors(['email' => 'Email ou mot de passe incorrect.']);
    }

    private function cleanRole($role)
    {
        if (empty($role)) return 'user';
        
        $role = trim($role);
        $role = strtolower($role);
        $role = preg_replace('/[^a-z]/', '', $role);
        
        return $role ?: 'user';
    }
}