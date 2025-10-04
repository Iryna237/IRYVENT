<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Creator;
use App\Models\Demande;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $total_custumer = User::where('role', 'customer')->count();
        $total_creator = Creator::count();
        $total_users = User::count();
        $total_new_user = User::count('created_at', 'desc');
        
        $demandes = Demande::orderBy('created_at', 'desc')->paginate(10);

        $users = User::orderBy('created_at', 'desc')->paginate(10);

        return view('Users', compact('demandes', 'users', 'total_custumer', 'total_users', 'total_creator', 'total_new_user'));

    }

        public function showDemandes()
    {
            $demandes = Demande::where('status', 'pending')
        ->orderBy('created_at', 'desc')
        ->paginate(10);

    return view('demandes_index', compact('demandes'));
    }

        public function showDemande(Demande $demande)
    {
        return view('edit-demande', compact('demande'));
    }

    public function validateCreator($demandeId)
    {
        $demande = Demande::findOrFail($demandeId);
        
        $user = User::create([
            'name' => $demande->name,
            'email' => $demande->email,
            'password' => $demande->password,
            'role' => 'creator',
        ]);

        Creator::create([
            'user_id' => $user->id,
            'name' => $demande->name,
            'email' => $demande->email,
        ]);

        $demande->update(['status' => 'approved']);

        return redirect()->back()->with('success', 'Créateur validé avec succès !');
    }

    public function rejectCreator($demandeId)
    {
        $demande = Demande::findOrFail($demandeId);
        $demande->update(['status' => 'rejected']);
        
        return redirect()->back()->with('success', 'Demande créateur rejetée.');
    }
    public function refuseDemande(Demande $demande)
    {
        // Update the request status
        $demande->status = 'refused';
        $demande->save();

        return redirect()->route('admin.demandes.index')->with('success', 'La demande a été refusée.');
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\View\View
     */
    public function edit(string $id)
    {
         // Find the user by ID or throw a 404 error
        $user = User::findOrFail($id);
        
        // Return a view with the user data for the edit form
        return view('edit-users', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        // This method will be triggered by a form submission on the 'edit-user' page
        $user = User::findOrFail($id);
        
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|string|in:admin,creator,customer',
        ]);
        
        // Update the user with the validated data
        $user->update($validated);
        
        // Redirect back to the users list with a success message
        return redirect()->route('admin.users.index')->with('success', 'Utilisateur mis à jour avec succès !');
    }

    /**
      * Remove the specified resource from storage.
     * @param  string  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(string $id)
    {
        // Find the user by ID and delete it
        $user = User::findOrFail($id);
        $user->delete();
        
        // Redirect back to the users list with a success message
        return redirect()->route('admin.users.index')->with('success', 'Utilisateur supprimé avec succès !');
    }
}
