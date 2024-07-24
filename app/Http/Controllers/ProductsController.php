<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produits = Produit::with('categorie')->get();
        return response()->json($produits);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom_produit' => 'required|unique:produits|max:255',
            'image_produits' => 'required|unique:produits|max:255',
            'description' => 'nullable|max:255',
            'prix' => 'required|numeric',
            'categorie' => 'required|exists:categories,id',
        ]);

        $produit = Produit::create([
            'nom_produit' => $validatedData['nom_produit'],
            'image_produits' => $validatedData['image_produits'],
            'description' => $validatedData['description'],
            'prix' => $validatedData['prix'],
            'categorie' => $validatedData['categorie'],
        ]);

        $produit->load('categorie');

        return response()->json($produit, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produit = Produit::with('categorie')->findOrFail($id);
        return response()->json($produit);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $produit = Produit::findOrFail($id);

        $validatedData = $request->validate([
            'nom_produit' => 'required|max:255|unique:produits,nom_produit,' . $produit->id,
            'image_produits' => 'required|max:255|unique:produits,image_produits,' . $produit->id,
            'description' => 'nullable|max:255',
            'prix' => 'required|numeric',
            'categorie' => 'required|exists:categories,id',
        ]);

        $produit->update($validatedData);

        $produit->load('categorie');

        return response()->json($produit);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produit = Produit::findOrFail($id);
        $produit->delete();

        return response()->json(null, 204);
    }
}