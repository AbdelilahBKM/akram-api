<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categorie::all();
        return response()->json($categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom_categorie' => 'required|unique:categories|max:255',
            'description_categorie' => 'nullable|max:255',
        ]);

        $categorie = Categorie::create([
            'nom_categorie' => $validatedData['nom_categorie'],
            'description_categorie' => $validatedData['description_categorie'],
        ]);

        return response()->json($categorie, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categorie = Categorie::findOrFail($id);
        return response()->json($categorie);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categorie = Categorie::findOrFail($id);

        $validatedData = $request->validate([
            'nom_categorie' => 'required|max:255|unique:categories,nom_categorie,' . $categorie->id,
            'description_categorie' => 'nullable|max:255',
        ]);

        $categorie->update($validatedData);

        return response()->json($categorie);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categorie = Categorie::findOrFail($id);
        $categorie->delete();

        return response()->json(null, 204);
    }
}
