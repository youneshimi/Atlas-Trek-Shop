<?php

namespace Database\Seeders;

use App\Models\Produits;
use App\Models\Categories;
use App\Models\Comments;
use App\Models\produits_categories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProduitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categories::create(['label' => 'Équipement']);
        Categories::create(['label' => 'Guides']);
        Categories::create(['label' => 'Accessoires']);


        Produits::create(['titre' => 'Sac à Dos', 'description' => 'équipement essentiel pour les aventuriers passionnés de randonnée et de trek. Conçu pour offrir un équilibre parfait entre confort, fonctionnalité et durabilité, ce sac à dos est spécialement conçu pour répondre aux exigences des longues expéditions en montagne.', 'prix' => '25',  'image' => '/img/sac.png', 'note' => '5']);
        Produits::create(['titre' => 'material', 'description' => 'Capacité généreuse,Confort de portage,Résistant aux intempéries,Compartimentage intelligent', 'prix' => '10',  'image' => '/img/Matériel.png', 'note' => '2']);
        Produits::create(['titre' => 'kayaks', 'description' => 'Un kayak monotour universel pour les rivières et les lacs', 'prix' => '100',  'image' => '/img/kayak.png', 'note' => '5']);
        Produits::create(['titre' => 'Réchauds', 'description' => 'Applicable à la fois à l extérieur et à l intérieur', 'prix' => '500',  'image' => '/img/chof.png', 'note' => '3']);
        Produits::create(['titre' => 'guide', 'description' => 'des guide pour le trik', 'prix' => '94',  'image' => '/img/guide.png', 'note' => '2']);
        Produits::create(['titre' => 'Tente', 'description' => 'Tente dôme de trekking - 2 places', 'prix' => '64',  'image' => '/img/tente.png', 'note' => '5']);
        //ajout pour test paginations


        produits_categories::create(['prod_id' => 1, 'categorie_id' => 2]);
        produits_categories::create(['prod_id' => 2, 'categorie_id' => 2]);
        produits_categories::create(['prod_id' => 3, 'categorie_id' => 3]);
        produits_categories::create(['prod_id' => 4, 'categorie_id' => 1]);
        produits_categories::create(['prod_id' => 5, 'categorie_id' => 2]);


       /*  Comments::create(['user_id' => '6', 'product_id' => '1', 'contenu' => 'Ce cadeau est super !', 'note' => '5']);
        Comments::create(['user_id' => '7', 'product_id' => '2', 'contenu' => 'Ce cadeau est super !', 'note' => '2']); */

    }
}
