<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question; // Assurez-vous que le chemin vers votre modèle Question est correct
use App\Models\Answer;   // Assurez-vous que le chemin vers votre modèle Answer est correct

class QuizQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Liste des IDs de quiz à cibler
        $quizIds = [1, 11, 12, 13, 14];

        // Le texte de la question demandée (légèrement corrigé pour un meilleur format)
        $questionText = "Aviez-vous bien retenu la leçon ?";

        // Les réponses associées (une correcte, trois incorrectes)
        $answersData = [
            // Réponse correcte
            ['answer_text' => 'Oui, j\'ai parfaitement assimilé les concepts clés.', 'is_correct' => true, 'order' => 1],
            // Réponses incorrectes
            ['answer_text' => 'Non, je n\'ai pas retenu grand-chose.', 'is_correct' => false, 'order' => 2],
            ['answer_text' => 'J\'ai quelques doutes, je dois revoir la leçon.', 'is_correct' => false, 'order' => 3],
            ['answer_text' => 'J\'ai besoin que l\'on me reformule les points importants.', 'is_correct' => false, 'order' => 4],
        ];

        // Boucler sur chaque ID de quiz pour créer la question et ses réponses
        foreach ($quizIds as $quizId) {
            // Créer la question
            $question = Question::create([
                'quiz_id'       => $quizId,
                'question_text' => $questionText,
                'image'         => null,
                'type'          => 'multiple_choice', // Type de question
                'order'         => 1, // Assurez-vous que c'est l'ordre souhaité
            ]);

            // Créer les réponses pour la question
            foreach ($answersData as $answerData) {
                // Utilisation de la relation `answers()` si elle est définie dans votre modèle Question
                $question->answers()->create($answerData);
            }
        }
    }
}