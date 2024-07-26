<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\table;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'nom_categorie' => 'Tissus',
                'description_categorie' => 'Tissus',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_categorie' => 'Salon',
                'description_categorie' => 'Salon',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_categorie' => 'Literie',
                'description_categorie' => 'Literie',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_categorie' => 'Voilage',
                'description_categorie' => 'Voilage',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
