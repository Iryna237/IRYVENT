<?php

namespace App\Http\Controllers;

use App\Models\Contributors;
use Illuminate\Http\Request;

class ContributorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Validation des données
        $validator = Validator::make($request->all(), [
            'fields.*.name' => 'required|string|max:255',
            'fields.*.surname' => 'nullable|string|max:255',
            'fields.*.status' => 'required|string|max:255',
            'event_id' => 'required|numeric|exists:events,id',
        ]);

        // Vérifier si la validation a échoué
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        // Récupérer les données validées
        $validatedData = $validator->validated();

        // Vérifier si la clé 'fields' existe
        if (!isset($validatedData['fields'])) {
            return response()->json([
                'error' => 'Missing fields data'
            ], 400);
        }

        // Insérer les données dans la base de données
        $speaker = [];
        foreach ($validatedData['fields'] as $field) {
            $speaker[] = Speakers::create([
                'name' => $field['name'],  
                'surname' => $field['surname'] ?? null,  
                'status' => $field['status'],
                'event_id' => $validatedData['event_id'],  // Ajouter l'id de l'événement
            ]);
        }

        return response()->json([
            'message' => 'Speakers ajoutés avec succès!',
            'data' => $speaker
        ], 201);
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
    public function show(Contributors $contributors)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contributors $contributors)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contributors $contributors)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contributors $contributors)
    {
        //
    }
}
