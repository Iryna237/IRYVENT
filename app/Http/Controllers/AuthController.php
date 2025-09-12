<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Creator;

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

        User::create([
            'name'         => $request->name, 
            'email'        => $request->email,
            'password'     => Hash::make($request->password),
            'vice_ID_card'    => $vice_card_Path,
            'versa_ID_card'   => $versa_card_Path,
            'face_selfie'  => $face_selfie_Path,
            'face_card'    => $face_card_Path,
            'role'       => 'creator',
        ]);

        return redirect()->route('home')->with('success', 'Creator registration successful!');
    }
    public function Showlogin ()
    {
        return view('login');
    }   
    public function Formlogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            $user = Auth::user(); 

            session([
                'user_id' => $user->id, 
                'user_name' => $user->name, 
                'user_role' => $user->role
            ]);
            
            if ($user->role === 'admin') {
                return redirect()->route('admin-dashboard');
            } elseif ($user->role === 'creator') {
                return redirect()->route('creator-dashboard');
            } else {
                return redirect()->route('home');
            }
        }

        return back()->withErrors([
            'email' => 'Les identifiants fournis ne correspondent pas à nos enregistrements.',
        ])->onlyInput('email');
    }

        public function admin_vue()
    {
        $demandes = Demande::orderBy('created_at', 'desc')->paginate(10);
        $users = User::orderBy('created_at', 'desc')->paginate(10);

        $nbClients = User::where('role', 'client')->count();
        $nbVendeurs = Vendeur::count();
        $nbLivreurs = User::where('role', 'livreur')->count();
        $nbUsersTotal = User::count();


        return view('pages.admin.utilisateur', compact('demandes', 'users', 'nbClients', 'nbVendeurs', 'nbLivreurs', 'nbUsersTotal'));
    }

    public function show_demande($id)
    {
        $demande = Demande::findOrFail($id);
        return view('pages.admin.details_demande', compact('demande'));
    }
    public function valider_demande($id){
        $demande = Demande::findOrFail($id);

        $demande->status = 'validee';
        $demande->save();

        $user = $demande->user;
        $user->role = $demande->type_demande;
        $user->save();

        Mail::to($user->email)->send(new CompteValideMail($user));

        if ($demande->type_demande === 'vendeur') {
            $vendeur = Vendeur::updateOrCreate(
                ['user_id' => $user->id], 
                [
                    'complet_nom' => $demande->complet_nom,
                    'telephone' => $demande->telephone,
                    'adresse' => $demande->adresse,
                    'ville' => $demande->ville,
                    'pays' => $demande->pays,
                    'photo_profil' => $demande->photo_selfie, 
                    'cni_recto' => $demande->cni_recto,
                    'cni_verso' => $demande->cni_verso,
                    'registre_commerce' => $demande->registre_commerce,
                ]
            );

            Wallet::create([
                'vendeur_id' => $vendeur->id,
                'solde_total' => 0,
                'solde_disponible' => 0,
                'solde_attente' => 0,
                'solde_retire' => 0,
            ]);

        return redirect()->back()->with('success', 'Le compte a été validé et un email envoyé.');

        }

        if ($demande->type_demande === 'livreur') {
            Livreur::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'complet_nom' => $demande->complet_nom,
                    'telephone' => $demande->telephone,
                    'adresse' => $demande->adresse,
                    'ville' => $demande->ville,
                    'pays' => $demande->pays,
                    'photo_profil' => $demande->photo_selfie,
                    'cni_recto' => $demande->cni_recto,
                    'cni_verso' => $demande->cni_verso,
                    'permis_conduire_recto' => $demande->permis_conduire_recto,
                    'permis_conduire_verso' => $demande->permis_conduire_verso,
                    'type_vehicule' => $demande->type_vehicule,
                    'plaque_vehicule' => $demande->plaque_vehicule,
                    'photo_vehicule' => $demande->photo_vehicule,
                ]
        
        );
        }
        return redirect()->route('admin.utilisateur')->with('success', 'La demande a été validée avec succès.');
    }

    public function refuser_demande($id){

        $demande = Demande::findOrFail($id);
        $demande->status = 'rejete';
        $demande->save();

        return redirect()->route('admin.utilisateur')->with('error', 'La demande a été rejetée.');
        
    }
}