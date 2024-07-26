<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductsSeeder extends Seeder
{
    public function run()
    {
        // Define product data
        $products = [
            // tissus
            // => Tissus Roumie moin de 40 dh
            ['nom_produit' => 'Tissu Velours', 'description' => 'Tissu Velours', 'prix' => 40.00, 'sub_categorie' => 1],
            ['nom_produit' => 'Tissu Velours', 'description' => 'Tissu Velours', 'prix' => 40.00, 'sub_categorie' => 1],
            ['nom_produit' => 'Tissu Velours', 'description' => 'Tissu Velours', 'prix' => 40.00, 'sub_categorie' => 1],
            ['nom_produit' => 'Tissu Velours', 'description' => 'Tissu Velours', 'prix' => 40.00, 'sub_categorie' => 1],
            ['nom_produit' => 'Tissu Velours', 'description' => 'Tissu Velours', 'prix' => 40.00, 'sub_categorie' => 1],
            ['nom_produit' => 'Tissu Velours', 'description' => 'Tissu Velours', 'prix' => 40.00, 'sub_categorie' => 1],
            ['nom_produit' => 'Tissu Velours', 'description' => 'Tissu Velours', 'prix' => 40.00, 'sub_categorie' => 1],
            ['nom_produit' => 'Tissu Velours', 'description' => 'Tissu Velours', 'prix' => 40.00, 'sub_categorie' => 1],
            ['nom_produit' => 'Tissu Velours', 'description' => 'Tissu Velours', 'prix' => 40.00, 'sub_categorie' => 1],
            ['nom_produit' => 'Tissu Velours', 'description' => 'Tissu Velours', 'prix' => 40.00, 'sub_categorie' => 1],
            ['nom_produit' => 'Tissu Velours', 'description' => 'Tissu Velours', 'prix' => 40.00, 'sub_categorie' => 1],
            ['nom_produit' => 'Tissu Velours', 'description' => 'Tissu Velours', 'prix' => 40.00, 'sub_categorie' => 1],
            ['nom_produit' => 'Tissu Velours', 'description' => 'Tissu Velours', 'prix' => 40.00, 'sub_categorie' => 1],
            ['nom_produit' => 'Tissu Velours', 'description' => 'Tissu Velours', 'prix' => 40.00, 'sub_categorie' => 1],
            ['nom_produit' => 'Tissu Velours', 'description' => 'Tissu Velours', 'prix' => 40.00, 'sub_categorie' => 1],
            // => Tissus Roumie plus de 40 dh
            ['nom_produit' => 'Velours Mobra Digital', 'description' => 'Velours Mobra Digital', 'prix' => 55.00, 'sub_categorie' => 2],
            ['nom_produit' => 'Velours Mobra Digital', 'description' => 'Velours Mobra Digital', 'prix' => 55.00, 'sub_categorie' => 2],
            ['nom_produit' => 'Velours Anti taches', 'description' => 'Velours Anti taches', 'prix' => 60.00, 'sub_categorie' => 2],
            ['nom_produit' => 'Tissu Velours', 'description' => 'Tissu Velours', 'prix' => 60.00, 'sub_categorie' => 2],
            ['nom_produit' => 'Tissu Velours', 'description' => 'Tissu Velours', 'prix' => 60.00, 'sub_categorie' => 2],
            ['nom_produit' => 'Tissu Velours', 'description' => 'Tissu Velours', 'prix' => 60.00, 'sub_categorie' => 2],
            ['nom_produit' => 'Tissu Velours', 'description' => 'Tissu Velours', 'prix' => 60.00, 'sub_categorie' => 2],
            ['nom_produit' => 'Tissu Velours', 'description' => 'Tissu Velours', 'prix' => 80.00, 'sub_categorie' => 2],
            ['nom_produit' => 'Tissu Velours', 'description' => 'Tissu Velours', 'prix' => 80.00, 'sub_categorie' => 2],
            ['nom_produit' => 'Tissu Velours', 'description' => 'Tissu Velours', 'prix' => 1000.00, 'sub_categorie' => 2],
            ['nom_produit' => 'Tissu Velours', 'description' => 'Tissu Velours', 'prix' => 100.00, 'sub_categorie' => 2],
            ['nom_produit' => 'Tissu Velours', 'description' => 'Tissu Velours', 'prix' => 100.00, 'sub_categorie' => 2],
            // => Tissus Roumie plus de 40 dh
            ['nom_produit' => 'Tissu Jaccard', 'description' => 'Tissu Jaccard', 'prix' => 55.00, 'sub_categorie' => 3],
            ['nom_produit' => 'Tissu Chenille', 'description' => 'Tissu Chenille', 'prix' => 60.00, 'sub_categorie' => 3],
            ['nom_produit' => 'Tissu Bahja', 'description' => 'Tissu Bahja', 'prix' => 65.00, 'sub_categorie' => 3],
            ['nom_produit' => 'Tissu Brocart', 'description' => 'Tissu Brocart', 'prix' => 75.00, 'sub_categorie' => 3],
            ['nom_produit' => 'Tissu Brocart', 'description' => 'Tissu Brocart', 'prix' => 75.00, 'sub_categorie' => 3],
            ['nom_produit' => 'Tissu Brocart', 'description' => 'Tissu Brocart', 'prix' => 75.00, 'sub_categorie' => 3],
            ['nom_produit' => 'Tissu Brocart', 'description' => 'Tissu Brocart', 'prix' => 75.00, 'sub_categorie' => 3],
            ['nom_produit' => 'Tissu Brocart', 'description' => 'Tissu Brocart', 'prix' => 95.00, 'sub_categorie' => 3],
            ['nom_produit' => 'Tissu Plazma', 'description' => 'Tissu Plazma', 'prix' => 80.00, 'sub_categorie' => 3],
            ['nom_produit' => 'Tissu Matroz', 'description' => 'Tissu Matroz', 'prix' => 295.00, 'sub_categorie' => 3],
            ['nom_produit' => 'Tissu Matroz', 'description' => 'Tissu Matroz', 'prix' => 295.00, 'sub_categorie' => 3],
            ['nom_produit' => 'Tissu Matroz', 'description' => 'Tissu Matroz', 'prix' => 295.00, 'sub_categorie' => 3],
            // Salon
            // => Petits Espaces
            ['nom_produit' => 'Salon Marocain Tissu anti taches', 'description' => 'Salon Marocain Tissu anti taches', 'prix' => 1500.00, 'sub_categorie' => 5],
            ['nom_produit' => 'Salon Marocain Tissu anti taches', 'description' => 'Salon Marocain Tissu anti taches', 'prix' => 1500.00, 'sub_categorie' => 5],
            ['nom_produit' => 'Salon Marocain Tissu anti taches', 'description' => 'Salon Marocain Tissu anti taches', 'prix' => 1500.00, 'sub_categorie' => 5],
            ['nom_produit' => 'Salon Marocain Tirage Tissu anti taches', 'description' => 'Salon Marocain Tirage Tissu anti taches', 'prix' => 1600.00, 'sub_categorie' => 5],
            ['nom_produit' => 'Salon Marocain Tissu anti taches', 'description' => 'Salon Marocain Tissu anti taches', 'prix' => 1700.00, 'sub_categorie' => 5],
            ['nom_produit' => 'Salon Marocain Tissu Anti taches', 'description' => 'Salon Marocain Tissu Anti taches', 'prix' => 1500.00, 'sub_categorie' => 5],
            ['nom_produit' => 'Salon Marocain Tirage Tissu Anti taches  ', 'description' => 'Salon Marocain Tirage Tissu Anti taches', 'prix' => 1900.00, 'sub_categorie' => 5],
            ['nom_produit' => 'Salon Marocain Tissu Anti taches', 'description' => 'Salon Marocain Tissu Anti taches', 'prix' => 1500.00, 'sub_categorie' => 5],
            ['nom_produit' => 'Salon Marocain Tissu Anti taches', 'description' => 'Salon Marocain Tissu Anti taches', 'prix' => 1600.00, 'sub_categorie' => 5],
            ['nom_produit' => 'Salon Marocain Tissu Anti taches', 'description' => 'Salon Marocain Tissu Anti taches', 'prix' => 1500.00, 'sub_categorie' => 5],
            ['nom_produit' => 'Salon Marocain Tissu Anti taches', 'description' => 'Salon Marocain Tissu Anti taches', 'prix' => 1600.00, 'sub_categorie' => 5],
            ['nom_produit' => 'Salon Marocain Tissu Anti taches', 'description' => 'Salon Marocain Tissu Anti taches', 'prix' => 1600.00, 'sub_categorie' => 5],
            // => Grand Espaces
            ['nom_produit' => 'Salon Marocain Tissu Anti Taches', 'description' => 'Salon Marocain Tissu Anti Taches', 'prix' => 1600.00, 'sub_categorie' => 6],
            ['nom_produit' => 'Salon Marocain Tissu Matroz', 'description' => 'Salon Marocain Tissu Matroz', 'prix' => 1600.00, 'sub_categorie' => 6],
            ['nom_produit' => 'Salon Marocain Tissu Anti taches', 'description' => 'Salon Marocain Tissu Anti taches', 'prix' => 1600.00, 'sub_categorie' => 6],
            ['nom_produit' => 'Salon Marocain Tirage Tissu Anti Taches', 'description' => 'Salon Marocain Tirage Tissu Anti Taches', 'prix' => 1900.00, 'sub_categorie' => 6],
            ['nom_produit' => 'Salon Marocain Tissu Matroz', 'description' => 'Salon Marocain Tissu Matroz', 'prix' => 1600.00, 'sub_categorie' => 6],
            ['nom_produit' => 'Salon Marocain Tissu Anti taches', 'description' => 'Salon Marocain Tissu Anti taches', 'prix' => 1900.00, 'sub_categorie' => 6],
            // => Ressort
            ['nom_produit' => 'Salon Kinedorsal ', 'description' => 'Salon Kinedorsal ', 'prix' => 700.00, 'sub_categorie' => 7],
            ['nom_produit' => 'Salon Kinedorsal Bioenergy ', 'description' => 'Salon Kinedorsal Bioenergy ', 'prix' => 840.00, 'sub_categorie' => 7],
            ['nom_produit' => 'Salon Kinedorsal Résilience Dolidol', 'description' => 'Salon Kinedorsal Résilience Dolidol', 'prix' => 830.00, 'sub_categorie' => 7],
            ['nom_produit' => 'Salon Marocain Tissu Anti taches', 'description' => 'Salon Marocain Tissu Anti taches', 'prix' => 1080.00, 'sub_categorie' => 7],
            // => Sommiere
            ['nom_produit' => 'Sommier et Tete Lit', 'description' => 'Sommier et Tete Lit', 'prix' => 5510.00, 'sub_categorie' => 8],
            ['nom_produit' => 'Sommier et Tete Lit', 'description' => 'Sommier et Tete Lit', 'prix' => 3895.00, 'sub_categorie' => 8],
            ['nom_produit' => 'Sommier et Tete Lit', 'description' => 'Sommier et Tete Lit', 'prix' => 3705.00, 'sub_categorie' => 8],
            ['nom_produit' => 'Sommier et Tete Lit', 'description' => 'Sommier et Tete Lit', 'prix' => 4275.00, 'sub_categorie' => 8],
            ['nom_produit' => 'Sommier et Tete Lit', 'description' => 'Sommier et Tete Lit', 'prix' => 4655.00, 'sub_categorie' => 8],
            ['nom_produit' => 'Sommier et Tete Lit', 'description' => 'Sommier et Tete Lit', 'prix' => 4560.00, 'sub_categorie' => 8],
            ['nom_produit' => 'Sommier et Tete Lit', 'description' => 'Sommier et Tete Lit', 'prix' => 4560.00, 'sub_categorie' => 8],
            
        ];
        $i = 0;
        // Insert product data
        foreach ($products as $product) {
            $i++;
            DB::table('produits')->insert([
                'nom_produit' => $product['nom_produit'],
                'image_produits' => $i.'.webp',
                'description' => $product['description'],
                'prix' => $product['prix'],
                'sub_categorie' => $product['sub_categorie'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}