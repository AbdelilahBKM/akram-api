<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Eager load categories to include them in the response
        $produits = Produit::with('categorie')->get();
        return response()->json($produits);
    }

    public function produits_en_promo()
    {
        $produits = Produit::with('categorie')->where('en_promotion', true)->get();
        foreach ($produits as $produit) {
            if ($produit->date_limit_promotion && Carbon::parse($produit->date_limit_promotion)->isPast()) {
                $produit->en_promotion = false;
                $produit->remise = 0;
                $produit->date_limit_promotion = null;
                $produit->save();
            }
        }

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
            'image_produit' => 'required|string',
            'image_url' => 'required|string',
            'description' => 'nullable|max:255',
            'prix' => 'required|numeric',
            'en_promotion' => 'required|boolean',
            'remise' => 'nullable|numeric',
            'date_limit_promotion' => 'nullable|date',
            'categorie' => 'required|exists:categories,id',
        ]);

        // Create a new product
        $produit = Produit::create([
            'nom_produit' => $validatedData['nom_produit'],
            'image_produit' => $validatedData['image_produit'],
            'image_url' => $validatedData['image_url'],
            'description' => $validatedData['description'],
            'prix' => $validatedData['prix'],
            'en_promotion' => $validatedData['en_promotion'],
            'remise' => $validatedData['remise'] ?? 0,
            'date_limit_promotion' => $validatedData['date_limit_promotion'] ?? null,
            'categorie' => $validatedData['categorie']
        ]);

        return response()->json($produit, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Find product with related categories
        $produit = Produit::with('categorie')->findOrFail($id);
        return response()->json($produit);
    }
    public function show_by_categorie_parent($id)
    {
        // Retrieve products where the category ID or parent category ID matches
        $produits = Produit::with('categorie')
            ->whereHas('categorie', function ($query) use ($id) {
                $query->where('id', $id)
                    ->orWhere('parent_categorie', $id);
            })
            ->get();

        return response()->json($produits);
    }
    public function show_by_categorie($id)
    {
        $produits = Produit::with('categorie')
            ->whereHas('categorie', function ($query) use ($id) {
                $query->where('id', $id);
            })
            ->get();
        return response()->json($produits);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $produit = Produit::findOrFail($id);

        $validatedData = $request->validate([
            'nom_produit' => 'required|max:255|unique:produits,nom_produit,' . $produit->id,
            'image_produit' => 'nullable|string',
            'image_url' => 'nullable|string',
            'description' => 'nullable|max:255',
            'prix' => 'required|numeric',
            'categories' => 'nullable|array',
            'categories.*' => 'exists:categories,id',
            'en_promotion' => 'required|boolean',
            'remise' => 'nullable|numeric',
            'date_limit_promotion' => 'nullable|date',
            'categorie' => 'required|exists:categories,id',
        ]);

        $produit->update([
            'nom_produit' => $validatedData['nom_produit'],
            'image_produit' => $validatedData['image_produit'] ?? $produit->image_produit,
            'image_url' => $validatedData['image_url'] ?? $produit->image_url,
            'description' => $validatedData['description'],
            'prix' => $validatedData['prix'],
            'en_promotion' => $validatedData['en_promotion'],
            'remise' => $validatedData['remise'] ?? 0,
            'date_limit_promotion' => $validatedData['date_limit_promotion'] ?? null,
            'categorie' => $validatedData['categorie']
        ]);

        return response()->json($produit);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $produit = Produit::findOrFail($id);
        if ($produit->image_produit) {
            $imagePath = 'images/' . $produit->image_produit;
            if (Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
        }
        $produit->delete();

        return response()->json(null, 204);
    }
}
