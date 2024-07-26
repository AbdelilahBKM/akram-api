<?php

namespace App\Http\Controllers;

use App\Models\SubCategorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubCategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subCategories = SubCategorie::all();
        return response()->json($subCategories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'valeur_sous_categorie' => 'required|unique:sub_categories',
            'nom_sous_categorie' => 'required',
            'description' => 'required',
            'categorie' => 'required|exists:categories,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $subCategorie = SubCategorie::create($request->all());
        return response()->json($subCategorie, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $subCategorie = SubCategorie::find($id);

        if (!$subCategorie) {
            return response()->json(['message' => 'Sub-category not found'], 404);
        }

        return response()->json($subCategorie);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $subCategorie = SubCategorie::find($id);

        if (!$subCategorie) {
            return response()->json(['message' => 'Sub-category not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'valeur_sous_categorie' => 'required|unique:sub_categories,valeur_sous_categorie,' . $id,
            'nom_sous_categorie' => 'required',
            'description' => 'required',
            'categorie' => 'required|exists:categories,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $subCategorie->update($request->all());
        return response()->json($subCategorie);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subCategorie = SubCategorie::find($id);

        if (!$subCategorie) {
            return response()->json(['message' => 'Sub-category not found'], 404);
        }

        $subCategorie->delete();
        return response()->json(['message' => 'Sub-category deleted successfully']);
    }
}
