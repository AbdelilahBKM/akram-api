<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SubCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Temporarily disable foreign key checks to avoid issues during truncation
        Schema::disableForeignKeyConstraints();

        // Clear the sub_categories table to avoid duplicates
        DB::table('sub_categories')->truncate();

        // Enable foreign key checks back
        Schema::enableForeignKeyConstraints();

        DB::table('sub_categories')->insert([
            // Tissues
            [
                'nom_sous_categorie' => 'Tissus Roumie moin de 40 dh',
                'valeur_sous_categorie' => 'tissus_roumie_moin_40',
                'description' => 'issus roumie moin de 40 dh',
                'categorie' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_sous_categorie' => 'Tissus Roumie plus de 40 dh',
                'valeur_sous_categorie' => 'tissus_roumie_plus_40',
                'description' => 'Tissus Roumie plus de 40 dh',
                'categorie' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_sous_categorie' => 'Tissus Beldi',
                'valeur_sous_categorie' => 'tissus_beldi',
                'description' => 'Tissus Beldi',
                'categorie' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_sous_categorie' => 'Tissus Ameublement Haute Gamme',
                'valeur_sous_categorie' => 'tissus_ameublement_haute_gamme',
                'description' => 'Tissus Ameublement Haute Gamme',
                'categorie' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Salon
            [
                'nom_sous_categorie' => 'Salons Maroccain Petits Espaces',
                'valeur_sous_categorie' => 'salons_maroccain_petits_espaces',
                'description' => 'pour des petits espaces de moins de 5 m2',
                'categorie' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_sous_categorie' => 'Salons Maroccain Grands Espaces',
                'valeur_sous_categorie' => 'salons_maroccain_grands_espaces',
                'description' => 'pour des grands espaces de plus de 5 m2',
                'categorie' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_sous_categorie' => 'Banquettes Ressort',
                'valeur_sous_categorie' => 'banquettes_ressort',
                'description' => 'Banquettes Ressort Kinedorsal Mesidor, Dolidol et Richbond',
                'categorie' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Literie
            [
                'nom_sous_categorie' => 'Sommier Tete Lit',
                'valeur_sous_categorie' => 'sommier_tete_lit',
                'description' => 'Sommier Tete Lit',
                'categorie' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_sous_categorie' => 'Matelas',
                'valeur_sous_categorie' => 'matelas',
                'description' => 'Matelas',
                'categorie' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_sous_categorie' => 'Linges de Lit',
                'valeur_sous_categorie' => 'linges_de_lit',
                'description' => 'Linges de Lit',
                'categorie' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Voilage
            [
                'nom_sous_categorie' => 'Tissus Voilage',
                'valeur_sous_categorie' => 'tissus_voilage',
                'description' => 'Tissus Voilage',
                'categorie' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_sous_categorie' => 'Rideau',
                'valeur_sous_categorie' => 'rideau',
                'description' => 'Rideau',
                'categorie' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
