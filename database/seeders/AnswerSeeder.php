<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\Answer;
use Faker\Factory as Faker;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Answer::truncate();
        $faker = Faker::create('fr_FR');

        $questions = Question::all();

        foreach ($questions as $question) {
            $numAnswers = ($question->type === 'true_false') ? 2 : rand(3, 5); // 2 answers for true/false, 3-5 for multiple choice
            $correctAnswerIndex = rand(0, $numAnswers - 1);

            for ($i = 0; $i < $numAnswers; $i++) {
                $isCorrect = ($i === $correctAnswerIndex);
                $answerText = '';

                if ($question->type === 'true_false') {
                    $answerText = ($i === 0) ? 'Vrai' : 'Faux';
                } else {
                    $answerText = $faker->sentence(rand(3, 7));
                    if ($isCorrect) {
                        $answerText = 'La bonne réponse : ' . $answerText; // Make it obvious for testing
                    }
                }

                Answer::create([
                    'question_id' => $question->id,
                    'answer_text' => $answerText,
                    'is_correct' => $isCorrect,
                    'order' => $i + 1,
                ]);
            }
        }
    }
}