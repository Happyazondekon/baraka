<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Module;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Answer;

class ModuleSignalisationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Créer le Module
        $module = Module::firstOrCreate(
            ['title' => 'Les Différentes Signalisations Routières'],
            ['description' => 'Ce module couvre les différents types de signalisation routière : verticale, horizontale, lumineuse et les signes des agents.']
        );

        // 2. Créer le Quiz
        $quiz = Quiz::firstOrCreate(
            ['module_id' => $module->id, 'title' => 'Les Différentes Signalisations Routières'],
            [
                'description' => 'Quiz sur les 148 questions portant sur les différents types de signalisation.',
                'time_limit' => 120, // Exemple : 120 minutes (2h) pour 148 questions
                'passing_score' => 70, // Score de passage de 70%
            ]
        );

        // --- Définition des Questions et Réponses ---
        $questionsData = [
            [
                'question_text' => 'Quelles sont les différentes signalisations routières ?',
                'answers' => [
                    ['text' => 'La signalisation verticale, horizontale, lumineuse et les signes des agents', 'is_correct' => true],
                    ['text' => 'Les intersections en X, en Y et en T', 'is_correct' => false],
                    ['text' => 'Les lignes continues, les lignes discontinues et les lignes mixtes', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'La signalisation horizontale est :',
                'answers' => [
                    ['text' => 'L’ensemble des marques peintes sur la chaussée', 'is_correct' => true],
                    ['text' => 'L’ensemble des signes des agents de sécurité', 'is_correct' => false],
                    ['text' => 'L’ensemble des règles applicables en agglomération', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'La ligne continue blanche centrale :',
                'answers' => [
                    ['text' => 'Autorise le dépassement', 'is_correct' => false],
                    ['text' => 'Interdit le dépassement', 'is_correct' => true],
                    ['text' => 'Est réservée pour l’arrêt des bus', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'La ligne discontinue blanche centrale :',
                'answers' => [
                    ['text' => 'Interdit la circulation à droite', 'is_correct' => false],
                    ['text' => 'Autorise le dépassement', 'is_correct' => true],
                    ['text' => 'Est réservée pour l’arrêt des bus', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'Les traits de la ligne discontinue blanche centrale hors agglomération ont une longueur de :',
                'answers' => [
                    ['text' => '20m', 'is_correct' => false],
                    ['text' => '1,33m', 'is_correct' => false],
                    ['text' => '3m', 'is_correct' => true],
                ],
            ],
            [
                'question_text' => 'La ligne mixte autorise le dépassement :',
                'answers' => [
                    ['text' => 'Si la ligne discontinue est plus proche du conducteur', 'is_correct' => true],
                    ['text' => 'Si la ligne continue est plus proche du conducteur', 'is_correct' => false],
                    ['text' => 'Si la chaussée est assez large', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'La ligne jaune continue sur la bordure du trottoir :',
                'answers' => [
                    ['text' => 'Interdit le stationnement', 'is_correct' => true],
                    ['text' => 'Autorise l’arrêt', 'is_correct' => false],
                    ['text' => 'Indique une zone d’arrêt de bus', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'L’intervalle entre deux traits d’une ligne discontinue blanche centrale est de :',
                'answers' => [
                    ['text' => '10m', 'is_correct' => true],
                    ['text' => '5m', 'is_correct' => false],
                    ['text' => '15m', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'La ligne jaune discontinue sur la bordure du trottoir :',
                'answers' => [
                    ['text' => 'Interdit le stationnement', 'is_correct' => true],
                    ['text' => 'Autorise l’arrêt', 'is_correct' => true],
                    ['text' => 'Indique une zone d’arrêt de bus', 'is_correct' => false],
                ],
                'is_multiple_choice' => true,
            ],
            [
                'question_text' => 'La ligne jaune brisée en bordure de la chaussée :',
                'answers' => [
                    ['text' => 'Interdit le dépassement', 'is_correct' => false],
                    ['text' => 'Autorise le dépassement', 'is_correct' => false],
                    ['text' => 'Indique une zone d’arrêt de bus', 'is_correct' => true],
                ],
            ],
            [
                'question_text' => 'A la vue de la flèche de rabattement, je dois :',
                'answers' => [
                    ['text' => 'M’arrêter', 'is_correct' => false],
                    ['text' => 'Serrer ma droite', 'is_correct' => true],
                    ['text' => 'Rétrograder', 'is_correct' => false],
                    ['text' => 'Dépasser', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'La circulation sur les bandes d’arrêt d’urgence de l’autoroute est autorisée :',
                'answers' => [
                    ['text' => 'Aux ambulances effectuant un transport urgent de blessés', 'is_correct' => true],
                    ['text' => 'A tous les véhicules en cas d’embouteillage', 'is_correct' => false],
                    ['text' => 'Aux services d’entretien se rendant sur un lieu d’intervention', 'is_correct' => true],
                    ['text' => 'Aux véhicules prioritaires en mission', 'is_correct' => true],
                ],
                'is_multiple_choice' => true,
            ],
            [
                'question_text' => 'La bande rouge discontinue de blanc le long du trottoir, interdit :',
                'answers' => [
                    ['text' => 'L’arrêt', 'is_correct' => false],
                    ['text' => 'Le stationnement', 'is_correct' => true],
                    ['text' => 'L’arrêt pour les véhicules légers', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'Sur les lignes hachurées appelées zébras :',
                'answers' => [
                    ['text' => 'Je peux stationner', 'is_correct' => false],
                    ['text' => 'Je peux circuler', 'is_correct' => false],
                    ['text' => 'Je ne peux ni stationner, ni circuler, ni m’arrêter', 'is_correct' => true],
                    ['text' => 'Je peux m’arrêter', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'A la vue du panneau C13 (Panneau bleu carré avec voiture et voie barrée - Chemin sans issue) :',
                'image' => 'C13.png', // Exemple d'image si vous en avez une
                'answers' => [
                    ['text' => 'Je suis sur un chemin sans issue.', 'is_correct' => true],
                    ['text' => 'Je suis prioritaire à la prochaine intersection', 'is_correct' => false],
                    ['text' => 'Je dois aller tout droit seulement', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'A la rencontre du panneau "STOP" que dois-je faire ?',
                'answers' => [
                    ['text' => 'Je cède le passage à droite', 'is_correct' => false],
                    ['text' => 'Je cède le passage à droite et à gauche', 'is_correct' => false],
                    ['text' => 'Je m’arrête avant le panneau et je cède le passage aux usagers venant de ma droite et de ma gauche', 'is_correct' => false],
                    ['text' => 'Je m’arrête après le panneau et je cède le passage aux usagers venant de ma gauche et de ma droite', 'is_correct' => true], // *Note: La réponse classique pour STOP est de s'arrêter à la ligne et céder D/G. Ici, la réponse donnée est D, à vérifier selon le code local.*
                ],
            ],
            [
                'question_text' => 'Que signifie le panneau A15 c (Panneau triangulaire avec un cavalier) ?',
                'image' => 'A15c.png',
                'answers' => [
                    ['text' => 'Voie réservée aux chevaux', 'is_correct' => false],
                    ['text' => 'Endroits fréquentés par les animaux domestiques', 'is_correct' => false],
                    ['text' => 'Passage de cavaliers.', 'is_correct' => true],
                ],
            ],
            [
                'question_text' => 'Que m’indique le panneau A19 (Panneau triangulaire avec des pierres) ?',
                'image' => 'A19.png',
                'answers' => [
                    ['text' => 'Chute de grêle', 'is_correct' => false],
                    ['text' => 'Chute de neige', 'is_correct' => false],
                    ['text' => 'Risque de chute de pierres sur la chaussée.', 'is_correct' => true],
                    ['text' => 'Présence de pierres sur la chaussée', 'is_correct' => true],
                ],
                'is_multiple_choice' => true,
            ],
            [
                'question_text' => 'Que signifie le panneau A21a (Panneau triangulaire avec un vélo et une flèche gauche/droite) ?',
                'image' => 'A21a.png',
                'answers' => [
                    ['text' => 'Voie réservée aux cyclistes', 'is_correct' => false],
                    ['text' => 'Débouché de cyclistes ou cyclomotoristes venant de droite ou de gauche', 'is_correct' => true],
                    ['text' => 'Débouché de cyclistes ou de cyclomotoristes venant de droite seulement.', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'Devant le panneau triangulaire pointe en bas (Cédez le passage - AB3a), que dois-je faire ?',
                'image' => 'AB3a.png',
                'answers' => [
                    ['text' => 'Je cède le passage à droite et à gauche', 'is_correct' => true],
                    ['text' => 'Je cède le passage à droite seulement', 'is_correct' => false],
                    ['text' => 'Je passe', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'Qu’indique le panneau triangulaire portant une flèche barrée (Panneau de danger - Attention, priorité perdue) ?',
                'image' => 'AB2.png',
                'answers' => [
                    ['text' => 'Arrêt obligatoire', 'is_correct' => false],
                    ['text' => 'Priorité à droite', 'is_correct' => false],
                    ['text' => 'Priorité à gauche', 'is_correct' => false],
                    ['text' => 'Priorité de passage', 'is_correct' => true], // *Réponse d'après le contexte. Panneau losange barré (Fin de priorité) est D42/AB7, Panneau AB2 est une intersection où l'on perd la priorité.*
                ],
            ],
            [
                'question_text' => 'A la vue du panneau AB6 (Panneau carré fond jaune avec bande blanche - Route à caractère prioritaire) que dois-je faire à la prochaine intersection ?',
                'image' => 'AB6.png',
                'answers' => [
                    ['text' => 'Je m’arrête', 'is_correct' => false],
                    ['text' => 'Je cède le passage à droite', 'is_correct' => false],
                    ['text' => 'Je passe', 'is_correct' => true],
                    ['text' => 'Je cède le passage à gauche', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'Que m’indique le panneau A1d1 (Panneau triangulaire avec une succession de virages, premier à gauche, et panonceau 5km) ?',
                'image' => 'A1d1.png',
                'answers' => [
                    ['text' => 'Succession de virage dont le 1er est à droite à 5 km', 'is_correct' => false],
                    ['text' => 'Succession de virage sur 5 km dont le 1er est à gauche', 'is_correct' => true],
                    ['text' => 'Succession de virage sur 5 km dont le 1er est à droite', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'Que signifie le panneau A3a1 (Panneau triangulaire avec chaussée rétrécie par la droite et panonceau 200m) ?',
                'image' => 'A3a1.png',
                'answers' => [
                    ['text' => 'Chaussée rétrécie par la gauche à 200m', 'is_correct' => false],
                    ['text' => 'Chaussée rétrécie par la droite sur 200m', 'is_correct' => false],
                    ['text' => 'Chaussée rétrécie par la gauche sur 200m', 'is_correct' => false],
                    ['text' => 'Chaussée rétrécie par la droite à 200m', 'is_correct' => true],
                ],
            ],
            [
                'question_text' => 'A la vue du panneau triangulaire pointe en bas à une intersection (Cédez le passage - AB3a), quel genre de panneau peuvent rencontrer les usagers venant de gauche et de droite ?',
                'answers' => [
                    ['text' => 'Panneau "STOP"', 'is_correct' => false],
                    ['text' => 'Panneau losange fond jaune barré', 'is_correct' => false],
                    ['text' => 'Panneau flèche barrée (AB2 - Intersection avec perte de priorité)', 'is_correct' => true],
                    ['text' => 'Panneau losange fond jaune (AB6 - Route prioritaire)', 'is_correct' => true],
                ],
                'is_multiple_choice' => true,
            ],
            [
                'question_text' => 'En agglomération, les panneaux de danger sont implantés à quelle distance du danger ?',
                'answers' => [
                    ['text' => '150m', 'is_correct' => false],
                    ['text' => '200m', 'is_correct' => false],
                    ['text' => '50m', 'is_correct' => true],
                    ['text' => '250m', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'En rase campagne, à quelle distance sont implantés les panneaux de danger ?',
                'answers' => [
                    ['text' => '50m', 'is_correct' => false],
                    ['text' => '150m', 'is_correct' => true],
                    ['text' => '200m', 'is_correct' => false],
                    ['text' => '250m', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'Que dois-je faire devant un panneau de danger ?',
                'answers' => [
                    ['text' => 'Augmenter ma vitesse', 'is_correct' => false],
                    ['text' => 'Réduire ma vitesse', 'is_correct' => true],
                    ['text' => 'Maintenir ma vitesse', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'Devant un panneau de danger :',
                'answers' => [
                    ['text' => 'Je peux marquer un arrêt', 'is_correct' => false],
                    ['text' => 'Je peux stationner', 'is_correct' => false],
                    ['text' => 'Je ne peux ni m’arrêter ni stationner', 'is_correct' => true],
                ],
            ],
            [
                'question_text' => 'Quel danger signale le panneau A21b (Panneau triangulaire avec un vélo et une flèche gauche seule) ?',
                'image' => 'A21b.png',
                'answers' => [
                    ['text' => 'Voie réservée aux cyclistes', 'is_correct' => false],
                    ['text' => 'Voie interdite aux cyclistes', 'is_correct' => false],
                    ['text' => 'Débouché de cyclistes venant de gauche seulement', 'is_correct' => true],
                    ['text' => 'Débouché de cyclistes venant de gauche ou de droite', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'Quel danger signale le panneau A20 (Panneau triangulaire avec une voiture qui tombe dans l\'eau) ?',
                'image' => 'A20.png',
                'answers' => [
                    ['text' => 'Débouché sur un pont mobile', 'is_correct' => false],
                    ['text' => 'Débouché sur un quai ou une berge', 'is_correct' => true],
                    ['text' => 'Descente dangereuse', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'Quel danger signale le panneau A16 (Panneau triangulaire avec une voiture qui descend une pente raide) ?',
                'image' => 'A16.png',
                'answers' => [
                    ['text' => 'Débouché sur un quai ou une berge', 'is_correct' => false],
                    ['text' => 'Descente dangereuse', 'is_correct' => true],
                    ['text' => 'Débouché sur un pont mobile', 'is_correct' => false],
                    ['text' => 'Débouché sur un quai ou une berge', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'Quel danger signale le panneau A6 (Panneau triangulaire avec un pont levé) ?',
                'image' => 'A6.png',
                'answers' => [
                    ['text' => 'Descente dangereuse', 'is_correct' => false],
                    ['text' => 'Débouché sur un pont mobile', 'is_correct' => true],
                    ['text' => 'Débouché sur un quai ou une berge', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'Que signifie le panneau B6a1 (Panneau rond cerclé rouge barré en diagonale avec une seule bande rouge dans le cadran inférieur gauche - Stationnement interdit à partir du panneau) ?',
                'image' => 'B6a1.png',
                'answers' => [
                    ['text' => 'Stationnement interdit avant le panneau', 'is_correct' => false],
                    ['text' => 'Arrêt et stationnement interdits', 'is_correct' => false],
                    ['text' => 'Stationnement interdit à partir du panneau', 'is_correct' => true],
                ],
            ],
            [
                'question_text' => 'A la vue du panneau B6a1 (Stationnement interdit à partir du panneau) :',
                'answers' => [
                    ['text' => 'Je peux m’arrêter avant ou après le panneau', 'is_correct' => true],
                    ['text' => 'Je peux stationner après le panneau', 'is_correct' => false],
                    ['text' => 'Je peux stationner avant le panneau', 'is_correct' => true],
                ],
                'is_multiple_choice' => true,
            ],
            [
                'question_text' => 'A la vue du panneau B6b1 (Panneau rond cerclé rouge barré en diagonale avec deux bandes rouges - Fin d\'interdiction de stationner) :',
                'image' => 'B6b1.png',
                'answers' => [
                    ['text' => 'Je peux stationner dans la première rue à droite après le panneau', 'is_correct' => false],
                    ['text' => 'Je peux stationner dans la rue où se trouve le panneau mais à gauche', 'is_correct' => false],
                    ['text' => 'Je ne peux stationner nulle part dans la rue où se trouve le panneau', 'is_correct' => true], // *Ceci est la fin d'interdiction, donc la réponse devrait être fausse. Cependant, en l'absence du panneau B6a1, la règle locale peut interdire.* On suit la réponse c.
                ],
            ],
            [
                'question_text' => 'Le panneau B0 (Rond rouge barré en son milieu - Sens interdit) :',
                'image' => 'B0.png',
                'answers' => [
                    ['text' => 'M’interdit de circuler dans les deux sens', 'is_correct' => true],
                    ['text' => 'M’interdit quelque chose qui sera indiqué après', 'is_correct' => false],
                    ['text' => 'M’oblige à faire demi-tour si possible', 'is_correct' => true],
                ],
                'is_multiple_choice' => true,
            ],
            [
                'question_text' => 'Le panneau B7a (Rond cerclé rouge avec une voiture et une moto - Accès interdit aux véhicules à moteur sauf les deux-roues sans side-car) :',
                'image' => 'B7a.png',
                'answers' => [
                    ['text' => 'Interdit aux motocyclistes de dépasser les voitures', 'is_correct' => false],
                    ['text' => 'Interdit l’accès aux autos et aux motos', 'is_correct' => true], // *Le panneau B7b interdit les motos, le B7a interdit les voitures et les motos (plus large que la norme française).* On suit la réponse b.
                    ['text' => 'Interdit l’accès aux deux roues', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'A la vue du panneau B25 (Rond bleu avec un nombre - Vitesse minimale obligatoire 30 km/h) :',
                'image' => 'B25.png',
                'answers' => [
                    ['text' => 'Je peux rouler à 25km/h', 'is_correct' => false],
                    ['text' => 'Je peux rouler à 40km/h', 'is_correct' => true],
                    ['text' => 'Je dois rouler au moins à 30 km/h', 'is_correct' => true],
                ],
                'is_multiple_choice' => true,
            ],
            [
                'question_text' => 'Le panneau B21-1 (Rond bleu avec flèche à droite) m’oblige à :',
                'image' => 'B21-1.png',
                'answers' => [
                    ['text' => 'Tourner à droite à la prochaine intersection', 'is_correct' => false],
                    ['text' => 'Tourner à droite avant le panneau', 'is_correct' => true],
                    ['text' => 'Tourner à droite après le panneau', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'La balise J4 (Balise de virage) annonce :',
                'image' => 'J4.png',
                'answers' => [
                    ['text' => 'Un virage très dangereux', 'is_correct' => true],
                    ['text' => 'Une déviation prochaine', 'is_correct' => false],
                    ['text' => 'Un rétrécissement de la chaussée', 'is_correct' => true], // *La balise J4 n'indique pas un rétrécissement, mais on suit la réponse a-c.*
                ],
                'is_multiple_choice' => true,
            ],
            [
                'question_text' => 'Sur les bandes et les pistes cyclables :',
                'answers' => [
                    ['text' => 'Les automobilistes peuvent s’arrêter pour prendre un passager', 'is_correct' => false],
                    ['text' => 'Les piétons peuvent circuler', 'is_correct' => false],
                    ['text' => 'Les automobilistes peuvent stationner en cas de panne', 'is_correct' => false],
                    ['text' => 'Rien de tout ce qui précède', 'is_correct' => true],
                ],
            ],
            [
                'question_text' => 'Le panneau A25 (Panneau triangulaire avec une flèche circulaire - Carrefour à sens giratoire) signifie :',
                'image' => 'A25.png',
                'answers' => [
                    ['text' => 'Carrefour à sens giratoire', 'is_correct' => true],
                    ['text' => 'Terre-plein à contourner par la droite', 'is_correct' => true],
                    ['text' => 'Céder le passage aux usagers venant de droite', 'is_correct' => false],
                    ['text' => 'Céder le passage aux usagers venant de gauche', 'is_correct' => true], // *La norme française n'est pas "céder aux usagers venant de gauche", mais on suit la réponse a-b-d.*
                ],
                'is_multiple_choice' => true,
            ],
            [
                'question_text' => 'Que signifie le panneau B15 (Rond cerclé rouge et flèches rouge/noire - Cédez le passage à la circulation venant en sens inverse) ?',
                'image' => 'B15.png',
                'answers' => [
                    ['text' => 'Chaussée à double sens', 'is_correct' => false],
                    ['text' => 'Céder le passage aux usagers venant en sens inverse', 'is_correct' => true],
                    ['text' => 'Circulation à sens unique', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'Quel danger signale le panneau A18 (Panneau triangulaire avec flèches haut/bas - Circulation dans les deux sens) ?',
                'image' => 'A18.png',
                'answers' => [
                    ['text' => 'Céder le passage aux usagers venant en sens inverse', 'is_correct' => false],
                    ['text' => 'Circulation dangereuse dans les deux sens', 'is_correct' => true],
                    ['text' => 'Chaussée rétrécie dans les deux sens', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'A quelle distance du danger est implanté le panneau A18 (Circulation dans les deux sens) ?',
                'answers' => [
                    ['text' => '150m', 'is_correct' => false],
                    ['text' => '50m', 'is_correct' => false],
                    ['text' => '0m', 'is_correct' => true], // Car c'est un panneau de position
                ],
            ],
            [
                'question_text' => 'A la rencontre du panneau B15 (Cédez le passage à la circulation venant en sens inverse), quel panneau l’usager venant en sens inverse aurait rencontré ?',
                'answers' => [
                    ['text' => 'Le panneau "sens interdit"', 'is_correct' => false],
                    ['text' => 'Le panneau "chaussée rétrécie"', 'is_correct' => false],
                    ['text' => 'Le panneau "priorité par rapport à la circulation venant en sens inverse" (B16)', 'is_correct' => true],
                ],
            ],
            [
                'question_text' => 'A la vue du panneau B1 (Rond rouge - Accès interdit), quel panneau l’usager venant en sens inverse aurait rencontré ?',
                'image' => 'B1.png',
                'answers' => [
                    ['text' => 'Le panneau "priorité par rapport à la circulation venant en sens inverse"', 'is_correct' => false],
                    ['text' => 'Le panneau "céder le passage à la circulation venant en sens inverse"', 'is_correct' => false],
                    ['text' => 'Le panneau "circulation à sens unique" (C12)', 'is_correct' => true],
                ],
            ],
            [
                'question_text' => 'Que signifie le panneau B8 (Rond cerclé rouge avec un camion - Accès interdit aux véhicules de transport de marchandises) ?',
                'image' => 'B8.png',
                'answers' => [
                    ['text' => 'Voie réservée aux véhicules de transport de marchandises', 'is_correct' => false],
                    ['text' => 'Voie réservée aux véhicules de transport en commun de personnes', 'is_correct' => false],
                    ['text' => 'Accès interdit aux véhicules de transport de marchandises', 'is_correct' => true],
                ],
            ],
            [
                'question_text' => 'Que signifie le panneau B18a (Rond cerclé rouge avec un camion transportant un produit explosif) ?',
                'image' => 'B18a.png',
                'answers' => [
                    ['text' => 'Accès interdit aux véhicules transportant des produits explosifs ou facilement inflammables', 'is_correct' => true],
                    ['text' => 'Accès interdit aux véhicules transportant des produits de nature à polluer les eaux', 'is_correct' => false],
                    ['text' => 'Accès interdit aux véhicules transportant des matières dangereuses', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'A la vue du panneau A1c (Succession de virages, premier à droite), je ralentis :',
                'image' => 'A1c.png',
                'answers' => [
                    ['text' => 'Avant chaque virage', 'is_correct' => true],
                    ['text' => 'Dans chaque virage', 'is_correct' => false],
                    ['text' => 'Après chaque virage', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'En présence du panneau "stationnement interdit" (B6a1), je suis autorisé à :',
                'answers' => [
                    ['text' => 'Stationner avant le panneau', 'is_correct' => true],
                    ['text' => 'Stationner après le panneau', 'is_correct' => false],
                    ['text' => 'Stationner avant la prochaine intersection', 'is_correct' => false], // Vrai seulement si l'interdiction n'est pas rappelée
                ],
            ],
            [
                'question_text' => 'Que signifie le panneau B12(1) (Rond cerclé rouge avec une hauteur de 3,5m et un panonceau 10km) ?',
                'image' => 'B12_1.png',
                'answers' => [
                    ['text' => 'Accès interdit à 10km au véhicule dont la hauteur avec ou sans chargement dépasse 3,5m', 'is_correct' => true],
                    ['text' => 'Accès interdit sur 10km au véhicule dont la hauteur avec ou sans chargement dépasse 3,5m', 'is_correct' => false],
                    ['text' => 'Accès interdit au véhicule dont la hauteur avec ou sans chargement dépasse 3,5m', 'is_correct' => false],
                    ['text' => 'Vitesse limitée à 10km/h aux véhicules dont la hauteur avec ou sans chargement dépasse 3,5m', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'Que signifie le panneau B34a (Rond blanc barré en diagonale avec un camion et une voiture - Fin d\'interdiction de dépasser pour les véhicules de transport de marchandises) ?',
                'image' => 'B34a.png',
                'answers' => [
                    ['text' => 'Dépassement interdit aux camions', 'is_correct' => false],
                    ['text' => 'Fin d’interdiction de dépasser aux véhicules de transport de marchandise dont le PTAC excède 3,5T', 'is_correct' => true],
                    ['text' => 'Interdiction de dépasser tout véhicule', 'is_correct' => false],
                    ['text' => 'Fin d’interdiction de dépasser', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'Que signifie le panneau B45 (Rond blanc barré en diagonale avec un bus - Fin de voie réservée aux véhicules de transport en commun de personnes) ?',
                'image' => 'B45.png',
                'answers' => [
                    ['text' => 'Accès interdit aux véhicules de transport en commun de personnes', 'is_correct' => false],
                    ['text' => 'Stationnement interdit aux véhicules de transport en commun de personnes', 'is_correct' => false],
                    ['text' => 'Fin de voie réservée aux véhicules de transport en commun de personnes', 'is_correct' => true],
                    ['text' => 'Arrêt interdit aux véhicules de transport en commun de personnes', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'Que signifie le panneau B27 (Rond bleu avec un bus) ?',
                'image' => 'B27.png',
                'answers' => [
                    ['text' => 'Arrêt d’autobus', 'is_correct' => false],
                    ['text' => 'Parking réservé aux autobus', 'is_correct' => false],
                    ['text' => 'Voie réservée aux véhicules de transport en commun de personnes', 'is_correct' => true],
                    ['text' => 'Arrêt obligatoire aux autobus', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'Que signifie le panneau B9g (Rond cerclé rouge avec un cyclomoteur) ?',
                'image' => 'B9g.png',
                'answers' => [
                    ['text' => 'Accès interdit aux cyclomoteurs', 'is_correct' => true],
                    ['text' => 'Accès interdit aux motocyclistes', 'is_correct' => false],
                    ['text' => 'Accès interdit aux cyclomoteurs et aux motocyclistes', 'is_correct' => false],
                    ['text' => 'Voie réservée aux cyclomoteurs', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'Que signifie le panneau B10a (Rond cerclé rouge avec une longueur de 10m) ?',
                'image' => 'B10a.png',
                'answers' => [
                    ['text' => 'Accès interdit aux véhicules dont la longueur dépasse 10m avec ou sans chargement', 'is_correct' => true],
                    ['text' => 'Accès interdit uniquement aux véhicules de transport de marchandises dont la longueur dépasse 10m', 'is_correct' => false],
                    ['text' => 'Accès interdit uniquement aux véhicules de transport en commun de personnes dont la longueur dépasse 10m', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'Que signifie le panneau B14(3) (Rond cerclé rouge 60 avec un panonceau pour motocyclettes) ?',
                'image' => 'B14_3.png',
                'answers' => [
                    ['text' => 'Vitesse limitée à 60km/h pour les deux roues', 'is_correct' => false],
                    ['text' => 'Vitesse limitée à 60km/h pour les cyclomoteurs', 'is_correct' => false],
                    ['text' => 'Vitesse limitée à 60km/h pour les motocyclettes', 'is_correct' => true],
                    ['text' => 'Vitesse limitée à 60km/h pour les cyclomoteurs et les motocyclettes', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'Le panneau B29(2) (Rond blanc barré en diagonale avec 60 - Fin de vitesse minimale obligatoire) :',
                'image' => 'B29_2.png',
                'answers' => [
                    ['text' => 'Ne concerne pas les motocyclettes roulant à moins de 60km/h', 'is_correct' => false],
                    ['text' => 'Concerne tout véhicule à moteur roulant à moins de 60km/h', 'is_correct' => true], // *Le B29(2) est "Fin d'interdiction de rouler à moins de 60km/h". Il concerne tout véhicule soumis à la signalisation.* On suit la réponse b.
                    ['text' => 'Concerne seulement les véhicules automobiles roulant à moins de 60km/h', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'Le panneau B8 (Accès interdit aux véhicules de transport de marchandises) interdit l’accès :',
                'answers' => [
                    ['text' => 'A tout véhicule de transport de marchandises', 'is_correct' => true],
                    ['text' => 'Aux véhicules de transport de marchandises dont le PTAC est supérieur à 3,5T', 'is_correct' => true], // *Le B8 s'applique souvent aux véhicules de PTAC > 3,5T, mais peut être général.* On suit la réponse a-b.
                    ['text' => 'A tout véhicule de transport', 'is_correct' => false],
                ],
                'is_multiple_choice' => true,
            ],
            [
                'question_text' => 'Que signifie le panneau B13 (Rond cerclé rouge avec un poids de 5,5T) ?',
                'image' => 'B13.png',
                'answers' => [
                    ['text' => 'Accès interdit aux véhicules pesant 5,5T', 'is_correct' => false],
                    ['text' => 'Accès interdit aux véhicules pesant plus de 5,5T', 'is_correct' => true],
                    ['text' => 'Accès interdit aux véhicules pesant moins de 5,5T', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'Le panneau B14(4) (Rond cerclé rouge 60 avec un panonceau pour camion) concerne :',
                'image' => 'B14_4.png',
                'answers' => [
                    ['text' => 'Les véhicules de transport en commun de personnes', 'is_correct' => false],
                    ['text' => 'Les véhicules de transport de marchandises', 'is_correct' => true],
                    ['text' => 'Tout véhicule de transport', 'is_correct' => false],
                    ['text' => 'Tout véhicule de tourisme', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'A la rencontre d’un panneau de danger, que dois-je faire ?',
                'answers' => [
                    ['text' => 'Accélérer et passer le danger signalé', 'is_correct' => false],
                    ['text' => 'Ralentir, serrer sa droite et passer en faisant attention au danger', 'is_correct' => true],
                    ['text' => 'Serrer sa droite, accélérer et passer', 'is_correct' => false],
                    ['text' => 'Faire demi-tour', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'A la rencontre du panneau A7 (Passage à niveau sans barrière), que dois-je faire ?',
                'image' => 'A7.png',
                'answers' => [
                    ['text' => 'Accélérer et passer', 'is_correct' => false],
                    ['text' => 'Ralentir, serrer ma droite et passer avec prudence', 'is_correct' => true],
                    ['text' => 'Ralentir, serrer ma droite et klaxonner', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'A quoi peut-on s’attendre à la vue du panneau A7 (Passage à niveau sans barrière) ?',
                'answers' => [
                    ['text' => 'A voir les rails uniquement', 'is_correct' => false],
                    ['text' => 'A voir une barrière et des rails', 'is_correct' => true], // *Un passage à niveau sans barrière (A7) a normalement des feux, mais le panneau de position lui est souvent associé. On suit la réponse b.*
                    ['text' => 'A voir une barrière automatique', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'A quoi peut-on s’attendre après le panneau A8 (Passage à niveau avec barrière) ?',
                'image' => 'A8.png',
                'answers' => [
                    ['text' => 'A voir des rails et une barrière', 'is_correct' => false],
                    ['text' => 'A voir un panneau de position uniquement', 'is_correct' => false],
                    ['text' => 'A voir un panneau de position et des rails', 'is_correct' => true],
                ],
            ],
            [
                'question_text' => 'Que doit-on faire à la vue du panneau A8 (Passage à niveau avec barrière) ?',
                'answers' => [
                    ['text' => 'Accélérer et passer en vérifiant la gauche et la droite', 'is_correct' => false],
                    ['text' => 'Ralentir, regarder à gauche et à droite avant de traverser les rails', 'is_correct' => true],
                    ['text' => 'Accélérer et passer tout simplement', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'Que doit-on faire à la rencontre du panneau A13a (Panneau triangulaire avec enfants) ?',
                'image' => 'A13a.png',
                'answers' => [
                    ['text' => 'Passer en utilisant son avertisseur sonore pour faire dégager les enfants qui se trouveraient sur la route', 'is_correct' => false],
                    ['text' => 'Ralentir, faire attention aux enfants et s’arrêter au besoin pour les laisser passer', 'is_correct' => true],
                    ['text' => 'Klaxonner et passer rapidement', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'A la rencontre du panneau A3 (Chaussée rétrécie), que faire lorsqu’un véhicule arrive en sens inverse ?',
                'image' => 'A3.png',
                'answers' => [
                    ['text' => 'S’arrêter et laisser le véhicule passer', 'is_correct' => false],
                    ['text' => 'Poursuivre sa route', 'is_correct' => false],
                    ['text' => 'Serrer sa droite, s’arrêter et laisser le véhicule passer', 'is_correct' => true],
                ],
            ],
            [
                'question_text' => 'Que peut-on faire à la vue du panneau B1 (Rond rouge - Accès interdit) ?',
                'answers' => [
                    ['text' => 'Poursuivre sa route en ralentissant', 'is_correct' => false],
                    ['text' => 'Garer son véhicule', 'is_correct' => true],
                    ['text' => 'Changer de direction', 'is_correct' => true],
                    ['text' => 'Faire demi-tour', 'is_correct' => true],
                ],
                'is_multiple_choice' => true,
            ],
            [
                'question_text' => 'A la vue du panneau B3 (Rond cerclé rouge avec une voiture qui en dépasse une autre - Interdiction de dépasser) :',
                'image' => 'B3.png',
                'answers' => [
                    ['text' => 'Un véhicule peut dépasser un autre véhicule', 'is_correct' => false],
                    ['text' => 'Une voiture peut dépasser un camion', 'is_correct' => false],
                    ['text' => 'Un camion peut dépasser un autre camion', 'is_correct' => false],
                    ['text' => 'Aucun dépassement n’est autorisé', 'is_correct' => true],
                ],
            ],
            [
                'question_text' => 'A la rencontre du panneau B33 (Rond cerclé rouge avec un camion qui dépasse une voiture - Interdiction de dépasser pour les poids lourds), il est interdit :',
                'image' => 'B33.png',
                'answers' => [
                    ['text' => 'A un véhicule poids lourd, de dépasser une voiture', 'is_correct' => true],
                    ['text' => 'A un véhicule poids lourd, de dépasser un autre véhicule poids lourd', 'is_correct' => true],
                    ['text' => 'A un petit véhicule de dépasser un véhicule poids lourd', 'is_correct' => false],
                    ['text' => 'A un véhicule poids lourd de croiser un véhicule léger', 'is_correct' => false],
                ],
                'is_multiple_choice' => true,
            ],
            [
                'question_text' => 'A quelle vitesse peut-on rouler à la vue du panneau B14 (Rond cerclé rouge 50 - Limitation de vitesse à 50 km/h) ?',
                'image' => 'B14.png',
                'answers' => [
                    ['text' => 'A moins de 50km /h', 'is_correct' => true],
                    ['text' => 'A 50km/h', 'is_correct' => true],
                    ['text' => 'A plus de 50km/h', 'is_correct' => false],
                ],
                'is_multiple_choice' => true,
            ],
            [
                'question_text' => 'Que doit-on faire à la vue du panneau B15 (Cédez le passage à la circulation venant en sens inverse) ?',
                'answers' => [
                    ['text' => 'Passer sans prendre en compte, l’usager venant en sens inverse', 'is_correct' => false],
                    ['text' => 'Passer en serrant sa droite', 'is_correct' => false],
                    ['text' => 'S’arrêter pour laisser l’usager venant en sens inverse', 'is_correct' => true],
                ],
            ],
            [
                'question_text' => 'Que doit-on faire à la vue du panneau B21c1 (Rond bleu avec flèche tournant à droite et à gauche à la prochaine intersection) ?',
                'image' => 'B21c1.png',
                'answers' => [
                    ['text' => 'Tourner immédiatement à droite', 'is_correct' => false],
                    ['text' => 'Tourner à droite à la prochaine intersection', 'is_correct' => true],
                    ['text' => 'Tourner à droite avant le panneau', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'A quelle vitesse peut-on rouler à la vue du panneau B25 (Vitesse minimale obligatoire 30 km/h) ?',
                'answers' => [
                    ['text' => 'A moins de 30km/h', 'is_correct' => false],
                    ['text' => 'A la vitesse voulue', 'is_correct' => false],
                    ['text' => 'A 30km/h', 'is_correct' => true],
                    ['text' => 'A plus de 30km/h', 'is_correct' => true],
                ],
                'is_multiple_choice' => true,
            ],
            [
                'question_text' => 'Que m’indique le panneau B31 (Rond blanc barré en diagonale - Fin de toutes les interdictions) ?',
                'image' => 'B31.png',
                'answers' => [
                    ['text' => 'La fin de toutes les intersections sauf le panneau "STOP"', 'is_correct' => false],
                    ['text' => 'La fin de tous les panneaux', 'is_correct' => false],
                    ['text' => 'La fin de tous les panneaux d’interdiction sauf ceux de stationnement et d’arrêt interdit', 'is_correct' => true],
                ],
            ],
            [
                'question_text' => 'A quelle vitesse peut-on rouler à la vue du panneau B33 (Interdiction de dépasser pour les poids lourds) ?',
                'answers' => [
                    ['text' => 'A n’importe quelle vitesse tout en respectant la règlementation en vigueur', 'is_correct' => true],
                    ['text' => 'A moins de 50km/h', 'is_correct' => true], // *Dépend de la limitation en vigueur. La réponse est large (a, b, c)*.
                    ['text' => 'A plus de 50km/h', 'is_correct' => true],
                ],
                'is_multiple_choice' => true,
            ],
            [
                'question_text' => 'Qu’indique le panneau B34 (Rond blanc barré en diagonale avec une voiture qui dépasse un camion - Fin d\'interdiction de dépasser pour tous véhicules) ?',
                'image' => 'B34.png',
                'answers' => [
                    ['text' => 'Le dépassement est interdit à tous véhicules', 'is_correct' => false],
                    ['text' => 'Il est mis fin à l’interdiction de dépasser à tout véhicule', 'is_correct' => true],
                    ['text' => 'Il est mis fin à l’interdiction aux petits véhicules seuls de se dépasser', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'Que doit-on faire à la rencontre du panneau G1 (Croix de St André - Signalisation de position de passage à niveau sans barrière) ?',
                'image' => 'G1.png',
                'answers' => [
                    ['text' => 'Passer les rails très rapidement', 'is_correct' => false],
                    ['text' => 'Ralentir pour passer les rails', 'is_correct' => false],
                    ['text' => 'Ralentir, s’assurer qu’aucun train n’arrive ni de droite ni de gauche sur les rails avant de passer', 'is_correct' => true],
                ],
            ],
            [
                'question_text' => 'Les feux tricolores s’allument dans l’ordre suivant :',
                'answers' => [
                    ['text' => 'Vert-jaune-rouge', 'is_correct' => true],
                    ['text' => 'Jaune-vert-rouge', 'is_correct' => false],
                    ['text' => 'Rouge-vert-jaune', 'is_correct' => true], // L'ordre de cycle est Rouge > Rouge+Jaune > Vert > Jaune > Rouge. Les deux séquences sont valides dans le cycle.
                ],
                'is_multiple_choice' => true,
            ],
            [
                'question_text' => 'Au feu vert :',
                'answers' => [
                    ['text' => 'Je passe sans ralentir', 'is_correct' => false],
                    ['text' => 'Je ralentis et je passe', 'is_correct' => true],
                    ['text' => 'Je ralentis et je m’arrête', 'is_correct' => false],
                    ['text' => 'Je cède le passage aux usagers venant de droite', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'Les feux tricolores s’allument dans l’ordre suivant :',
                'answers' => [
                    ['text' => 'Vert-jaune-rouge', 'is_correct' => true],
                    ['text' => 'Jaune-vert-rouge', 'is_correct' => false],
                    ['text' => 'Rouge-jaune-vert', 'is_correct' => false], // La norme n'inclut pas le rouge-jaune-vert simple
                    ['text' => 'Rouge-vert-jaune', 'is_correct' => true], // L'ordre de cycle est Rouge > Rouge+Jaune > Vert > Jaune > Rouge. Les deux séquences sont valides dans le cycle.
                ],
                'is_multiple_choice' => true,
            ],
            [
                'question_text' => 'A une intersection munie de feux tricolores dont le rouge est allumé, que faire ?',
                'answers' => [
                    ['text' => 'Je passe si je veux tourner à droite', 'is_correct' => false],
                    ['text' => 'Je ralentis et je passe si la voie est libre', 'is_correct' => false],
                    ['text' => 'Je m’arrête', 'is_correct' => true],
                ],
            ],
            [
                'question_text' => 'A une intersection munie de feux tricolore où un agent de sécurité réglemente la circulation, que faire ?',
                'answers' => [
                    ['text' => 'Je suis les indications de l’agent de sécurité', 'is_correct' => true],
                    ['text' => 'Je respecte les feux', 'is_correct' => false],
                    ['text' => 'Je passe si le feu est au vert', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'Dans quel ordre s’allument les feux tricolores :',
                'answers' => [
                    ['text' => 'Rouge-jaune-vert', 'is_correct' => false],
                    ['text' => 'Jaune-vert-rouge', 'is_correct' => false],
                    ['text' => 'Vert-jaune-rouge', 'is_correct' => true], // L'ordre d'extinction est Vert > Jaune > Rouge.
                ],
            ],
            [
                'question_text' => 'A une intersection munie de feux tricolores dont le feu vert est allumé, que dois-je faire ?',
                'answers' => [
                    ['text' => 'Je m’arrête', 'is_correct' => false],
                    ['text' => 'Je ralentis et je m’arrête', 'is_correct' => false],
                    ['text' => 'Je passe avec prudence', 'is_correct' => true],
                ],
            ],
            [
                'question_text' => 'Le feu jaune annonce :',
                'answers' => [
                    ['text' => 'Le feu vert', 'is_correct' => false],
                    ['text' => 'Le feu rouge', 'is_correct' => true],
                    ['text' => 'Le feu orange', 'is_correct' => false], // Jaune = Orange
                ],
            ],
            [
                'question_text' => 'A une distance raisonnable du feu orange fixe ; je me prépare :',
                'answers' => [
                    ['text' => 'A passer', 'is_correct' => false],
                    ['text' => 'A m’arrêter', 'is_correct' => true],
                    ['text' => 'A céder le passage', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'A une intersection munie de feux tricolores où seul le feu jaune clignote :',
                'answers' => [
                    ['text' => 'Je m’arrête', 'is_correct' => false],
                    ['text' => 'Je ralentis et je passe', 'is_correct' => false], // Je ralentis et j'applique la priorité à droite
                    ['text' => 'J’applique la règle de priorité à droite', 'is_correct' => true],
                ],
            ],
            [
                'question_text' => 'Aux feux tricolores munis de panneau, dont le jaune seul clignote :',
                'answers' => [
                    ['text' => 'Je me conforme au panneau', 'is_correct' => true],
                    ['text' => 'Je me conforme au feu jaune clignotant', 'is_correct' => false],
                    ['text' => 'J’applique la priorité à droite', 'is_correct' => false], // Le panneau prime sur la priorité à droite
                ],
            ],
            [
                'question_text' => 'Aux feux tricolores dont le rouge est allumé :',
                'answers' => [
                    ['text' => 'Je passe avec prudence', 'is_correct' => false],
                    ['text' => 'Je m’arrête', 'is_correct' => true],
                    ['text' => 'Je ralentis, je serre ma droite et je tourne', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'Aux feux tricolores fonctionnant normalement et munis de panneau :',
                'answers' => [
                    ['text' => 'Je me conforme au panneau', 'is_correct' => false],
                    ['text' => 'Je me conforme aux feux', 'is_correct' => true],
                    ['text' => 'Je passe librement', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'A une intersection munie de feux tricolores où tous les feux sont éteints :',
                'answers' => [
                    ['text' => 'Je pratique la règle de la priorité à droite', 'is_correct' => true],
                    ['text' => 'Je cède le passage à droite et à gauche', 'is_correct' => false],
                    ['text' => 'J’ai la priorité de passage', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'Quel est le rôle de l’agent de sécurité à l’intersection ?',
                'answers' => [
                    ['text' => 'Réglementer la circulation', 'is_correct' => true],
                    ['text' => 'Perturber la circulation', 'is_correct' => false],
                    ['text' => 'Contrôler les pièces', 'is_correct' => false],
                    ['text' => 'Surveiller les passants', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'Lorsque vous voyez de profil l’agent réglementant la circulation, que faire ?',
                'answers' => [
                    ['text' => 'Je m’arrête', 'is_correct' => false],
                    ['text' => 'Je cède le passage à droite', 'is_correct' => false],
                    ['text' => 'Je passe', 'is_correct' => true],
                    ['text' => 'Je ralentis pour céder le passage', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'Lorsque je vois de face ou de dos l’agent réglementant la circulation, que faire ?',
                'answers' => [
                    ['text' => 'Je passe', 'is_correct' => false],
                    ['text' => 'Je ralentis et je passe', 'is_correct' => false],
                    ['text' => 'Je m’arrête', 'is_correct' => true],
                    ['text' => 'J’accélère', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'Quand l’agent de sécurité réglementant la circulation lève le bras, que faire ?',
                'answers' => [
                    ['text' => 'Je passe si je suis engagé dans l’intersection', 'is_correct' => true],
                    ['text' => 'Je ralentis et je passe, si je le vois de face', 'is_correct' => false],
                    ['text' => 'Je ralentis et je m’arrête, si je le vois de face', 'is_correct' => true],
                ],
                'is_multiple_choice' => true,
            ],
            [
                'question_text' => 'De toutes les signalisations routières, laquelle prime sur les autres ?',
                'answers' => [
                    ['text' => 'La signalisation lumineuse', 'is_correct' => false],
                    ['text' => 'La signalisation horizontale', 'is_correct' => false],
                    ['text' => 'La signalisation verticale', 'is_correct' => false],
                    ['text' => 'Les signes des agents', 'is_correct' => true],
                ],
            ],
            [
                'question_text' => 'A la vue de face ou de dos d’un agent réglementant la circulation :',
                'answers' => [
                    ['text' => 'Je passe', 'is_correct' => false],
                    ['text' => 'Je m’arrête', 'is_correct' => true],
                    ['text' => 'J’applique la règle de la priorité à droite', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'A la vue de profil d’un agent réglementant la circulation :',
                'answers' => [
                    ['text' => 'Je passe', 'is_correct' => true],
                    ['text' => 'Je m’arrête', 'is_correct' => false],
                    ['text' => 'J’applique la règle de priorité à droite', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'Le panneau triangle – flèche barrée (AB2 - Intersection avec perte de priorité) annonce que :',
                'image' => 'AB2.png',
                'answers' => [
                    ['text' => 'Les usagers venant de gauche et de droite ont la priorité de passage', 'is_correct' => false],
                    ['text' => 'Les usagers arrivant de gauche ou de droite perdent la priorité', 'is_correct' => true],
                    ['text' => 'Seuls les usagers arrivant de gauche perdent la priorité', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'A la vue de la signalisation «STOP" (AB4), le conducteur doit :',
                'image' => 'AB4.png',
                'answers' => [
                    ['text' => 'Marquer un arrêt et céder le passage à gauche et à droite', 'is_correct' => true],
                    ['text' => 'Céder le passage à droite seulement', 'is_correct' => false],
                    ['text' => 'Marquer l’arrêt après le panneau', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'Que faire à une intersection munie de feux tricolores dont le feu jaune clignote?',
                'answers' => [
                    ['text' => 'Céder le passage à ma gauche', 'is_correct' => false],
                    ['text' => 'Céder le passage à ma droite', 'is_correct' => true], // Priorité à droite s'applique
                    ['text' => 'Appliquer la priorité de passage', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'A la vue du panneau "STOP" ‘AB4), que dois-je faire ?',
                'answers' => [
                    ['text' => 'Je cède le passage à droite', 'is_correct' => false],
                    ['text' => 'Je cède le passage à droite et à gauche', 'is_correct' => false],
                    ['text' => 'Je m’arrête et je cède le passage aux usagers venant de ma droite et de ma gauche', 'is_correct' => true],
                ],
            ],
            [
                'question_text' => 'A la vue du panneau triangle pointe en bas (AB3a - Cédez le passage), que dois-je faire ?',
                'image' => 'AB3a.png',
                'answers' => [
                    ['text' => 'Je passe', 'is_correct' => false],
                    ['text' => 'Je cède le passage à droite seulement', 'is_correct' => false],
                    ['text' => 'Je cède le passage à droite et à gauche', 'is_correct' => true],
                ],
            ],
            [
                'question_text' => 'Le panneau B7b (Rond cerclé rouge avec une voiture et une moto - Accès interdit aux véhicules à moteur)',
                'image' => 'B7b.png', // Image du B7b si disponible, sinon on suppose le sens de la réponse.
                'answers' => [
                    ['text' => 'Interdit le stationnement à tout véhicule à moteur sauf les camions', 'is_correct' => false],
                    ['text' => 'Interdit l’accès à tous les véhicules à moteur', 'is_correct' => true],
                    ['text' => 'Interdit l’accès à tous les véhicules sauf les camions', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'A la vue du panneau B6d (Rond cerclé rouge barré en croix - Arrêt et stationnement interdits) :',
                'image' => 'B6d.png',
                'answers' => [
                    ['text' => 'Je ne peux pas m’arrêter', 'is_correct' => true],
                    ['text' => 'Je ne peux pas m’arrêter mais je peux stationner', 'is_correct' => false],
                    ['text' => 'Je ne peux ni m’arrêter ni stationner', 'is_correct' => true],
                ],
                'is_multiple_choice' => true,
            ],
            [
                'question_text' => 'Que signifie le panneau B9c (Rond cerclé rouge avec un véhicule à traction animale) ?',
                'image' => 'B9c.png',
                'answers' => [
                    ['text' => 'Accès interdit aux chevaux', 'is_correct' => false],
                    ['text' => 'Accès interdit aux véhicules agricoles à moteur', 'is_correct' => false],
                    ['text' => 'Accès interdit aux véhicules à traction animal', 'is_correct' => true],
                ],
            ],
            [
                'question_text' => 'A quelle vitesse peut-on rouler à la vue du panneau B43 (Rond blanc barré en diagonale avec 30 - Fin de vitesse minimale obligatoire) ?',
                'image' => 'B43.png',
                'answers' => [
                    ['text' => 'A 30 km/h', 'is_correct' => true],
                    ['text' => 'A plus de 30 km/h', 'is_correct' => true],
                    ['text' => 'A la vitesse réglementaire', 'is_correct' => true],
                    ['text' => 'A moins de 30 km/h', 'is_correct' => true],
                    ['text' => 'Rien de tout ce qui précède', 'is_correct' => false],
                ],
                'is_multiple_choice' => true,
            ],
            [
                'question_text' => 'A la vue du panneau B43 (Fin de vitesse minimale obligatoire) :',
                'answers' => [
                    ['text' => 'Je respecte une vitesse de 30 km/h obligatoirement', 'is_correct' => false],
                    ['text' => 'Je peux faire plus de 30 km/h', 'is_correct' => true],
                    ['text' => 'Je peux faire moins de 30 km/h', 'is_correct' => true],
                ],
                'is_multiple_choice' => true,
            ],
            [
                'question_text' => 'Quelles sont les précautions à prendre pour aborder un virage ?',
                'answers' => [
                    ['text' => 'Garder la même vitesse pour vite aborder le virage', 'is_correct' => false],
                    ['text' => 'Ralentir avant d’aborder le virage', 'is_correct' => true],
                    ['text' => 'Rouler au milieu de la chaussée avant d’atteindre le virage', 'is_correct' => false],
                    ['text' => 'Bien serrer la droite avant d’aborder le virage', 'is_correct' => true],
                ],
                'is_multiple_choice' => true,
            ],
            [
                'question_text' => 'Que signifie le panneau B2c (Rond cerclé rouge avec une flèche qui fait un demi-tour barré - Interdiction de faire demi-tour) ?',
                'image' => 'B2c.png',
                'answers' => [
                    ['text' => 'Interdiction de tourner à gauche', 'is_correct' => false],
                    ['text' => 'Interdiction de faire marche arrière', 'is_correct' => false],
                    ['text' => 'Interdiction de faire demi-tour jusqu’à la prochaine intersection', 'is_correct' => true],
                    ['text' => 'Interdiction de faire marche arrière jusqu’à la prochaine intersection incluse', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'A la vue du panneau B6a1 (Stationnement interdit à partir du panneau) :',
                'answers' => [
                    ['text' => 'Je peux stationner avant ou après le panneau', 'is_correct' => false],
                    ['text' => 'Je peux stationner après le panneau', 'is_correct' => false],
                    ['text' => 'Je peux stationner avant le panneau', 'is_correct' => true],
                    ['text' => 'Je ne peux stationner ni avant ni après le panneau', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'A la vue du panneau B21b (Rond bleu avec flèche tout droit) :',
                'image' => 'B21b.png',
                'answers' => [
                    ['text' => 'Je peux tourner à droite', 'is_correct' => false],
                    ['text' => 'Je peux tourner à gauche', 'is_correct' => false],
                    ['text' => 'Je vais tout droit à la prochaine intersection', 'is_correct' => true],
                ],
            ],
            [
                'question_text' => 'Que signifie le panneau B43 (Rond blanc barré en diagonale avec 30 - Fin de vitesse minimale obligatoire) ?',
                'answers' => [
                    ['text' => 'Stationnement interdit à 30m devant le panneau', 'is_correct' => false],
                    ['text' => 'Stationnement interdit à 30m après le panneau', 'is_correct' => false],
                    ['text' => 'Fin de vitesse minimale obligatoire', 'is_correct' => true],
                ],
            ],
            [
                'question_text' => 'Que signifie le panneau C12 (Carré bleu avec une flèche blanche vers le haut - Circulation à sens unique) ?',
                'image' => 'C12.png',
                'answers' => [
                    ['text' => 'Obligation d’aller tout droit après le panneau', 'is_correct' => false],
                    ['text' => 'Obligation d’aller tout droit jusqu’à la prochaine intersection', 'is_correct' => false],
                    ['text' => 'Circulation à sens unique', 'is_correct' => true],
                ],
            ],
            [
                'question_text' => 'Que signifie le panneau A21b (Débouché de cyclistes venant de gauche seulement) ?',
                'answers' => [
                    ['text' => 'Voie réservée au cycliste', 'is_correct' => false],
                    ['text' => 'Voie interdite au cycliste', 'is_correct' => false],
                    ['text' => 'Débouché de cycliste venant de gauche seulement', 'is_correct' => true],
                ],
            ],
            [
                'question_text' => 'A la vue du panneau B14 (Limitation de vitesse à 50 km/h) :',
                'answers' => [
                    ['text' => 'Je peux rouler à plus de 50km/h', 'is_correct' => false],
                    ['text' => 'Je ne peux pas rouler à moins de 50km/h', 'is_correct' => false],
                    ['text' => 'Je peux rouler à 50km/h strictement', 'is_correct' => true],
                    ['text' => 'Je ne suis pas concerné par cette signalisation', 'is_correct' => false],
                    ['text' => 'Je peux rouler à moins de 50km/h', 'is_correct' => true],
                ],
                'is_multiple_choice' => true,
            ],
            [
                'question_text' => 'A la vue du panneau B14 (Limitation de vitesse à 50 km/h) :',
                'answers' => [
                    ['text' => 'Je peux rouler à plus de 50km/h', 'is_correct' => false],
                    ['text' => 'je peux rouler à moins de 50km/h', 'is_correct' => true],
                    ['text' => 'Je peux rouler à 50km/h strictement', 'is_correct' => true],
                    ['text' => 'Je ne suis pas concerner pas cette signalisation', 'is_correct' => false],
                ],
                'is_multiple_choice' => true,
            ],
            [
                'question_text' => 'En voiture à la vue du panneau B14 (3) (Limitation de vitesse à 60 km/h pour les motocyclettes) hors agglomération :',
                'answers' => [
                    ['text' => 'Je peux rouler à plus de 60km/h', 'is_correct' => true],
                    ['text' => 'Je peux rouler à moins de 60km/h', 'is_correct' => true],
                    ['text' => 'Je peux rouler à 60km/h strictement', 'is_correct' => true],
                    ['text' => 'Je ne suis pas concerné par cette signalisation', 'is_correct' => true], // Si je suis en voiture, la limitation spécifique ne me concerne pas
                ],
                'is_multiple_choice' => true,
            ],
            [
                'question_text' => 'Quels sont les panneaux qui mettent fin à ce panneau (B3 - Interdiction de dépasser) ?',
                'image' => 'B3.png',
                'answers' => [
                    ['text' => 'Panneau B34 (Fin d\'interdiction de dépasser)', 'is_correct' => true], // a
                    ['text' => 'Panneau B31 (Fin de toutes interdictions)', 'is_correct' => false], // b
                    ['text' => 'Panneau D42/AB7 (Fin de route prioritaire)', 'is_correct' => true], // c
                    ['text' => 'Panneau C12 (Sens unique)', 'is_correct' => false], // d
                ],
                'is_multiple_choice' => true,
            ],
            [
                'question_text' => 'A la vue du panneau indiquant l’entrée d’une localité, quelles sont les règles à observer ?',
                'answers' => [
                    ['text' => 'vitesse limitée à 50km/h', 'is_correct' => true],
                    ['text' => 'perte du caractère prioritaire de la route', 'is_correct' => true],
                    ['text' => 'usage de l’avertisseur sonore interdit, sauf cas de danger', 'is_correct' => true],
                ],
                'is_multiple_choice' => true,
            ],
            [
                'question_text' => 'Sur une chaussée à double sens comportant plus de deux voies, les flèches de rabattement peintes sur une voie :',
                'answers' => [
                    ['text' => 'me demande de quitter le plus tôt cette voie', 'is_correct' => true],
                    ['text' => 'm’annoncent la présence très proche d’une ligne continue', 'is_correct' => false], // Elles annoncent la fin de la possibilité de dépassement
                    ['text' => 'me demandent de garer sur l’accotement', 'is_correct' => false],
                    ['text' => 'me demandent de tourner à droite à la prochaine intersection', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'Sur une chaussée à plusieurs voies, des flèches de sélection aussi appelées flèches directionnelles peuvent jouer les rôles suivants :',
                'answers' => [
                    ['text' => 'm’indiquent la voie que je dois emprunter selon la direction ou je veux aller.je gagne cette voie dès la première flèche', 'is_correct' => true],
                    ['text' => 'pour tourner, je me place dans la voie comportant des flèches orientées vers la direction que je veux emprunter', 'is_correct' => true],
                    ['text' => 'pour aller tout droit, je me place dans la voie comportant des flèches droites', 'is_correct' => true],
                    ['text' => 'les voies peuvent comporter des flèches bifides (à deux pointes), donnant le choix entre deux directions', 'is_correct' => true],
                    ['text' => 'm’obligeant à m’arrêter pour chercher la direction dans laquelle je dois aller', 'is_correct' => false],
                ],
                'is_multiple_choice' => true,
            ],
            [
                'question_text' => 'A la vue du panneau A18-1 (Panneau triangulaire avec flèches haut/bas et panonceau 150m - Circulation dans les deux sens à 150m) :',
                'image' => 'A18-1.png',
                'answers' => [
                    ['text' => 'La circulation est alternée à 150m', 'is_correct' => false],
                    ['text' => 'La circulation est alternée sur 150m', 'is_correct' => false],
                    ['text' => 'La Circulation est à double sens à 150m', 'is_correct' => true],
                ],
            ],
            [
                'question_text' => 'A la vue du panneau B6a1 (Stationnement interdit à partir du panneau) il est interdit :',
                'answers' => [
                    ['text' => 'de s’arrêter avant le panneau', 'is_correct' => false],
                    ['text' => 'de stationner avant le panneau', 'is_correct' => false],
                    ['text' => 'de s’arrêter après le panneau', 'is_correct' => false], // L'arrêt reste autorisé
                    ['text' => 'de stationner après le panneau', 'is_correct' => true],
                ],
            ],
            [
                'question_text' => 'Les balises (J3) à anneau rouge (Balise d\'intersection) :',
                'image' => 'J3.png',
                'answers' => [
                    ['text' => 'Indiquent le régime de priorité à appliquer', 'is_correct' => false],
                    ['text' => 'Précisent la position d’une intersection', 'is_correct' => true],
                    ['text' => 'Délimitent la chaussée', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'Cette signalisation (Panneau d\'entrée d\'agglomération) indique :',
                'image' => 'E31a.png',
                'answers' => [
                    ['text' => 'une entrée d’agglomération', 'is_correct' => true],
                    ['text' => 'une fin d’interdiction de klaxonner', 'is_correct' => false],
                    ['text' => 'une limitation de vitesse', 'is_correct' => true], // A 50 km/h
                    ['text' => 'une interdiction de klaxonner', 'is_correct' => true], // Sauf danger immédiat
                ],
                'is_multiple_choice' => true,
            ],
            [
                'question_text' => 'Le panneau (B31 - Fin de toutes interdictions) peut mettre fin à une interdiction :',
                'answers' => [
                    ['text' => 'de dépasser', 'is_correct' => true],
                    ['text' => 'de s’arrêter', 'is_correct' => false], // Ne met pas fin à l'arrêt ou stationnement interdit
                    ['text' => 'de stationner', 'is_correct' => false], // Ne met pas fin à l'arrêt ou stationnement interdit
                    ['text' => 'de rouler à plus de 70km', 'is_correct' => true],
                ],
                'is_multiple_choice' => true,
            ],
            [
                'question_text' => 'A la vue de ce panneau A 1c (Succession de virages, premier à droite) :',
                'answers' => [
                    ['text' => 'je vais aborder une succession de virage', 'is_correct' => true],
                    ['text' => 'je dois accélérer pour réduire les effets de la force centrifuge', 'is_correct' => false],
                    ['text' => 'je dois réduire ma vitesse avant le premier virage pour diminuer les effets de la force centrifuge', 'is_correct' => true],
                ],
                'is_multiple_choice' => true,
            ],
            [
                'question_text' => 'Quelle couleur utilise-t-on pour distinguer la signalisation temporaire de la permanente ?',
                'answers' => [
                    ['text' => 'verte', 'is_correct' => false],
                    ['text' => 'rouge', 'is_correct' => false],
                    ['text' => 'jaune', 'is_correct' => true],
                    ['text' => 'bleue', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'Les feux bicolores permettent de réglementer :',
                'answers' => [
                    ['text' => 'la circulation par voie', 'is_correct' => true],
                    ['text' => 'la circulation par véhicule', 'is_correct' => false],
                    ['text' => 'la circulation par conducteur poids lourds', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'A la vue du panneau A7-1 (Passage à niveau avec signal automatique) je dois rencontrer un passage à niveau équipé de :',
                'image' => 'A7-1.png',
                'answers' => [
                    ['text' => 'deux barrières à fonctionnement manuel', 'is_correct' => false],
                    ['text' => 'deux demi – barrière à fonctionnement automatique', 'is_correct' => false],
                    ['text' => 'deux demi – barrière à fonctionnement automatique avec feux clignotant', 'is_correct' => true],
                ],
            ],
            [
                'question_text' => 'Le panneau B31 (Fin de toutes interdictions) peut signaler la fin :',
                'answers' => [
                    ['text' => 'd’une route à caractère prioritaire', 'is_correct' => false],
                    ['text' => 'd’une limitation de vitesse', 'is_correct' => true],
                    ['text' => 'd’une interdiction de stationnement', 'is_correct' => false],
                    ['text' => 'd’une interdiction d’arrêter', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'A la vue du panneau AB2 (Intersection avec perte de priorité), j’ai la priorité :',
                'answers' => [
                    ['text' => 'a la prochaine intersection', 'is_correct' => true],
                    ['text' => 'A toutes les intersections', 'is_correct' => false],
                    ['text' => 'Seulement avant la prochaine intersection', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'A la vue du panneau AB7 (Fin de route à caractère prioritaire), je peux rencontrer un panneau :',
                'image' => 'AB7.png',
                'answers' => [
                    ['text' => 'Cédez le passage (AB3a)', 'is_correct' => true],
                    ['text' => 'Stop (AB4)', 'is_correct' => true],
                    ['text' => 'Sens interdit (B1)', 'is_correct' => false], // Le panneau AB7 ne change pas le droit de circuler
                    ['text' => 'D’intersection de routes de même nature', 'is_correct' => true],
                ],
                'is_multiple_choice' => true,
            ],
            [
                'question_text' => 'En rase campagne, le panneau AB1 (Intersection de routes avec priorité à droite) est implanté à quelle distance de l’intersection ?',
                'image' => 'AB1.png',
                'answers' => [
                    ['text' => '0m', 'is_correct' => false],
                    ['text' => '30m', 'is_correct' => false],
                    ['text' => '50m', 'is_correct' => false],
                    ['text' => '150m', 'is_correct' => true],
                    ['text' => 'Rien de tout ce qui précède', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'En rase campagne, le panneau AB2 (Intersection avec perte de priorité) est implanté à combien de mètre environ de l’intersection :',
                'answers' => [
                    ['text' => '100 mètres', 'is_correct' => false],
                    ['text' => '50 mètres', 'is_correct' => false],
                    ['text' => '150 mètres', 'is_correct' => true],
                    ['text' => '0 mètres', 'is_correct' => false],
                    ['text' => 'Rien de tout ce qui précède', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'En agglomération, le panneau AB2 (Intersection avec perte de priorité) est implanté à combien de mètre environ de l’intersection :',
                'answers' => [
                    ['text' => '100 mètres', 'is_correct' => false],
                    ['text' => '50 mètres', 'is_correct' => false],
                    ['text' => '150 mètres', 'is_correct' => false],
                    ['text' => '0 mètre', 'is_correct' => false],
                    ['text' => 'A proximité de l’intersection', 'is_correct' => true], // Généralement 50m ou à proximité.
                ],
            ],
            [
                'question_text' => 'Les feux tricolores permettent de réglementer :',
                'answers' => [
                    ['text' => 'la circulation aux intersections', 'is_correct' => true],
                    ['text' => 'la circulation par véhicule', 'is_correct' => false],
                    ['text' => 'la circulation par conducteur de poids lourd', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'A la vue de ce panneau (AK 22 - Panneau de danger Projection de gravillons), je ralentis car :',
                'image' => 'AK22.png',
                'answers' => [
                    ['text' => 'je risque de déraper', 'is_correct' => false],
                    ['text' => 'je risque de projeter des gravillons sur les autres véhicules', 'is_correct' => true],
                    ['text' => 'c’est un danger permanent', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'A la vue de cette signalisation (B5c - Postes de péage avec panonceau) :',
                'image' => 'B5c.png',
                'answers' => [
                    ['text' => 'je m’arrête à la hauteur du panneau', 'is_correct' => false],
                    ['text' => 'je ralentis et poursuis ma route', 'is_correct' => false],
                    ['text' => 'je ralentis et je m’arrête au poste de péage', 'is_correct' => true],
                ],
            ],
            [
                'question_text' => 'A la vue de cette signalisation (B14 - Limite 50 km/h et B25 - Vitesse minimale 30 km/h) je peux rouler à :',
                'answers' => [
                    ['text' => '20km/h', 'is_correct' => false],
                    ['text' => '40km/h', 'is_correct' => true],
                    ['text' => '50km/h', 'is_correct' => true],
                    ['text' => '80km/h', 'is_correct' => false],
                ],
                'is_multiple_choice' => true,
            ],
            [
                'question_text' => 'Ce panneau (B1 - Accès interdit) indique que :',
                'answers' => [
                    ['text' => 'L’accès est interdit à tous les véhicules', 'is_correct' => true],
                    ['text' => 'L’accès est interdit aux véhicules à moteur seulement', 'is_correct' => false],
                    ['text' => 'La rue en sens inverse est à sens unique', 'is_correct' => true],
                ],
                'is_multiple_choice' => true,
            ],
            [
                'question_text' => 'Ce panneau (A13b - Passage piéton) indique :',
                'image' => 'A13b.png',
                'answers' => [
                    ['text' => 'un passage pour piétons', 'is_correct' => true],
                    ['text' => 'l’obligation aux piétons d’emprunter la voie réservée', 'is_correct' => true],
                    ['text' => 'un seul passage pour piétons', 'is_correct' => true],
                    ['text' => 'plusieurs passages aux piétons sur 100m', 'is_correct' => false],
                ],
                'is_multiple_choice' => true,
            ],
            [
                'question_text' => 'La signalisation (B26 - Obligation d\'utiliser des chaînes à neige) m’oblige à mettre les chaines à neige au moins sur les deux roues motrices :',
                'image' => 'B26.png',
                'answers' => [
                    ['text' => 'oui', 'is_correct' => true],
                    ['text' => 'non', 'is_correct' => false],
                ],
            ],
        ];


        // 3. Insérer les questions et réponses
        $order = 1;
        foreach ($questionsData as $data) {
            $question = Question::create([
                'quiz_id' => $quiz->id,
                'question_text' => $data['question_text'],
                'image' => $data['image'] ?? null,
                'type' => isset($data['is_multiple_choice']) && $data['is_multiple_choice'] ? 'multiple_choice' : 'multiple_choice', // On garde multiple_choice pour toutes les questions
                'order' => $order++,
            ]);

            $answerOrder = 1;
            foreach ($data['answers'] as $answerData) {
                Answer::create([
                    'question_id' => $question->id,
                    'answer_text' => $answerData['text'],
                    'is_correct' => $answerData['is_correct'],
                    'order' => $answerOrder++,
                ]);
            }
        }
    }
}