<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Module;
use App\Models\Quiz;
use Faker\Factory as Faker;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Quiz::truncate();
        $faker = Faker::create('fr_FR');

        $modules = Module::all();

        foreach ($modules as $module) {
            // Create a quiz for each module
            Quiz::create([
                'module_id' => $module->id,
                'title' => 'Quiz du module : ' . $module->title,
                'description' => $faker->paragraph(rand(2, 4)),
                'time_limit' => rand(10, 30), // 10 to 30 minutes
                'passing_score' => $faker->randomElement([60, 70, 75, 80]),
                'is_active' => $faker->boolean(85), // 85% chance of being active
            ]);
        }
    }
}