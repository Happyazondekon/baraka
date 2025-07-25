<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Module;
use Illuminate\Support\Str;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Clear existing data to avoid duplicates on re-seeding
        Module::truncate();

        $modulesData = [
            [
                'title' => 'Code de la route : Les Fondamentaux',
                'description' => 'Ce module couvre les bases essentielles du code de la route, y compris la signalisation, les règles de priorité et les limitations de vitesse.',
                'image' => 'images/modules/module1.jpg', // Ensure this path is valid or remove if no image
                'order' => 1,
                'is_practical' => false,
                'is_active' => true,
            ],
            [
                'title' => 'Conduite défensive et Sécurité',
                'description' => 'Apprenez les techniques de conduite défensive pour anticiper les dangers et réagir en toute sécurité dans diverses situations.',
                'image' => 'images/modules/module2.jpg',
                'order' => 2,
                'is_practical' => true,
                'is_active' => true,
            ],
            [
                'title' => 'Maniabilité du Véhicule et Stationnement',
                'description' => 'Maîtrisez les manœuvres de stationnement, le démarrage en côte et le contrôle du véhicule à basse vitesse.',
                'image' => 'images/modules/module3.jpg',
                'order' => 3,
                'is_practical' => true,
                'is_active' => true,
            ],
            [
                'title' => 'Environnement et Permis de Conduire',
                'description' => 'Découvrez l\'impact environnemental de la conduite et les procédures administratives pour l\'obtention du permis.',
                'image' => 'images/modules/module4.jpg',
                'order' => 4,
                'is_practical' => false,
                'is_active' => true,
            ],
            [
                'title' => 'Premiers secours en cas d\'accident',
                'description' => 'Apprenez les gestes qui sauvent et la conduite à tenir en cas d\'accident sur la route.',
                'image' => 'images/modules/module5.jpg',
                'order' => 5,
                'is_practical' => true,
                'is_active' => false, // Example of an inactive module
            ],
        ];

        foreach ($modulesData as $data) {
            Module::create($data);
        }

        // Create some additional modules using factory for more variety
        // Module::factory()->count(5)->create();
    }
}