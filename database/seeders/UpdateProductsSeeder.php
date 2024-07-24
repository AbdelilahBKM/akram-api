<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define the updates with the new image extensions
        $updates = [
            ['nom_produit' => 'Salon Chair 1', 'image_produits' => 'salon1.png'],
            ['nom_produit' => 'Salon Chair 2', 'image_produits' => 'salon2.png'],
            ['nom_produit' => 'Salon Chair 3', 'image_produits' => 'salon3.png'],
            ['nom_produit' => 'Salon Chair 4', 'image_produits' => 'salon4.png'],
            ['nom_produit' => 'Salon Chair 5', 'image_produits' => 'salon5.png'],
            ['nom_produit' => 'Salon Chair 6', 'image_produits' => 'salon6.png'],
            ['nom_produit' => 'Salon Chair 7', 'image_produits' => 'salon7.png'],
            ['nom_produit' => 'Salon Chair 8', 'image_produits' => 'salon8.png'],
        ];

        // Update the records in the database
        foreach ($updates as $update) {
            DB::table('produits')->where('nom_produit', $update['nom_produit'])->update([
                'image_produits' => $update['image_produits'],
            ]);
        }
    }
}
