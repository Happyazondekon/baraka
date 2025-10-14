<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;

class QuizUnseeder200 extends Seeder
{
    /**
     * Inverse les données insérées par QuizSeeder200.
     *
     * @return void
     */
    public function run()
    {
        // 1. Définissez l'ID du quiz et l'intervalle de questions.
        // ATTENTION : Cet ID DOIT correspondre à celui utilisé dans le seeder QuizSeeder200 (qui était 1)
        $quizId = 1; 
        $startOrder = 149;
        $endOrder = 200;

        // 2. Supprime les questions basées sur l'ID du quiz et l'ordre des questions.
        // Les réponses associées seront supprimées automatiquement (cascade).
        $deletedCount = Question::where('quiz_id', $quizId)
            ->whereBetween('order', [$startOrder, $endOrder])
            ->delete();

        echo "✅ " . $deletedCount . " questions et leurs réponses associées (ID Quiz: {$quizId}, Ordre: {$startOrder}-{$endOrder}) ont été supprimées.\n";
    }
}