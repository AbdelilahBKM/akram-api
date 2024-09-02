<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Définir les catégories et sous-catégories
        $categories = [
            // Catégorie principale : tissus
            [
                'id' => 101,
                'nom_categorie' => 'Tissus',
                'description_categorie' => 'Découvrez notre vaste sélection de tissus adaptés pour divers usages, allant des salons traditionnels aux créations modernes.',
                'parent_categorie' => null,
            ],
            // Sous-catégories de tissus
            [
                'id' => 102,
                'nom_categorie' => 'Tissus pour salons marocains',
                'description_categorie' => 'Tissus riches et ornés, idéaux pour créer des salons marocains authentiques et élégants.',
                'parent_categorie' => 101, // Référence à la catégorie 'Tissus'
            ],
            [
                'id' => 103,
                'nom_categorie' => 'Tissus pour salons modernes - canapés - chaises',
                'description_categorie' => 'Tissus contemporains adaptés pour des salons modernes, des canapés et des chaises, combinant confort et style.',
                'parent_categorie' => 101,
            ],
            [
                'id' => 104,
                'nom_categorie' => 'Tissus pour voilage',
                'description_categorie' => 'Tissus légers et élégants pour créer des voilages qui filtrent la lumière tout en apportant une touche de sophistication.',
                'parent_categorie' => 101,
            ],

            // Catégorie principale : literie
            [
                'id' => 105,
                'nom_categorie' => 'Literie',
                'description_categorie' => 'Tout ce dont vous avez besoin pour un sommeil réparateur, des matelas aux sommiers en passant par les accessoires de literie.',
                'parent_categorie' => null,
            ],
            // Sous-catégories de literie
            [
                'id' => 106,
                'nom_categorie' => 'Sommiers et têtes de lit',
                'description_categorie' => 'Une gamme complète de sommiers et de têtes de lit pour compléter votre ensemble de literie avec style et confort.',
                'parent_categorie' => 105, // Référence à la catégorie 'Literie'
            ],
            [
                'id' => 107,
                'nom_categorie' => 'Matelas',
                'description_categorie' => 'Matelas de haute qualité pour un confort optimal et un soutien adapté à vos besoins de sommeil.',
                'parent_categorie' => 105,
            ],
            [
                'id' => 108,
                'nom_categorie' => 'Canapés',
                'description_categorie' => 'Canapés élégants et confortables pour compléter votre salon et offrir un espace de détente.',
                'parent_categorie' => 105,
            ],
            [
                'id' => 109,
                'nom_categorie' => 'Lingerie',
                'description_categorie' => 'Linge de lit et accessoires variés pour embellir et personnaliser votre espace de sommeil.',
                'parent_categorie' => 105,
            ],

            // Catégorie principale : voilage
            [
                'id' => 110,
                'nom_categorie' => 'Voilage',
                'description_categorie' => 'Tissus et accessoires pour créer des voilages élégants qui ajoutent une touche de raffinement à vos fenêtres.',
                'parent_categorie' => null,
            ],
            // Sous-catégories de voilage
            [
                'id' => 111,
                'nom_categorie' => 'Tissus pour voilage',
                'description_categorie' => 'Sélection de tissus spécialement conçus pour les voilages, offrant légèreté et style.',
                'parent_categorie' => 110, // Référence à la catégorie 'Voilage'
            ],
            [
                'id' => 112,
                'nom_categorie' => 'Couture et montage',
                'description_categorie' => 'Services de couture et montage pour ajuster vos voilages aux dimensions parfaites.',
                'parent_categorie' => 110,
            ],
            [
                'id' => 113,
                'nom_categorie' => 'Accessoires - tringles - embrasses',
                'description_categorie' => 'Accessoires pour voilages, incluant tringles et embrasses pour un montage et une présentation élégants.',
                'parent_categorie' => 110,
            ],

            // Catégorie principale : tapisserie
            [
                'id' => 114,
                'nom_categorie' => 'Tapisserie',
                'description_categorie' => 'Tissus et services pour rénover et embellir vos meubles, allant des salons traditionnels aux styles modernes.',
                'parent_categorie' => null,
            ],
            // Sous-catégories de tapisserie
            [
                'id' => 115,
                'nom_categorie' => 'Salons traditionnels',
                'description_categorie' => 'Tissus pour créer ou rénover des salons avec une touche traditionnelle et élégante.',
                'parent_categorie' => 114, // Référence à la catégorie 'Tapisserie'
            ],
            [
                'id' => 116,
                'nom_categorie' => 'Salons modernes',
                'description_categorie' => 'Tissus contemporains pour moderniser et rafraîchir vos espaces de vie.',
                'parent_categorie' => 114,
            ],
            [
                'id' => 117,
                'nom_categorie' => 'Canapés',
                'description_categorie' => 'Revêtements pour canapés afin de leur donner un nouveau look tout en assurant confort et durabilité.',
                'parent_categorie' => 114,
            ],
            [
                'id' => 118,
                'nom_categorie' => 'Fauteuils - chaises',
                'description_categorie' => 'Tissus et services pour rénover ou personnaliser vos fauteuils et chaises.',
                'parent_categorie' => 114,
            ],
            [
                'id' => 119,
                'nom_categorie' => 'Divers services',
                'description_categorie' => 'Services variés liés à la tapisserie, incluant la réparation et la personnalisation.',
                'parent_categorie' => 114,
            ],
        ];

        // Insérer les catégories dans la base de données
        foreach ($categories as $category) {
            DB::table('categories')->insert($category);
        }
    }
}
