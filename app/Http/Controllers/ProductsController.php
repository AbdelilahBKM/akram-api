<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Eager load categories to include them in the response
        $produits = Produit::with('categories')->get();
        return response()->json($produits);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'nom_produit' => 'required|unique:produits,nom_produit|max:255',
            'image_produit' => 'nullable|string',
            'description' => 'nullable|max:255',
            'prix' => 'required|numeric',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
        ]);

        // Create a new product
        $produit = Produit::create([
            'nom_produit' => $validatedData['nom_produit'],
            'image_produit' => $validatedData['image_produit'] ?? null,
            'description' => $validatedData['description'],
            'prix' => $validatedData['prix'],
        ]);

        // Sync categories with the product
        $produit->categories()->sync($validatedData['categories']);

        return response()->json($produit, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Find product with related categories
        $produit = Produit::with('categories')->findOrFail($id);
        return response()->json($produit);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Find the product
        $produit = Produit::findOrFail($id);

        // Validate incoming request data
        $validatedData = $request->validate([
            'nom_produit' => 'required|max:255|unique:produits,nom_produit,' . $produit->id,
            'image_produit' => 'nullable|string',
            'description' => 'nullable|max:255',
            'prix' => 'required|numeric',
            'categories' => 'nullable|array',
            'categories.*' => 'exists:categories,id',
        ]);

        // Update the product
        $produit->update([
            'nom_produit' => $validatedData['nom_produit'],
            'image_produit' => $validatedData['image_produit'] ?? $produit->image_produit,
            'description' => $validatedData['description'],
            'prix' => $validatedData['prix'],
        ]);

        // Sync categories if provided
        if (isset($validatedData['categories'])) {
            $produit->categories()->sync($validatedData['categories']);
        }

        return response()->json($produit);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the product
        $produit = Produit::findOrFail($id);

        // Optionally delete associated image if needed
        if ($produit->image_produit) {
            // Prepend the directory path where images are stored
            $imagePath = 'images/' . $produit->image_produit;

            // Check if the file exists before attempting to delete
            if (Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
        }

        // Detach categories and delete the product
        $produit->categories()->detach();
        $produit->delete();

        return response()->json(null, 204);
    }
}
