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
            ['nom_produit' => 'Salon Chair 1', 'image_produits' => 'salon1.png', 'description' => 'Comfortable salon chair', 'prix' => 1500.00, 'categorie' => 1],
            ['nom_produit' => 'Salon Chair 2', 'image_produits' => 'salon2.png', 'description' => 'Stylish salon chair', 'prix' => 2000.00, 'categorie' => 1],
            ['nom_produit' => 'Salon Chair 3', 'image_produits' => 'salon3.png', 'description' => 'Elegant salon chair', 'prix' => 2500.00, 'categorie' => 1],
            ['nom_produit' => 'Salon Chair 4', 'image_produits' => 'salon4.png', 'description' => 'Modern salon chair', 'prix' => 3000.00, 'categorie' => 1],
            ['nom_produit' => 'Salon Chair 5', 'image_produits' => 'salon5.png', 'description' => 'Premium salon chair', 'prix' => 3500.00, 'categorie' => 1],
            ['nom_produit' => 'Salon Chair 6', 'image_produits' => 'salon6.png', 'description' => 'Compact salon chair', 'prix' => 1800.00, 'categorie' => 1],
            ['nom_produit' => 'Salon Chair 7', 'image_produits' => 'salon7.png', 'description' => 'Luxurious salon chair', 'prix' => 4000.00, 'categorie' => 1],
            ['nom_produit' => 'Salon Chair 8', 'image_produits' => 'salon8.png', 'description' => 'Durable salon chair', 'prix' => 2200.00, 'categorie' => 1],
        ];

        // Insert product data
        foreach ($products as $product) {
            DB::table('produits')->insert([
                'nom_produit' => $product['nom_produit'],
                'image_produits' => $product['image_produits'],
                'description' => $product['description'],
                'prix' => $product['prix'],
                'categorie' => $product['categorie'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}