<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all categories with their children
        $categories = Categorie::with('children')->get();
        return response()->json($categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'nom_categorie' => 'required|string|max:255|unique:categories,nom_categorie',
            'description_categorie' => 'nullable|string', 
            'parent_categorie' => 'nullable|exists:categories,id',
        ]);

        $categorie = Categorie::create($validatedData);

        return response()->json($categorie, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Find the category with its children
        $categorie = Categorie::with('children')->findOrFail($id);
        return response()->json($categorie);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Find the category
        $categorie = Categorie::findOrFail($id);

        // Validate incoming request data
        $validatedData = $request->validate([
            'nom_categorie' => 'required|string|max:255|unique:categories,nom_categorie,' . $categorie->id,
            'description_categorie' => 'nullable|string', 
            'parent_categorie' => 'nullable|exists:categories,id',
        ]);

        // Update the category
        $categorie->update($validatedData);

        return response()->json($categorie);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the category
        $categorie = Categorie::findOrFail($id);

        // Optionally handle subcategories
        $categorie->children()->delete();

        // Delete the category
        $categorie->delete();

        return response()->json(null, 204);
    }
}
