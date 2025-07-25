<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Call the specific seeders
        $this->call([
            ModuleSeeder::class,
            CourseSeeder::class,
            QuizSeeder::class,
            QuestionSeeder::class,
            AnswerSeeder::class,
            // You might have other seeders here, e.g., UserSeeder
            // UserSeeder::class, // Uncomment if you have a UserSeeder
        ]);
    }
}