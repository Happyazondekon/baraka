<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\Answer;

class QuizSeeder400 extends Seeder
{
    /**
     * Run the database seeds for Quiz ID 7 (Questions 360-400).
     *
     * @return void
     */
    public function run()
    {
        // ID du Quiz
        $quizId = 7;

        $questionsData = [
            // Question n°360
            [
                'question_text' => 'Sur une chaussée à double sens :',
                'answers' => [
                    ['answer_text' => 'Je peux faire demi-tour', 'is_correct' => true],
                    ['answer_text' => 'Je ne peux pas faire demi-tour', 'is_correct' => false],
                    ['answer_text' => 'Je ne peux pas faire marche arrière', 'is_correct' => false],
                ],
            ],
            // Question n°361
            [
                'question_text' => 'Les flèches de rabattement m’obligent :',
                'answers' => [
                    ['answer_text' => 'A serrer ma gauche', 'is_correct' => false],
                    ['answer_text' => 'A serrer ma droite', 'is_correct' => true],
                    ['answer_text' => 'A quitter la chaussée', 'is_correct' => false],
                    ['answer_text' => 'A réduire ma vitesse', 'is_correct' => false],
                ],
            ],
            // Question n°362
            [
                'question_text' => 'Sur une chaussée à double sens comportant plus de deux voies, il est interdit d’emprunter :',
                'answers' => [
                    ['answer_text' => 'La voie la plus à droite', 'is_correct' => false],
                    ['answer_text' => 'La voie du milieu', 'is_correct' => false],
                    ['answer_text' => 'La voie la plus à gauche', 'is_correct' => true],
                ],
            ],
            // Question n°363
            [
                'question_text' => 'En quoi consiste l’arrêt ?',
                'answers' => [
                    ['answer_text' => 'A l’immobilisation momentanée d’un véhicule, conducteur à bord', 'is_correct' => true],
                    ['answer_text' => 'A l’immobilisation de longue durée d’un véhicule, conducteur éloigné', 'is_correct' => false],
                    ['answer_text' => 'A l’immobilisation momentanée d’un véhicule, conducteur éloigné', 'is_correct' => false],
                ],
            ],
            // Question n°364
            [
                'question_text' => 'Lors d’un arrêt :',
                'answers' => [
                    ['answer_text' => 'Le conducteur est à côté du véhicule', 'is_correct' => true],
                    ['answer_text' => 'Le conducteur s’éloigne du véhicule', 'is_correct' => false],
                    ['answer_text' => 'Le conducteur est à bord du véhicule', 'is_correct' => true],
                ],
            ],
            // Question n°365
            [
                'question_text' => 'En quoi consiste le stationnement',
                'answers' => [
                    ['answer_text' => 'A l’immobilisation momentanée d’un véhicule, conducteur à bord', 'is_correct' => false],
                    ['answer_text' => 'A l’immobilisation momentanée d’un véhicule, conducteur à côté', 'is_correct' => false],
                    ['answer_text' => 'A l’immobilisation momentanée d’un véhicule, conducteur éloigné', 'is_correct' => true],
                    ['answer_text' => 'A l’immobilisation de longue durée d’un véhicule', 'is_correct' => true],
                ],
            ],
            // Question n°366
            [
                'question_text' => 'En présence du panneau de "stationnement interdit" je suis autorisé à :',
                'answers' => [
                    ['answer_text' => 'Stationner avant le panneau', 'is_correct' => true],
                    ['answer_text' => 'Stationner après le panneau', 'is_correct' => false],
                    ['answer_text' => 'Stationner avant la prochaine intersection', 'is_correct' => false],
                ],
            ],
            // Question n°367
            [
                'question_text' => 'A la rencontre du panneau "arrêt et stationnement interdits", l’interdiction commence :',
                'answers' => [
                    ['answer_text' => 'Avant le panneau', 'is_correct' => false],
                    ['answer_text' => 'A partir du panneau', 'is_correct' => true],
                    ['answer_text' => '15 m après le panneau', 'is_correct' => false],
                ],
            ],
            // Question n°368
            [
                'question_text' => 'La distance de freinage augmente :',
                'answers' => [
                    ['answer_text' => 'quand la chaussée est mouillée', 'is_correct' => true],
                    ['answer_text' => 'quand les pneus sont usés', 'is_correct' => true],
                    ['answer_text' => 'quand les rotules sont usées', 'is_correct' => false],
                    ['answer_text' => 'quand la chaussée est rétrécie', 'is_correct' => false],
                ],
            ],
            // Question n°369
            [
                'question_text' => 'A la vue d’un usager qui veut s’insérer dans la circulation :',
                'answers' => [
                    ['answer_text' => 'je klaxonne', 'is_correct' => false],
                    ['answer_text' => 'je ralentis', 'is_correct' => true],
                    ['answer_text' => 'je fais un appel de feux', 'is_correct' => false],
                    ['answer_text' => 'je change de voie', 'is_correct' => false],
                ],
            ],
            // Question n°370
            [
                'question_text' => 'La distance d’arrêt augmente :',
                'answers' => [
                    ['answer_text' => 'si le conducteur est fatigué', 'is_correct' => true],
                    ['answer_text' => 'si la chaussée est légèrement mouillée', 'is_correct' => true],
                    ['answer_text' => 'si les pneus sont usés', 'is_correct' => true],
                    ['answer_text' => 'rien de tout ce qui précède', 'is_correct' => false],
                ],
            ],
            // Question n°371
            [
                'question_text' => 'En cas de pluie, je risque :',
                'answers' => [
                    ['answer_text' => 'l’aquaplaning', 'is_correct' => true],
                    ['answer_text' => 'la glissade', 'is_correct' => true],
                    ['answer_text' => 'le blocage des roues', 'is_correct' => false],
                ],
            ],
            // Question n°372
            [
                'question_text' => 'Plus je roule vite et plus j’augmente :',
                'answers' => [
                    ['answer_text' => 'le temps de réaction', 'is_correct' => false],
                    ['answer_text' => 'la distance d’arrêt', 'is_correct' => true],
                    ['answer_text' => 'la distance de freinage', 'is_correct' => true],
                ],
            ],
            // Question n°373
            [
                'question_text' => 'La distance de freinage dépend :',
                'answers' => [
                    ['answer_text' => 'de la vitesse', 'is_correct' => true],
                    ['answer_text' => 'de l’adhérence', 'is_correct' => true],
                    ['answer_text' => 'du temps de réaction', 'is_correct' => false],
                    ['answer_text' => 'de l’état physique du conducteur', 'is_correct' => false],
                    ['answer_text' => 'de l’état des amortisseurs', 'is_correct' => true],
                ],
            ],
            // Question n°374
            [
                'question_text' => 'Un conducteur ayant l’intention de changer de direction doit :',
                'answers' => [
                    ['answer_text' => 'ralentir', 'is_correct' => true],
                    ['answer_text' => 'signaler son intention', 'is_correct' => true],
                    ['answer_text' => 'klaxonner pour faire dégager les piétons engagés sur leur passage', 'is_correct' => false],
                ],
            ],
            // Question n°375
            [
                'question_text' => 'Quel doit être votre comportement à l’approche d’un lieu-dit :',
                'answers' => [
                    ['answer_text' => 'rouler vite', 'is_correct' => false],
                    ['answer_text' => 'ralentir', 'is_correct' => true],
                    ['answer_text' => 'klaxonner', 'is_correct' => true],
                ],
            ],
            // Question n°376
            [
                'question_text' => 'Un conducteur ayant l’intention de changer de direction doit :',
                'answers' => [
                    ['answer_text' => 's’assurer que la route qu’il veut emprunter n’est pas en sens interdit', 'is_correct' => true],
                    ['answer_text' => 'surveiller la route vers l’avant et l’arrière', 'is_correct' => true],
                    ['answer_text' => 'signaler son intention à l’aide du clignotant', 'is_correct' => true],
                    ['answer_text' => 'ralentir sans freiner brusquement pour ne pas surprendre les usagers qui le suivent', 'is_correct' => true],
                    ['answer_text' => 'respecter les priorités de passage et notamment les piétons qui traversent', 'is_correct' => true],
                ],
            ],
            // Question n°377
            [
                'question_text' => 'Pour adapter sa vitesse le conducteur doit tenir compte :',
                'answers' => [
                    ['answer_text' => 'de l’importance du trafic', 'is_correct' => true],
                    ['answer_text' => 'des risques prévisibles', 'is_correct' => true],
                    ['answer_text' => 'de l’adhérence', 'is_correct' => true],
                    ['answer_text' => 'de la visibilité', 'is_correct' => true],
                    ['answer_text' => 'de sa propre vigilance', 'is_correct' => true],
                ],
            ],
            // Question n°378
            [
                'question_text' => 'Un vent latéral violent est particulièrement dangereux :',
                'answers' => [
                    ['answer_text' => 'lorsqu’il souffle par rafales', 'is_correct' => true],
                    ['answer_text' => 'lors du passage de zones ventées en zones abritées', 'is_correct' => false],
                    ['answer_text' => 'si je tracte une caravane', 'is_correct' => true],
                    ['answer_text' => 's’il souffle de face', 'is_correct' => false],
                ],
            ],
            // Question 379
            [
                'question_text' => 'De nuit, seul sur autoroute, avec des feux de route éclairant à 100 mètres, je peux rouler à :',
                'answers' => [
                    ['answer_text' => '130 km/h', 'is_correct' => false],
                    ['answer_text' => '110 km/h', 'is_correct' => false],
                    ['answer_text' => '100 km/h', 'is_correct' => true],
                ],
            ],
            // Question n°380
            [
                'question_text' => 'Sur une voie d’insertion, j’accélère pour :',
                'answers' => [
                    ['answer_text' => 'atteindre la vitesse de circulation de la chaussée abordée', 'is_correct' => true],
                    ['answer_text' => 'M’engager sans ralentir la circulation', 'is_correct' => true],
                    ['answer_text' => 'M’engager avant les usagers de la route abordée', 'is_correct' => false],
                ],
            ],
            // Question n°381
            [
                'question_text' => 'Sur une voie d’insertion :',
                'answers' => [
                    ['answer_text' => 'J’accélère, je mets le clignotant, je me place dans ma voie', 'is_correct' => false],
                    ['answer_text' => 'J’accélère en contrôlant, je mets le clignotant dès que je peux m’insérer', 'is_correct' => true],
                    ['answer_text' => 'J’accélère jusqu’au bout de la voie, je contrôle, je m’insère si je peux', 'is_correct' => false],
                ],
            ],
            // Question n°382
            [
                'question_text' => 'Plus le rayon du virage est faible :',
                'answers' => [
                    ['answer_text' => 'Plus le virage est serré', 'is_correct' => true],
                    ['answer_text' => 'Plus le virage est large', 'is_correct' => false],
                    ['answer_text' => 'Plus la force centrifuge est importante', 'is_correct' => true],
                    ['answer_text' => 'Plus la force centrifuge est faible', 'is_correct' => false],
                ],
            ],
            // Question n°383
            [
                'question_text' => 'Sur route, lorsque l’accotement de droite n’est pas praticable je peux stationner:',
                'answers' => [
                    ['answer_text' => 'sur l’accotement de gauche', 'is_correct' => true],
                    ['answer_text' => 'sur l’accotement de gauche en agglomération', 'is_correct' => false],
                    ['answer_text' => 'sur la voie de droite', 'is_correct' => false],
                ],
            ],
            // Question n°384
            [
                'question_text' => 'Lorsque l’arrêt est interdit :',
                'answers' => [
                    ['answer_text' => 'le stationnement est interdit', 'is_correct' => true],
                    ['answer_text' => 'le stationnement n’est pas interdit', 'is_correct' => false],
                    ['answer_text' => 'le stationnement temporaire est interdit', 'is_correct' => true],
                    ['answer_text' => 'seul le stationnement temporaire est autorisé', 'is_correct' => false],
                ],
            ],
            // Question n°385
            [
                'question_text' => 'Le contrôle de la durée d’un stationnement payant peut se faire :',
                'answers' => [
                    ['answer_text' => 'par horodateur', 'is_correct' => true],
                    ['answer_text' => 'par disque de stationnement', 'is_correct' => false],
                    ['answer_text' => 'par parcmètre', 'is_correct' => true],
                ],
            ],
            // Question n°386
            [
                'question_text' => 'On appelle stationnement gênant le fait de stationner :',
                'answers' => [
                    ['answer_text' => 'dans une voie réservée aux bus', 'is_correct' => true],
                    ['answer_text' => 'devant une sortie de propriété', 'is_correct' => true],
                    ['answer_text' => 'sur un pont', 'is_correct' => false],
                    ['answer_text' => 'à proximité d’une voie ferrée', 'is_correct' => false],
                ],
            ],
            // Question n°387
            [
                'question_text' => 'Ajuster sa vitesse aux circonstances, c’est ralentir suffisamment :',
                'answers' => [
                    ['answer_text' => 'pour ne jamais dépasser la vitesse maximum autorisée', 'is_correct' => false],
                    ['answer_text' => 'chaque fois que la visibilité est réduite', 'is_correct' => true],
                    ['answer_text' => 'chaque fois que l’adhérence est réduite', 'is_correct' => true],
                ],
            ],
            // Question n°388
            [
                'question_text' => 'Pour évaluer l’allure d’un autre usager venant en face, je prends en compte :',
                'answers' => [
                    ['answer_text' => 'le type de véhicule', 'is_correct' => true],
                    ['answer_text' => 'la vitesse de rapprochement', 'is_correct' => true],
                    ['answer_text' => 'l’état du conducteur', 'is_correct' => false],
                ],
            ],
            // Question n°389
            [
                'question_text' => 'Le temps de réaction est le temps nécessaire au conducteur pour :',
                'answers' => [
                    ['answer_text' => 'percevoir et réagir', 'is_correct' => true],
                    ['answer_text' => 'arrêter la voiture', 'is_correct' => false],
                    ['answer_text' => 'évaluer l’allure d’un autre usager', 'is_correct' => false],
                ],
            ],
            // Question n°390
            [
                'question_text' => 'Le temps de réaction a une durée d’environ :',
                'answers' => [
                    ['answer_text' => 'un dixième de seconde', 'is_correct' => false],
                    ['answer_text' => 'une seconde', 'is_correct' => true],
                    ['answer_text' => 'dix secondes', 'is_correct' => false],
                ],
            ],
            // Question n°391
            [
                'question_text' => 'Sur chaussée mouillée ou glissante, il y a augmentation de la distance :',
                'answers' => [
                    ['answer_text' => 'Parcourue pendant le temps de réaction', 'is_correct' => false],
                    ['answer_text' => 'De freinage', 'is_correct' => true],
                    ['answer_text' => 'D’arrêt', 'is_correct' => true],
                ],
            ],
            // Question n°392
            [
                'question_text' => 'A 90 km/h, dans des conditions normales, ma distance d’arrêt est d’environ :',
                'answers' => [
                    ['answer_text' => '25 mètres', 'is_correct' => false],
                    ['answer_text' => '54 mètres', 'is_correct' => false],
                    ['answer_text' => '81 mètres', 'is_correct' => true],
                ],
            ],
            // Question n°393
            [
                'question_text' => 'La règlementation du stationnement a pour objet :',
                'answers' => [
                    ['answer_text' => 'La sécurité', 'is_correct' => true],
                    ['answer_text' => 'La fluidité de la circulation', 'is_correct' => true],
                ],
            ],
            // Question n°394
            [
                'question_text' => 'Je suis en infraction si je suis en stationnement :',
                'answers' => [
                    ['answer_text' => 'Dangereux', 'is_correct' => true],
                    ['answer_text' => 'Abusif', 'is_correct' => true],
                    ['answer_text' => 'Gênant', 'is_correct' => true],
                ],
            ],
            // Question n°395
            [
                'question_text' => 'Dans quels cas faut-il réduire sa vitesse ?',
                'answers' => [
                    ['answer_text' => 'Lorsqu’il n’y a pas de panneau de signalisation', 'is_correct' => false],
                    ['answer_text' => 'Lorsque la route n’apparaît pas libre', 'is_correct' => true],
                    ['answer_text' => 'Dans les descentes rapides', 'is_correct' => true],
                    ['answer_text' => 'Lorsqu’on aborde une intersection', 'is_correct' => true],
                    ['answer_text' => 'A l’approche des montées.', 'is_correct' => false],
                ],
            ],
            // Question n°396
            [
                'question_text' => 'Lorsque je quitte momentanément mon véhicule pour acheter mon journal, je suis considéré comme étant :',
                'answers' => [
                    ['answer_text' => 'En arrêt', 'is_correct' => false],
                    ['answer_text' => 'En stationnement', 'is_correct' => true],
                ],
            ],
            // Question n°397
            [
                'question_text' => 'En général, se ranger en bataille s’effectue :',
                'answers' => [
                    ['answer_text' => 'En marche avant', 'is_correct' => false],
                    ['answer_text' => 'En marche arrière', 'is_correct' => true],
                ],
            ],
            // Question n°398
            [
                'question_text' => 'Pendant la durée de la période probatoire, la vitesse du conducteur sur une autoroute est ordinairement limitée à :',
                'answers' => [
                    ['answer_text' => '100 km/h', 'is_correct' => false],
                    ['answer_text' => '110 km/h', 'is_correct' => true],
                    ['answer_text' => '130 km/h', 'is_correct' => false],
                ],
            ],
            // Question n°399
            [
                'question_text' => 'En cas de visibilité réduite à 50mètres, la vitesse ne peut excéder :',
                'answers' => [
                    ['answer_text' => '90 km/h', 'is_correct' => false],
                    ['answer_text' => '60 km/h', 'is_correct' => false],
                    ['answer_text' => '50 km/h', 'is_correct' => true],
                ],
            ],
            // Question n°400
            [
                'question_text' => 'Sur une route de montagne, je stationne de préférence :',
                'answers' => [
                    ['answer_text' => 'En côte, sur la chaussée', 'is_correct' => false],
                    ['answer_text' => 'En descente, sur la chaussée', 'is_correct' => false],
                    ['answer_text' => 'Sur une place d’évitement', 'is_correct' => true],
                ],
            ],
        ];

        $currentQuestionOrder = 360;
        foreach ($questionsData as $data) {
            $question = Question::create([
                'quiz_id' => $quizId,
                'question_text' => $data['question_text'],
                'order' => $currentQuestionOrder,
                'type' => 'multiple_choice', 
                // 'image' => (condition pour l'image), // Ajoutez la logique pour l'image si nécessaire
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