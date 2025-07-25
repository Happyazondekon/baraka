<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quiz;
use App\Models\Question;
use Faker\Factory as Faker;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Question::truncate();
        $faker = Faker::create('fr_FR');

        $quizzes = Quiz::all();

        foreach ($quizzes as $quiz) {
            $numQuestions = rand(8, 15); // Each quiz will have 8 to 15 questions

            for ($i = 1; $i <= $numQuestions; $i++) {
                Question::create([
                    'quiz_id' => $quiz->id,
                    'question_text' => $faker->sentence(rand(7, 12)) . ' ?',
                    'image' => $faker->boolean(30) ? 'images/questions/question' . rand(1, 5) . '.jpg' : null, // 30% chance of an image
                    'type' => $faker->randomElement(['multiple_choice', 'true_false']),
                    'order' => $i,
                ]);
            }
        }
    }
}