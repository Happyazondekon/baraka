<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\Answer;

class QuizSeeder333 extends Seeder
{
    /**
     * Run the database seeds for "Les Règles de Priorité du module" (Q333-Q352, Quiz ID 5).
     *
     * @return void
     */
    public function run()
    {
        // ID du Quiz pour "Les Règles de Priorité du module"
        $quizId = 5;

        $questionsData = [
            // Question n°333
            [
                'question_text' => 'Sur cette image Im 3 quel est l’ordre de passage des voitures',
                'answers' => [
                    ['answer_text' => 'rouge d’abord, bleue ensuite et enfin vert', 'is_correct' => false],
                    ['answer_text' => 'bleue d’abord puis vert et rouge simultanément,', 'is_correct' => true],
                    ['answer_text' => 'vert d’abord, bleue ensuite et rouge en fin', 'is_correct' => false],
                ],
            ],
            // Question n°334
            [
                'question_text' => 'Donnez la règle à appliquer et l’ordre de passage des véhicules (Panneau stop/cédez-le-passage ?)',
                'answers' => [
                    ['answer_text' => 'perte de priorité', 'is_correct' => false],
                    ['answer_text' => 'priorité de passage', 'is_correct' => false],
                    ['answer_text' => 'priorité à droite', 'is_correct' => true],
                    ['answer_text' => 'rouge, bleu, jaune', 'is_correct' => true],
                    ['answer_text' => 'bleu, jaune, rouge', 'is_correct' => false],
                ],
            ],
            // Question n°335
            [
                'question_text' => 'Sur cette image Im2 P47, donnez les règles à appliquer et l’ordre de passage des véhicules',
                'answers' => [
                    ['answer_text' => 'priorité à droite', 'is_correct' => false],
                    ['answer_text' => 'perte de priorité', 'is_correct' => true],
                    ['answer_text' => 'priorité de passage', 'is_correct' => true],
                    ['answer_text' => 'jaune et bleu simultanément puis rouge', 'is_correct' => true],
                    ['answer_text' => 'rouge, jaune, bleu', 'is_correct' => false],
                ],
            ],
            // Question n°336
            [
                'question_text' => 'Sur cette image Im3 P47, donnez les règles à appliquer et l’ordre de passage des véhicules',
                'answers' => [
                    ['answer_text' => 'priorité à droite', 'is_correct' => true],
                    ['answer_text' => 'priorité de passage', 'is_correct' => false],
                    ['answer_text' => 'perte de priorité', 'is_correct' => false],
                    ['answer_text' => 'jaune, bleu, rouge', 'is_correct' => true],
                    ['answer_text' => 'bleu, rouge, jaune', 'is_correct' => false],
                ],
            ],
            // Question n°337
            [
                'question_text' => 'Sur cette image Im4 P47, donnez les règles à appliquer et l’ordre de passage des véhicules',
                'answers' => [
                    ['answer_text' => 'perte de priorité', 'is_correct' => true],
                    ['answer_text' => 'priorité de passage', 'is_correct' => true],
                    ['answer_text' => 'courtoisie', 'is_correct' => false],
                    ['answer_text' => 'jaune et rouge simultanément puis bleu et blanc après', 'is_correct' => true],
                    ['answer_text' => 'Bleu et blanc simultanément puis rouge et jaune après', 'is_correct' => false],
                ],
            ],
            // Question n°338
            [
                'question_text' => 'Sur cette image Im5 P47, donnez les règles à appliquer et l’ordre de passage des véhicules',
                'answers' => [
                    ['answer_text' => 'perte de priorité', 'is_correct' => true],
                    ['answer_text' => 'priorité à droite', 'is_correct' => false],
                    ['answer_text' => 'priorité de passage', 'is_correct' => true],
                    ['answer_text' => 'bleue, rouge, jaune', 'is_correct' => false],
                    ['answer_text' => 'bleu et jaune simultanément puis rouge après', 'is_correct' => true],
                ],
            ],
            // Question n°339
            [
                'question_text' => 'Sur cette image Im6 P47, donnez les règles à appliquer et l’ordre de passage des véhicules',
                'answers' => [
                    ['answer_text' => 'priorité à droite', 'is_correct' => false],
                    ['answer_text' => 'priorité de passage', 'is_correct' => true],
                    ['answer_text' => 'perte de priorité', 'is_correct' => true],
                    ['answer_text' => 'rouge d’abord, puis bleu et jaune après', 'is_correct' => true],
                    ['answer_text' => 'bleu, rouge et jaune', 'is_correct' => false],
                ],
            ],
            // Question n°340
            [
                'question_text' => 'Sur cette image Im7 P47, donnez les règles à appliquer et l’ordre de passage des véhicules',
                'answers' => [
                    ['answer_text' => 'perte de priorité', 'is_correct' => true],
                    ['answer_text' => 'priorité de passage', 'is_correct' => true],
                    ['answer_text' => 'la priorité à droite', 'is_correct' => false],
                    ['answer_text' => 'bleu, jaune, rouge', 'is_correct' => false],
                    ['answer_text' => 'bleu et rouge simultanément, puis jaune après', 'is_correct' => true],
                ],
            ],
            // Question n°341 (Panneau manquant Im1 P49) - Réponse a
            [
                'question_text' => 'Sur cette image Im1 P49, choisissez le panneau manquant parmi les panneaux proposés',
                'answers' => [
                    ['answer_text' => 'Panneau A (Réponse correcte)', 'is_correct' => true],
                    ['answer_text' => 'Panneau B', 'is_correct' => false],
                    ['answer_text' => 'Panneau C', 'is_correct' => false],
                    ['answer_text' => 'Panneau D', 'is_correct' => false],
                    ['answer_text' => 'Panneau E', 'is_correct' => false],
                ],
            ],
            // Question n°342 (Panneau manquant Im2 P49) - Réponse b
            [
                'question_text' => 'Sur cette image Im2 P49, choisissez le panneau manquant parmi les panneaux proposés',
                'answers' => [
                    ['answer_text' => 'Panneau A', 'is_correct' => false],
                    ['answer_text' => 'Panneau B (Réponse correcte)', 'is_correct' => true],
                    ['answer_text' => 'Panneau C', 'is_correct' => false],
                    ['answer_text' => 'Panneau D', 'is_correct' => false],
                    ['answer_text' => 'Panneau E', 'is_correct' => false],
                ],
            ],
            // Question n°343 (Panneau manquant Im3 P49) - Réponse b
            [
                'question_text' => 'Sur cette image Im3 P49, choisissez le panneau manquant parmi les panneaux proposés',
                'answers' => [
                    ['answer_text' => 'Panneau A', 'is_correct' => false],
                    ['answer_text' => 'Panneau B (Réponse correcte)', 'is_correct' => true],
                    ['answer_text' => 'Panneau C', 'is_correct' => false],
                    ['answer_text' => 'Panneau D', 'is_correct' => false],
                    ['answer_text' => 'Panneau E', 'is_correct' => false],
                ],
            ],
            // Question n°344 (Panneau manquant Im4 P49) - Réponse e
            [
                'question_text' => 'Sur cette image Im4 P49, choisissez le panneau manquant parmi les panneaux proposés',
                'answers' => [
                    ['answer_text' => 'Panneau A', 'is_correct' => false],
                    ['answer_text' => 'Panneau B', 'is_correct' => false],
                    ['answer_text' => 'Panneau C', 'is_correct' => false],
                    ['answer_text' => 'Panneau D', 'is_correct' => false],
                    ['answer_text' => 'Panneau E (Réponse correcte)', 'is_correct' => true],
                ],
            ],
            // Question n°345 (Panneau manquant Im5 P49) - Réponse e
            [
                'question_text' => 'Sur cette image Im5 P49, choisissez le panneau manquant parmi les panneaux proposés',
                'answers' => [
                    ['answer_text' => 'Panneau A', 'is_correct' => false],
                    ['answer_text' => 'Panneau B', 'is_correct' => false],
                    ['answer_text' => 'Panneau C', 'is_correct' => false],
                    ['answer_text' => 'Panneau D', 'is_correct' => false],
                    ['answer_text' => 'Panneau E (Réponse correcte)', 'is_correct' => true],
                ],
            ],
            // Question n°346 (Panneau manquant Im6 P49) - Réponse c
            [
                'question_text' => 'Sur cette image Im6 P49, choisi le panneau manquant parmi les panneaux proposés',
                'answers' => [
                    ['answer_text' => 'Panneau A', 'is_correct' => false],
                    ['answer_text' => 'Panneau B', 'is_correct' => false],
                    ['answer_text' => 'Panneau C (Réponse correcte)', 'is_correct' => true],
                    ['answer_text' => 'Panneau D', 'is_correct' => false],
                    ['answer_text' => 'Panneau E', 'is_correct' => false],
                ],
            ],
            // Question n°347 (Panneau manquant Im7 P49) - Réponse b
            [
                'question_text' => 'Sur cette image Im7 P49, choisissez le panneau manquant parmi les panneaux proposés',
                'answers' => [
                    ['answer_text' => 'Panneau A', 'is_correct' => false],
                    ['answer_text' => 'Panneau B (Réponse correcte)', 'is_correct' => true],
                    ['answer_text' => 'Panneau C', 'is_correct' => false],
                    ['answer_text' => 'Panneau D', 'is_correct' => false],
                    ['answer_text' => 'Panneau E', 'is_correct' => false],
                ],
            ],
            // Question n°348 (Panneau manquant Im8 P49) - Réponse c
            [
                'question_text' => 'Sur cette image Im8 P49, choisi le panneau manquant parmi les panneaux proposés',
                'answers' => [
                    ['answer_text' => 'Panneau A', 'is_correct' => false],
                    ['answer_text' => 'Panneau B', 'is_correct' => false],
                    ['answer_text' => 'Panneau C (Réponse correcte)', 'is_correct' => true],
                    ['answer_text' => 'Panneau D', 'is_correct' => false],
                    ['answer_text' => 'Panneau E', 'is_correct' => false],
                ],
            ],
            // Question n°349
            [
                'question_text' => 'Sur cette image Im N°1 P60:',
                'answers' => [
                    ['answer_text' => 'nous sommes en présence d’une ligne d’avertissement', 'is_correct' => true],
                    ['answer_text' => 'le véhicule bleu peut dépasser', 'is_correct' => true],
                    ['answer_text' => 'le véhicule rouge peut s’arrêter sur la chaussée', 'is_correct' => false],
                    ['answer_text' => 'la ligne de rive peut être franchie', 'is_correct' => true],
                ],
            ],
            // Question n°350
            [
                'question_text' => 'Sur cette image (Im 1 p57), quelle est la position de l’agent qui vous autorise le passage ?',
                'answers' => [
                    ['answer_text' => 'Position a', 'is_correct' => true],
                    ['answer_text' => 'Position b', 'is_correct' => false],
                    ['answer_text' => 'Position c', 'is_correct' => false],
                ],
            ],
            // Question n°351
            [
                'question_text' => 'Quel est l’ordre de passage des véhicules à cette intersection (Im 2) [Avec Agent de circulation]',
                'answers' => [
                    ['answer_text' => 'rouge- jaune – bleu – blanc', 'is_correct' => false],
                    ['answer_text' => 'rouge et bleu simultanément puis blanc et jaune sur ordre de l’agent', 'is_correct' => true],
                    ['answer_text' => 'jaune et blanc simultanément puis bleu et rouge sur ordre de l’agent', 'is_correct' => false],
                ],
            ],
            // Question n°352
            [
                'question_text' => 'A cette intersection In 3, quel sera l’ordre de passage des véhicules ?',
                'answers' => [
                    ['answer_text' => 'rouge – bleue- jaune –vert', 'is_correct' => false],
                    ['answer_text' => 'bleu et rouge simultanément puis bleu et vert au feu vert', 'is_correct' => false],
                    ['answer_text' => 'bleu et vert simultanément puis rouge et jaune sur l’ordre de l’agent', 'is_correct' => true],
                ],
            ],
        ];

        $currentQuestionOrder = 333;
        foreach ($questionsData as $data) {
            $question = Question::create([
                'quiz_id' => $quizId,
                'question_text' => $data['question_text'],
                'order' => $currentQuestionOrder,
                'type' => 'multiple_choice',
            ]);

            $answerOrder = 1;
            foreach ($data['answers'] as $answerData) {
                Answer::create([
                    'question_id' => $question->id,
                    'answer_text' => $answerData['answer_text'],
                    'is_correct' => $answerData['is_correct'],
                    'order' => $answerOrder,
                ]);
                $answerOrder++;
            }
            $currentQuestionOrder++;
        }
    }
}