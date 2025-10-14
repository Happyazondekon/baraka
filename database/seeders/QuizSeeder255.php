<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\Answer;

class QuizSeeder255 extends Seeder
{
    /**
     * Run the database seeds for "Les Règles de Priorité du module" (Q206-Q255, Quiz ID 5).
     *
     * @return void
     */
    public function run()
    {
        // ID du Quiz pour "Les Règles de Priorité du module"
        $quizId = 5;

        $questionsData = [
            // Question n°206
            [
                'question_text' => 'Les véhicules prioritaires sont :',
                'answers' => [
                    ['answer_text' => 'Police – Gendarmerie – corbillards en mission', 'is_correct' => false],
                    ['answer_text' => 'SAMU – SMUR-Sapeur-pompier – Gendarmerie en mission', 'is_correct' => true],
                    ['answer_text' => 'SAMU – corbillard – Police', 'is_correct' => false],
                ],
            ],
            // Question n°207
            [
                'question_text' => 'Les feux tricolores fonctionnent, cependant l’agent de sécurité règlemente la circulation :',
                'answers' => [
                    ['answer_text' => 'Je passe au feu vert', 'is_correct' => false],
                    ['answer_text' => 'Je ne passe que si je suis autorisé par l’agent de sécurité', 'is_correct' => true],
                    ['answer_text' => 'Je passe sans tenir compte ni du feu ni de l’agent de sécurité', 'is_correct' => false],
                ],
            ],
            // Question n°208
            [
                'question_text' => 'A une intersection munie à la fois de panneau et de feu tricolore fonctionnant normalement :',
                'answers' => [
                    ['answer_text' => 'Je me conforme à la fois au panneau et aux feux', 'is_correct' => false],
                    ['answer_text' => 'Je ne me conforme ni à l’un ni à l’autre', 'is_correct' => false],
                    ['answer_text' => 'Je me conforme uniquement aux feux', 'is_correct' => true],
                ],
            ],
            // Question n°209
            [
                'question_text' => 'Quelles sont les grandes règles de priorité ?',
                'answers' => [
                    ['answer_text' => 'La règle de courtoisie et le respect des agents de sécurité', 'is_correct' => false],
                    ['answer_text' => 'Le respect des feux et la règle de priorité à droite', 'is_correct' => false],
                    ['answer_text' => 'La priorité à droite, la priorité de passage et la perte de priorité', 'is_correct' => true],
                ],
            ],
            // Question n°210
            [
                'question_text' => 'La priorité à droite consiste à :',
                'answers' => [
                    ['answer_text' => 'Passer quand ma droite est libre', 'is_correct' => true],
                    ['answer_text' => 'Passer quand ma gauche est libre', 'is_correct' => false],
                    ['answer_text' => 'Serrer ma droite et tourner à droite', 'is_correct' => false],
                ],
            ],
            // Question n°211
            [
                'question_text' => 'Que faire à une intersection sans signalisation ?',
                'answers' => [
                    ['answer_text' => 'Céder le passage à droite', 'is_correct' => true],
                    ['answer_text' => 'Céder le passage à gauche', 'is_correct' => false],
                    ['answer_text' => 'Aller tout droit', 'is_correct' => false],
                ],
            ],
            // Question n°212
            [
                'question_text' => 'Que faire à une intersection de routes de même nature ?',
                'answers' => [
                    ['answer_text' => 'Céder le passage à droite', 'is_correct' => true],
                    ['answer_text' => 'Aller tout droit', 'is_correct' => false],
                    ['answer_text' => 'Céder le passage à droite et à gauche', 'is_correct' => false],
                ],
            ],
            // Question n°213
            [
                'question_text' => 'Les indications des agents de sécurité prévalent sur :',
                'answers' => [
                    ['answer_text' => 'Uniquement les feux tricolores', 'is_correct' => false],
                    ['answer_text' => 'Toutes signalisations', 'is_correct' => true],
                    ['answer_text' => 'Les règles de circulation', 'is_correct' => true],
                    ['answer_text' => 'Les feux de signalisation', 'is_correct' => true],
                ],
            ],
            // Question n°214
            [
                'question_text' => 'La priorité à droite consiste à :',
                'answers' => [
                    ['answer_text' => 'Céder le passage à tout véhicule venant de gauche comme de droite', 'is_correct' => false],
                    ['answer_text' => 'Céder le passage uniquement aux véhicules venant de la droite', 'is_correct' => true],
                    ['answer_text' => 'Ne céder le passage à aucun véhicule', 'is_correct' => false],
                ],
            ],
            // Question n°215
            [
                'question_text' => 'A l’intersection munie de feux tricolores dont le rouge est allumé, que dois-je faire ?',
                'answers' => [
                    ['answer_text' => 'Je m’arrête', 'is_correct' => true],
                    ['answer_text' => 'Je passe si je veux tourner à droite', 'is_correct' => false],
                    ['answer_text' => 'Je ralentis et je passe si la voie est libre', 'is_correct' => false],
                ],
            ],
            // Question n°216
            [
                'question_text' => 'A une distance raisonnable du feu jaune fixe, je me prépare à :',
                'answers' => [
                    ['answer_text' => 'Appliquer la règle de priorité à droite', 'is_correct' => false],
                    ['answer_text' => 'Passer', 'is_correct' => false],
                    ['answer_text' => 'M’arrêter', 'is_correct' => true],
                    ['answer_text' => 'Céder le passage', 'is_correct' => false],
                ],
            ],
            // Question n°217
            [
                'question_text' => 'Lorsque je vois de face l’agent de sécurité réglementant la circulation :',
                'answers' => [
                    ['answer_text' => 'Je passe', 'is_correct' => false],
                    ['answer_text' => 'Je ralentis et je passe', 'is_correct' => false],
                    ['answer_text' => 'J’applique la priorité à droite', 'is_correct' => false],
                    ['answer_text' => 'Je ralentis et je m’arrête.', 'is_correct' => true],
                ],
            ],
            // Question n°218
            [
                'question_text' => 'A cette intersection I17, quel doit être l’ordre de passage des véhicules ?',
                'answers' => [
                    ['answer_text' => 'Jaune – vert – bleu', 'is_correct' => false],
                    ['answer_text' => 'Bleu – vert – jaune', 'is_correct' => false],
                    ['answer_text' => 'Rien de tout ce qui précède', 'is_correct' => true],
                ],
            ],
            // Question n°219
            [
                'question_text' => 'Au carrefour à sens giratoire en agglomération :',
                'answers' => [
                    ['answer_text' => 'La priorité est toujours à droite', 'is_correct' => false],
                    ['answer_text' => 'La priorité peut être donnée à droite et à gauche', 'is_correct' => false],
                    ['answer_text' => 'Rien de tout ce qui précède', 'is_correct' => true],
                ],
            ],
            // Question n°220
            [
                'question_text' => 'A cette intersection I14, quel doit être l’ordre de passage des véhicules?',
                'answers' => [
                    ['answer_text' => '1. le véhicule bleu démarre, fait ¼ de tour et s’arrête 2. le véhicule rouge passe ensuite 3. le véhicule jaune passe 4. le véhicule bleu après', 'is_correct' => false],
                    ['answer_text' => '1. le véhicule vert démarre, fait ¼ de tour et s’arrête 2. le véhicule jaune passe, 3. le véhicule rouge passe ensuite 4. le véhicule vert passe après', 'is_correct' => true],
                ],
            ],
            // Question n°221
            [
                'question_text' => 'A une intersection munie de feux tricolores où un agent de sécurité réglemente la circulation, que dois-je faire ?',
                'answers' => [
                    ['answer_text' => 'Je respecte les feux', 'is_correct' => false],
                    ['answer_text' => 'Je passe si le feu est au vert', 'is_correct' => false],
                    ['answer_text' => 'Je suis les indications de l’agent', 'is_correct' => true],
                ],
            ],
            // Question n°222
            [
                'question_text' => 'A l’intersection d’une route revêtue et d’une route en terre, quelle est la règle de priorité à observer en agglomération ?',
                'answers' => [
                    ['answer_text' => 'La priorité de passage', 'is_correct' => false],
                    ['answer_text' => 'La perte de priorité', 'is_correct' => false],
                    ['answer_text' => 'La priorité à droite', 'is_correct' => true],
                ],
            ],
            // Question n°223
            [
                'question_text' => 'A l’intersection d’une route revêtue et d’une route en terre, quelle est la règle de priorité à observer hors agglomération par l’usager circulant sur la route en terre ?',
                'answers' => [
                    ['answer_text' => 'La priorité de passage', 'is_correct' => false],
                    ['answer_text' => 'La perte de priorité', 'is_correct' => true],
                    ['answer_text' => 'La priorité à droite', 'is_correct' => false],
                ],
            ],
            // Question n°224
            [
                'question_text' => 'Dans quels cas dois-je céder le passage aux usagers venant de gauche comme de droite ?',
                'answers' => [
                    ['answer_text' => 'Devant le feu rouge', 'is_correct' => true],
                    ['answer_text' => 'Devant le triangle pointe en bas (Cédez le passage)', 'is_correct' => true],
                    ['answer_text' => 'Devant le feu vert', 'is_correct' => false],
                    ['answer_text' => 'Quand je roule sur une route prioritaire', 'is_correct' => false],
                ],
            ],
            // Question n°225
            [
                'question_text' => 'Quel doit être l’ordre de passage des véhicules à cette intersection I3 ?',
                'answers' => [
                    ['answer_text' => 'Le véhicule rouge, le véhicule jaune et le véhicule bleu', 'is_correct' => false],
                    ['answer_text' => 'Le véhicule bleu, le véhicule jaune et le véhicule rouge', 'is_correct' => true],
                    ['answer_text' => 'Les véhicules jaune, rouge et bleu', 'is_correct' => false],
                ],
            ],
            // Question n°226
            [
                'question_text' => 'A cette intersection I7 :',
                'answers' => [
                    ['answer_text' => 'Il faut appliquer la règle de la priorité à droite', 'is_correct' => true],
                    ['answer_text' => 'Il faut appliquer la règle de courtoisie', 'is_correct' => false],
                    ['answer_text' => 'La voiture jaune doit céder le passage à la voiture rouge', 'is_correct' => false],
                    ['answer_text' => 'La voiture rouge doit céder le passage à la voiture jaune', 'is_correct' => true],
                ],
            ],
            // Question n°227
            [
                'question_text' => 'A l’intersection I9 :',
                'answers' => [
                    ['answer_text' => 'Le véhicule jaune peut tourner immédiatement à droite', 'is_correct' => true],
                    ['answer_text' => 'Le véhicule jaune peut tourner immédiatement à gauche', 'is_correct' => false],
                    ['answer_text' => 'Le véhicule jaune peut aller immédiatement tout droit', 'is_correct' => false],
                ],
            ],
            // Question n°228
            [
                'question_text' => 'A cette intersection I7, en agglomération, le véhicule rouge est sur la chaussée revêtue et le véhicule jaune est sur la chaussée en terre, quelle est la règle de priorité à observer ?',
                'answers' => [
                    ['answer_text' => 'La règle de courtoisie', 'is_correct' => false],
                    ['answer_text' => 'La règle de la priorité à droite', 'is_correct' => true],
                    ['answer_text' => 'La règle de la perte de priorité', 'is_correct' => false],
                    ['answer_text' => 'La règle de la priorité de passage', 'is_correct' => false],
                ],
            ],
            // Question n°229
            [
                'question_text' => 'A cette intersection I7, hors agglomération, le véhicule rouge est sur la chaussée revêtue et le véhicule jaune est sur la chaussée en terre, quelle est la règle de priorité à appliquer ?',
                'answers' => [
                    ['answer_text' => 'La priorité de passage par le véhicule rouge', 'is_correct' => true],
                    ['answer_text' => 'La perte de priorité par le véhicule jaune', 'is_correct' => true],
                    ['answer_text' => 'La priorité à droite par les deux véhicules', 'is_correct' => false],
                    ['answer_text' => 'La règle de courtoisie par les deux véhicules', 'is_correct' => false],
                ],
            ],
            // Question n°230
            [
                'question_text' => 'A cette intersection I8, quel doit être l’ordre de passage des véhicules ?',
                'answers' => [
                    ['answer_text' => '1. les véhicules, jaune, bleu et la moto passent simultanément 2. le véhicule rouge passe après', 'is_correct' => false],
                    ['answer_text' => '1. les véhicules jaune et bleu passent 2. le véhicule rouge passe 3. la moto passe après', 'is_correct' => true],
                ],
            ],
            // Question n°231
            [
                'question_text' => 'A cette intersection I9, qui passera définitivement le premier ?',
                'answers' => [
                    ['answer_text' => 'la moto', 'is_correct' => false],
                    ['answer_text' => 'le véhicule rouge', 'is_correct' => false],
                    ['answer_text' => 'le véhicule vert', 'is_correct' => true],
                    ['answer_text' => 'le véhicule jaune', 'is_correct' => false],
                ],
            ],
            // Question n°232
            [
                'question_text' => 'A une intersection de route de même valeur où aucun usager n’a sa droite libre, s’applique :',
                'answers' => [
                    ['answer_text' => 'la priorité de passage pour les usagers venant de droite et de gauche', 'is_correct' => false],
                    ['answer_text' => 'le jeu de courtoisie et ensuite la règle de la priorité à droite', 'is_correct' => true],
                    ['answer_text' => 'la perte de priorité de passage pour les usagers venant de face', 'is_correct' => false],
                ],
            ],
            // Question n°233
            [
                'question_text' => 'A cette intersection I10, quel doit être l’ordre de passage des véhicules ?',
                'answers' => [
                    ['answer_text' => '1. la moto 2. le véhicule jaune ensuite 3. le véhicule bleu après', 'is_correct' => false],
                    ['answer_text' => '1. le véhicule jaune 2. le véhicule bleu ensuite 3. la moto après', 'is_correct' => true],
                ],
            ],
            // Question n°234
            [
                'question_text' => 'A cette intersection I12, quel doit être l’ordre de passage des véhicules?',
                'answers' => [
                    ['answer_text' => 'le véhicule bleu, le véhicule rouge et le véhicule vert', 'is_correct' => false],
                    ['answer_text' => 'le véhicule vert démarre, fait ¼ de tour et s’arrête, le véhicule bleu tourne, le véhicule rouge passe et le vert continue', 'is_correct' => true],
                    ['answer_text' => 'le véhicule rouge avance en suivant le véhicule bleu qui tourne puis le véhicule vert tourne Après', 'is_correct' => false],
                ],
            ],
            // Question n°235
            [
                'question_text' => 'A cette intersection I18, quel doit être l’ordre de passage des véhicules?',
                'answers' => [
                    ['answer_text' => '- le véhicule orange marque un arrêt - les véhicules jaune, rouge et vert passent simultanément - le véhicule orange laisse passer les piétons et passera au feu vert.', 'is_correct' => true],
                    ['answer_text' => '– les véhicules jaune, rouge et vert passent simultanément - le véhicule orange qui a vu la flèche verte tourne à droite', 'is_correct' => false],
                    ['answer_text' => '- véhicule orange tourne immédiatement - les véhicules jaune, rouge et vert passent simultanément', 'is_correct' => false],
                ],
            ],
            // Question n°236
            [
                'question_text' => 'Avant cette intersection I6, quel panneau ont rencontré les véhicules jaune et rouge ?',
                'answers' => [
                    ['answer_text' => 'panneau indiquant l’intersection d’une route à grande circulation', 'is_correct' => false],
                    ['answer_text' => 'panneau indiquant le caractère prioritaire de la route', 'is_correct' => true],
                ],
            ],
            // Question n°237
            [
                'question_text' => 'A cette intersection I17, quel sera l’ordre de passage ?',
                'answers' => [
                    ['answer_text' => 'le véhicule jaune, le véhicule vert et le véhicule bleu', 'is_correct' => false],
                    ['answer_text' => 'le véhicule bleu, le véhicule vert et le véhicule jaune', 'is_correct' => false],
                    ['answer_text' => 'le véhicule bleu passe derrière le véhicule jaune et le véhicule vert après', 'is_correct' => true],
                ],
            ],
            // Question n°238
            [
                'question_text' => 'A cette intersection I22, quel sera l’ordre de passage ?',
                'answers' => [
                    ['answer_text' => 'Les véhicules jaune et bleu passent simultanément le véhicule rouge laisse passer les piétons et tourne à droite', 'is_correct' => true],
                    ['answer_text' => 'Le véhicule rouge tourne immédiatement à droite et les véhicules jaune et bleu passent après', 'is_correct' => false],
                    ['answer_text' => 'Pendant que les véhicules jaune et bleu passent simultanément, le véhicule rouge tourne à droite', 'is_correct' => false],
                ],
            ],
            // Question n°239
            [
                'question_text' => 'Au carrefour à sens giratoire en agglomération :',
                'answers' => [
                    ['answer_text' => 'La priorité est toujours à droite', 'is_correct' => false],
                    ['answer_text' => 'La priorité est donnée aux véhicules engagés dans le sens giratoire', 'is_correct' => true],
                    ['answer_text' => 'La priorité peut être donnée à gauche et à droite', 'is_correct' => false],
                ],
            ],
            // Question n°240
            [
                'question_text' => 'Sur cette image PN1, le véhicule bleu doit :',
                'answers' => [
                    ['answer_text' => 'S’arrêter devant la demi-barrière et attendre le passage du train', 'is_correct' => false],
                    ['answer_text' => 'Attendre que la demi-barrière s’élève et que le feu rouge s’éteigne avant de démarrer', 'is_correct' => true],
                    ['answer_text' => 'Pouvoir se faufiler entre les demi-barrières pour partir après le passage du train', 'is_correct' => false],
                ],
            ],
            // Question n°241
            [
                'question_text' => 'Sur cette image PN3, les véhicules rouge et bleu doivent :',
                'answers' => [
                    ['answer_text' => 'Passer', 'is_correct' => false],
                    ['answer_text' => 'Attendre devant le premier panneau de signalisation et passer après l’avion', 'is_correct' => false],
                    ['answer_text' => 'Attendre devant le deuxième panneau de signalisation et ne passer qu’après l’extinction du feu', 'is_correct' => true],
                ],
            ],
            // Question n°242
            [
                'question_text' => 'Sur cette image PN1, le véhicule bleu se situe à :',
                'answers' => [
                    ['answer_text' => '150m environ du passage à niveau', 'is_correct' => false],
                    ['answer_text' => '100m environ du passage à niveau', 'is_correct' => true],
                    ['answer_text' => '50m environ du passage à niveau', 'is_correct' => false],
                ],
            ],
            // Question n°243
            [
                'question_text' => 'Sur une route où il y a un panneau STOP, l’arrêt se fait :',
                'answers' => [
                    ['answer_text' => 'Exactement devant le panneau', 'is_correct' => false],
                    ['answer_text' => 'A la limite de la visibilité en l’absence de ligne blanche au sol', 'is_correct' => true],
                    ['answer_text' => 'Si à la ligne blanche, la visibilité est insuffisante, on marque un second arrêt à la limite de la chaussée abordée', 'is_correct' => true],
                ],
            ],
            // Question n°244
            [
                'question_text' => 'A cette intersection I11, quel sera l’ordre de passage ?',
                'answers' => [
                    ['answer_text' => '1- la moto 2- le véhicule jaune ensuite 3- le véhicule rouge après', 'is_correct' => false],
                    ['answer_text' => '1- le véhicule jaune 2- le véhicule rouge ensuite 3- la moto après', 'is_correct' => true],
                ],
            ],
            // Question n°245
            [
                'question_text' => 'A cette intersection I12, quel est le véhicule qui passera définitivement le premier ?',
                'answers' => [
                    ['answer_text' => 'le véhicule rouge', 'is_correct' => false],
                    ['answer_text' => 'le véhicule bleu', 'is_correct' => true],
                    ['answer_text' => 'Le véhicule vert', 'is_correct' => false],
                ],
            ],
            // Question n°246
            [
                'question_text' => 'A cette intersection I24, quel sera l’ordre de passage ?',
                'answers' => [
                    ['answer_text' => '1- le véhicule bleu 2- le véhicule rouge ensuite 3- le véhicule vert après', 'is_correct' => false],
                    ['answer_text' => '1- le véhicule vert 2- le véhicule bleu ensuite 3- le véhicule rouge après', 'is_correct' => true],
                ],
            ],
            // Question n°247
            [
                'question_text' => 'A cette intersection I26, quel est le véhicule qui passera le premier ?',
                'answers' => [
                    ['answer_text' => 'Le véhicule vert', 'is_correct' => false],
                    ['answer_text' => 'Le véhicule Jaune', 'is_correct' => false],
                    ['answer_text' => 'Le véhicule Rouge', 'is_correct' => true],
                    ['answer_text' => 'Le véhicule bleu', 'is_correct' => false],
                ],
            ],
            // Question n°248
            [
                'question_text' => 'Quel panneau verra le véhicule jaune à cette intersection I3 ?',
                'answers' => [
                    ['answer_text' => 'Panneau d’intersection de deux routes de même nature', 'is_correct' => true],
                    ['answer_text' => 'Panneau indiquant le caractère prioritaire d’une route', 'is_correct' => false],
                    ['answer_text' => 'Aucun panneau', 'is_correct' => false],
                ],
            ],
            // Question n°249
            [
                'question_text' => 'A cette intersection I14, quel est le véhicule qui passera définitivement le premier ?',
                'answers' => [
                    ['answer_text' => 'Le véhicule bleu', 'is_correct' => false],
                    ['answer_text' => 'Le véhicule Rouge', 'is_correct' => false],
                    ['answer_text' => 'Le véhicule jaune', 'is_correct' => true],
                ],
            ],
            // Question n°250
            [
                'question_text' => 'A cette intersection I1, quel est l’ordre de passage ?',
                'answers' => [
                    ['answer_text' => '1- Le véhicule jaune 2- Le véhicule rouge 3- Le véhicule vert', 'is_correct' => false],
                    ['answer_text' => '1- Le véhicule rouge 2- Les véhicules jaune et vert ensuite', 'is_correct' => true],
                ],
            ],
            // Question n°251
            [
                'question_text' => 'A cette intersection I5, quel sera l’ordre de passage ?',
                'answers' => [
                    ['answer_text' => '1-le véhicule vert marque un arrêt 2- les véhicules rouge et jaune passent ensuite 3- enfin le véhicule vert passe', 'is_correct' => false],
                    ['answer_text' => '1- le véhicule rouge passe 2- le véhicule vert passe 3- le véhicule jaune passe après', 'is_correct' => true],
                ],
            ],
            // Question n°252
            [
                'question_text' => 'A cette intersection I14, quel sera l’ordre de passage ?',
                'answers' => [
                    ['answer_text' => '1- le véhicule vert passe 2- le véhicule jaune passe ensuite 3- Enfin le véhicule rouge passe', 'is_correct' => false],
                    ['answer_text' => '1-le véhicule vert démarre, fait un quart de tour et s’arrête 2- le véhicule rouge passe 3- le véhicule vert passe ensuite 4- enfin le véhicule jaune passe', 'is_correct' => false],
                    ['answer_text' => '1- le véhicule vert démarre fait un quart de tour et s’arrête 2- le véhicule jaune passe 3- le véhicule rouge passe ensuite 4- – enfin le véhicule vert passe', 'is_correct' => true],
                ],
            ],
            // Question n°253
            [
                'question_text' => 'A cette intersection I23, quel sera l’ordre de passage ?',
                'answers' => [
                    ['answer_text' => '1- les véhicules jaune et rouge passent 2- les véhicules jaune et bleu passent après', 'is_correct' => false],
                    ['answer_text' => '1- les véhicules jaune et bleu s’arrêtent 2-les véhicules rouge et jaune passent 3- le véhicule bleu tourne', 'is_correct' => true],
                    ['answer_text' => '1- le véhicule bleu tourne 2- les véhicules jaune et rouge passent 3- le véhicule jaune passe au feu vert', 'is_correct' => false],
                ],
            ],
            // Question n°254
            [
                'question_text' => 'A cette intersection I 26, quel sera l’ordre de passage ?',
                'answers' => [
                    ['answer_text' => '1- les véhicules jaune et vert passent 2- le véhicule bleu et le véhicule rouge marque un arrêt', 'is_correct' => false],
                    ['answer_text' => '1- les véhicules jaune, bleu et vert marquent un arrêt 2- le véhicule rouge passe 3- les véhicules qui auront le feu vert passeront après le véhicule rouge', 'is_correct' => true],
                ],
            ],
            // Question n°255
            [
                'question_text' => 'Quel panneau le conducteur du véhicule bleu peut rencontrer à cette intersection I15 ?',
                'answers' => [
                    ['answer_text' => 'Panneau d’intersection de deux routes de même nature', 'is_correct' => false],
                    ['answer_text' => 'Panneau d’intersection d’une route à grande circulation et d’une route secondaire', 'is_correct' => true],
                    ['answer_text' => 'Panneau indiquant le caractère prioritaire d’une route', 'is_correct' => true],
                    ['answer_text' => 'Panneau indiquant la fin du caractère prioritaire d’une route', 'is_correct' => false],
                ],
            ],
        ];

        $currentQuestionOrder = 206;
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