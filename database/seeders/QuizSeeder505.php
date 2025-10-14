<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\Answer;

class QuizSeeder505 extends Seeder
{
    /**
     * Run the database seeds for Quiz ID 8 (Questions 405-505).
     *
     * @return void
     */
    public function run()
    {
        // ID du Quiz
        $quizId = 8;

        $questionsData = [
            // Question n° 405
            [
                'question_text' => 'A bord d’un véhicule de tourisme, pour tourner à droite, je dois :',
                'answers' => [
                    ['answer_text' => 'Serrer ma droite', 'is_correct' => true],
                    ['answer_text' => 'Serrer ma gauche', 'is_correct' => false],
                    ['answer_text' => 'Me déporter au milieu de la chaussée', 'is_correct' => false],
                ],
            ],
            // Question n°406 
            [
                'question_text' => 'Pour tourner à droite, je dois :',
                'answers' => [
                    ['answer_text' => 'Accélérer', 'is_correct' => false],
                    ['answer_text' => 'Mettre le clignotant à droite', 'is_correct' => true],
                    ['answer_text' => 'Ralentir', 'is_correct' => true],
                ],
            ],
            // Question n° 407 
            [
                'question_text' => 'A bord d’un véhicule de tourisme pour tourner à gauche sur une chaussée à double sens, je dois :',
                'answers' => [
                    ['answer_text' => 'Serrer ma droite', 'is_correct' => false],
                    ['answer_text' => 'Me déporter au milieu de la chaussée', 'is_correct' => true],
                    ['answer_text' => 'Serrer ma gauche', 'is_correct' => false],
                ],
            ],
            // Question n°408 
            [
                'question_text' => 'A bord d’un véhicule de tourisme pour tourner à gauche sur une chaussée à sens unique, je dois :',
                'answers' => [
                    ['answer_text' => 'Serrer ma droite et mettre le clignotant à gauche', 'is_correct' => false],
                    ['answer_text' => 'Respecter les règles de priorité', 'is_correct' => true],
                    ['answer_text' => 'Serrer ma gauche', 'is_correct' => true],
                ],
            ],
            // Question n°409 
            [
                'question_text' => 'Je dois réduire ma vitesse',
                'answers' => [
                    ['answer_text' => 'A l’approche d’un virage', 'is_correct' => true],
                    ['answer_text' => 'A la hauteur d’une ligne continue', 'is_correct' => false],
                    ['answer_text' => 'A l’approche d’une intersection', 'is_correct' => true],
                ],
            ],
            // Question n°410 
            [
                'question_text' => 'Je dois réduire ma vitesse',
                'answers' => [
                    ['answer_text' => 'A la sortie d’une agglomération', 'is_correct' => false],
                    ['answer_text' => 'A la vue d’un panneau de limitation de vitesse', 'is_correct' => true],
                    ['answer_text' => 'Pendant le dépassement', 'is_correct' => false],
                    ['answer_text' => 'A l’approche d’un passage à niveau', 'is_correct' => true],
                ],
            ],
            // Question n°411 
            [
                'question_text' => 'La bande rouge discontinue de blanc le long du trottoir, interdit :',
                'answers' => [
                    ['answer_text' => 'L’arrêt', 'is_correct' => false],
                    ['answer_text' => 'Le stationnement', 'is_correct' => true],
                    ['answer_text' => 'L’arrêt pour les véhicules légers', 'is_correct' => false],
                ],
            ],
            // Question n°412 
            [
                'question_text' => 'Après combien de jours le stationnement devient-il abusif ?',
                'answers' => [
                    ['answer_text' => '10 jours', 'is_correct' => false],
                    ['answer_text' => '7 jours', 'is_correct' => true],
                    ['answer_text' => '4 jours', 'is_correct' => false],
                    ['answer_text' => 'Rien de tout ce qui précède', 'is_correct' => false],
                ],
            ],
            // Question n°413 
            [
                'question_text' => 'Le panneau B7b :',
                'answers' => [
                    ['answer_text' => 'Interdit le stationnement à tout véhicule à moteur sauf les camions', 'is_correct' => false],
                    ['answer_text' => 'Interdit l’accès à tous les véhicules à moteur', 'is_correct' => true],
                    ['answer_text' => 'Interdit l’accès à tous les véhicules sauf les camions', 'is_correct' => false],
                ],
            ],
            // Question n°414 
            [
                'question_text' => 'A la vue du panneau B6d :',
                'answers' => [
                    ['answer_text' => 'Je ne peux pas m’arrêter', 'is_correct' => true],
                    ['answer_text' => 'Je ne peux pas m’arrêter mais je peux stationner', 'is_correct' => true], // Suivi de la réponse utilisateur
                    ['answer_text' => 'Je ne peux ni m’arrêter ni stationner', 'is_correct' => false], // Suivi de la réponse utilisateur
                ],
            ],
            // Question n°415 
            [
                'question_text' => 'Dans quels cas peut-on utiliser le frein moteur ?',
                'answers' => [
                    ['answer_text' => 'Pour s’arrêter', 'is_correct' => false],
                    ['answer_text' => 'Pour ralentir', 'is_correct' => true],
                    ['answer_text' => 'Pour aborder un virage', 'is_correct' => true],
                    ['answer_text' => 'Pour aborder une descente dangereuse', 'is_correct' => true],
                ],
            ],
            // Question n°416 
            [
                'question_text' => 'Que signifie le panneau B9c ?',
                'answers' => [
                    ['answer_text' => 'Accès interdit aux chevaux', 'is_correct' => false],
                    ['answer_text' => 'Accès interdit aux véhicules agricoles à moteur', 'is_correct' => false],
                    ['answer_text' => 'Accès interdit aux véhicules à traction animale', 'is_correct' => true],
                ],
            ],
            // Question n° 427 
            [
                'question_text' => 'A quelle vitesse peut-on rouler à la vue du panneau B43 ?',
                'answers' => [
                    ['answer_text' => 'A 30 km/h', 'is_correct' => true],
                    ['answer_text' => 'A plus de 30 km/h', 'is_correct' => true],
                    ['answer_text' => 'A la vitesse réglementaire', 'is_correct' => true],
                    ['answer_text' => 'A moins de 30 km/h', 'is_correct' => true],
                    ['answer_text' => 'Rien de tout ce qui précède', 'is_correct' => false],
                ],
            ],
            // Question n°428 
            [
                'question_text' => 'Le stationnement est dangereux',
                'answers' => [
                    ['answer_text' => 'Dans un virage', 'is_correct' => true],
                    ['answer_text' => 'Derrière les véhicules en stationnement', 'is_correct' => false],
                    ['answer_text' => 'A proximité d’une intersection', 'is_correct' => true],
                ],
            ],
            // Question n° 429
            [
                'question_text' => 'Sur une route hors agglomération, les véhicules peuvent stationner :',
                'answers' => [
                    ['answer_text' => 'Sur le côté droit seulement', 'is_correct' => false],
                    ['answer_text' => 'Sur le côté droit ou sur le côté gauche', 'is_correct' => true],
                    ['answer_text' => 'Sur les accotements', 'is_correct' => true],
                    ['answer_text' => 'Sur le côté gauche seulement', 'is_correct' => false],
                ],
            ],
            // Question n° 430 
            [
                'question_text' => 'Dans une rue à sens unique, les véhicules peuvent stationner :',
                'answers' => [
                    ['answer_text' => 'Sur le côté droit seulement', 'is_correct' => false],
                    ['answer_text' => 'Sur le côté droit ou sur le côté gauche', 'is_correct' => true],
                    ['answer_text' => 'Sur le côté gauche seulement', 'is_correct' => false],
                ],
            ],
            // Question n°431 
            [
                'question_text' => 'A l’approche d’un virage à courbure très prononcée et bordé d’arbres, je dois tenir compte de :',
                'answers' => [
                    ['answer_text' => 'La force centrifuge', 'is_correct' => true],
                    ['answer_text' => 'L’adhérence', 'is_correct' => true],
                    ['answer_text' => 'La visibilité', 'is_correct' => true],
                ],
            ],
            // Question n° 432 
            [
                'question_text' => 'Dans un virage pour une bonne adhérence des pneus, je dois rouler :',
                'answers' => [
                    ['answer_text' => 'En deuxième vitesse', 'is_correct' => true],
                    ['answer_text' => 'En troisième vitesse', 'is_correct' => false],
                    ['answer_text' => 'En quatrième vitesse', 'is_correct' => false],
                ],
            ],
            // Question n° 433 
            [
                'question_text' => 'La ligne jaune continue sur la bordure du trottoir :',
                'answers' => [
                    ['answer_text' => 'Interdit le stationnement', 'is_correct' => true],
                    ['answer_text' => 'Autorise l’arrêt', 'is_correct' => false],
                    ['answer_text' => 'Indique une zone d’arrêt de bus', 'is_correct' => false],
                ],
            ],
            // Question n° 434 
            [
                'question_text' => 'La ligne jaune discontinue sur la bordure du trottoir :',
                'answers' => [
                    ['answer_text' => 'Interdit le stationnement', 'is_correct' => true],
                    ['answer_text' => 'Autorise l’arrêt', 'is_correct' => true],
                    ['answer_text' => 'Indique une zone d’arrêt de bus', 'is_correct' => false],
                ],
            ],
            // Question n° 435 
            [
                'question_text' => 'Quels sont les risques auxquels je m’expose en abordant un virage à vive allure ?',
                'answers' => [
                    ['answer_text' => 'Je risque de déraper et de me retrouver hors de la chaussée', 'is_correct' => true],
                    ['answer_text' => 'Je risque de déraper et de heurter l’usager venant en sens inverse', 'is_correct' => true],
                    ['answer_text' => 'Je risque de casser le pare-brise à cause du vent latéral', 'is_correct' => false],
                ],
            ],
            // Question n° 436 
            [
                'question_text' => 'Quelles précautions prendre pour aborder un virage ?',
                'answers' => [
                    ['answer_text' => 'Je passe rapidement en tenant fortement mon volant', 'is_correct' => false],
                    ['answer_text' => 'Je maintiens ma vive allure en serrant fortement mon volant', 'is_correct' => false],
                    ['answer_text' => 'Je réduis ma vive allure en maintenant ma droite', 'is_correct' => true],
                ],
            ],
            // Question n° 437 
            [
                'question_text' => 'La ligne jaune brisée en bordure de la chaussée :',
                'answers' => [
                    ['answer_text' => 'Interdit le dépassement', 'is_correct' => false],
                    ['answer_text' => 'Autorise le dépassement', 'is_correct' => false],
                    ['answer_text' => 'Indique une zone d’arrêt de bus', 'is_correct' => true],
                ],
            ],
            // Question n°438 
            [
                'question_text' => 'Sur une route en rase campagne les véhicules peuvent stationner :',
                'answers' => [
                    ['answer_text' => 'Sur le côté droit seulement', 'is_correct' => false],
                    ['answer_text' => 'Sur le côté droit ou sur le côté gauche', 'is_correct' => true],
                    ['answer_text' => 'Sur le côté gauche seulement', 'is_correct' => false],
                ],
            ],
            // Question n° 439 
            [
                'question_text' => 'Pour prendre un usager de la route, je m’arrête :',
                'answers' => [
                    ['answer_text' => 'Sur la chaussée avec clignotant', 'is_correct' => false],
                    ['answer_text' => 'Sur l’accotement avec les feux de détresse', 'is_correct' => false],
                    ['answer_text' => 'Avec mon clignotant droit en me positionnant sur l’accotement', 'is_correct' => true],
                    ['answer_text' => 'Avec mon clignotant droit en serrant ma droite', 'is_correct' => true],
                ],
            ],
            // Question n° 440 
            [
                'question_text' => 'Quelle est la toute première opération à effectuer par le conducteur pour immobiliser son véhicule roulant en prise directe',
                'answers' => [
                    ['answer_text' => 'Débrayer', 'is_correct' => false],
                    ['answer_text' => 'Freiner', 'is_correct' => true],
                    ['answer_text' => 'Mettre le levier au point mort', 'is_correct' => false],
                ],
            ],
            // Question n° 441 
            [
                'question_text' => 'A la vue d’un obstacle inopiné à vive allure :',
                'answers' => [
                    ['answer_text' => 'Je débraie et je freine', 'is_correct' => false],
                    ['answer_text' => 'Je freine en bloquant les roues', 'is_correct' => false],
                    ['answer_text' => 'Je freine franchement et je débraie au dernier moment', 'is_correct' => true],
                ],
            ],
            // Question n° 442 
            [
                'question_text' => 'Où peut-on faire un demi-tour ?',
                'answers' => [
                    ['answer_text' => 'Sur un pont', 'is_correct' => false],
                    ['answer_text' => 'Sur une chaussée à sens unique', 'is_correct' => false],
                    ['answer_text' => 'Dans un virage', 'is_correct' => false],
                    ['answer_text' => 'Sur une chaussée à double sens de circulation', 'is_correct' => true],
                ],
            ],
            // Question n° 443
            [
                'question_text' => 'Où peut-on faire la marche arrière ?',
                'answers' => [
                    ['answer_text' => 'Sur un pont', 'is_correct' => false],
                    ['answer_text' => 'Sur une chaussée à sens unique', 'is_correct' => true],
                    ['answer_text' => 'Sur l’accotement ou sur le trottoir', 'is_correct' => false],
                ],
            ],
            // Question n° 444 
            [
                'question_text' => 'En marche arrière, peut-on rentrer dans un sens interdit ?',
                'answers' => [
                    ['answer_text' => 'Oui', 'is_correct' => false],
                    ['answer_text' => 'Non', 'is_correct' => true],
                ],
            ],
            // Question n° 445 
            [
                'question_text' => 'La peinture jaune continue sur la bordure du trottoir signifie que :',
                'answers' => [
                    ['answer_text' => 'L’arrêt et le stationnement sont interdits jusqu’à la prochaine intersection', 'is_correct' => false],
                    ['answer_text' => 'L’arrêt et le stationnement sont interdits à la hauteur de ce trottoir', 'is_correct' => true],
                    ['answer_text' => 'Seul l’arrêt est autorisé', 'is_correct' => false],
                ],
            ],
            // Question n° 446 
            [
                'question_text' => 'Après avoir heurté un cycliste, je freine et m’arrête après 81 mètres. Je roulais donc à quelle vitesse ?',
                'answers' => [
                    ['answer_text' => '60 km/h', 'is_correct' => false],
                    ['answer_text' => '90 km/h', 'is_correct' => true],
                    ['answer_text' => '70 km/h', 'is_correct' => false],
                ],
            ],
            // Question n° 447 
            [
                'question_text' => 'La distance de freinage dépend :',
                'answers' => [
                    ['answer_text' => 'Du type de revêtement', 'is_correct' => true],
                    ['answer_text' => 'Du temps de réaction', 'is_correct' => false],
                    ['answer_text' => 'De la vitesse', 'is_correct' => true],
                    ['answer_text' => 'De l’état des pneumatiques', 'is_correct' => true],
                    ['answer_text' => 'De l’état des amortisseurs', 'is_correct' => true],
                ],
            ],
            // Question n° 448 
            [
                'question_text' => 'Quels sont les facteurs qui augmentent le temps de réaction ?',
                'answers' => [
                    ['answer_text' => 'La fatigue', 'is_correct' => true],
                    ['answer_text' => 'L’état d’ivresse', 'is_correct' => true],
                    ['answer_text' => 'Le manque de visibilité', 'is_correct' => true],
                    ['answer_text' => 'L’état des pneumatiques', 'is_correct' => false],
                ],
            ],
            // Question n° 449 
            [
                'question_text' => 'Par temps de pluie, pour m’arrêter j’appuie sur la pédale de frein :',
                'answers' => [
                    ['answer_text' => 'Aussi fort que quand la chaussée est sèche', 'is_correct' => false],
                    ['answer_text' => 'Moins fort que quand la chaussée est sèche', 'is_correct' => true],
                    ['answer_text' => 'Plus fort que quand la chaussée est sèche', 'is_correct' => false],
                ],
            ],
            // Question n° 450 
            [
                'question_text' => 'Les zébras sont réservés pour :',
                'answers' => [
                    ['answer_text' => 'Le stationnement d’urgence', 'is_correct' => false],
                    ['answer_text' => 'L’arrêt d’urgence', 'is_correct' => false],
                    ['answer_text' => 'Tourner et changer de direction', 'is_correct' => false],
                    ['answer_text' => 'Rien de tout ce qui précède', 'is_correct' => true],
                ],
            ],
            // Question n° 451 
            [
                'question_text' => 'Je dois réduire ma vitesse :',
                'answers' => [
                    ['answer_text' => 'A la vue d’un panneau de limitation de vitesse', 'is_correct' => true],
                    ['answer_text' => 'Pendant le dépassement', 'is_correct' => false],
                    ['answer_text' => 'En passant d’une zone éclairée à une zone d’ombre', 'is_correct' => true],
                    ['answer_text' => 'A la sortie d’une agglomération', 'is_correct' => false],
                    ['answer_text' => 'A l’approche d’une intersection', 'is_correct' => true],
                ],
            ],
            // Question n° 452 
            [
                'question_text' => 'A la vue du panneau B43 :',
                'answers' => [
                    ['answer_text' => 'Je respecte une vitesse de 30 km/h obligatoirement', 'is_correct' => false],
                    ['answer_text' => 'Je peux faire plus de 30 km/h', 'is_correct' => true],
                    ['answer_text' => 'Je peux faire moins de 30 km/h', 'is_correct' => true],
                ],
            ],
            // Question n° 453 
            [
                'question_text' => 'Quelles sont les précautions à prendre pour aborder un virage ?',
                'answers' => [
                    ['answer_text' => 'Garder la même vitesse pour vite aborder le virage', 'is_correct' => false],
                    ['answer_text' => 'Ralentir avant d’aborder le virage', 'is_correct' => true],
                    ['answer_text' => 'Rouler au milieu de la chaussée avant d’atteindre le virage', 'is_correct' => false],
                    ['answer_text' => 'Bien serrer la droite avant d’aborder le virage', 'is_correct' => true],
                ],
            ],
            // Question n° 454 
            [
                'question_text' => 'Que signifie le panneau B2c ?',
                'answers' => [
                    ['answer_text' => 'Interdit de tourner à gauche', 'is_correct' => false],
                    ['answer_text' => 'Interdit de faire marche arrière', 'is_correct' => false],
                    ['answer_text' => 'Interdit de faire demi-tour jusqu’à la prochaine intersection incluse', 'is_correct' => true],
                    ['answer_text' => 'Interdit de faire marche arrière jusqu’à la prochaine intersection incluse', 'is_correct' => false],
                ],
            ],
            // Question n° 455 
            [
                'question_text' => 'A la vue du panneau B6a1 :',
                'answers' => [
                    ['answer_text' => 'Je peux stationner avant ou après le panneau', 'is_correct' => false],
                    ['answer_text' => 'Je peux stationner après le panneau', 'is_correct' => false],
                    ['answer_text' => 'Je peux stationner avant le panneau', 'is_correct' => true], // Suivi de la réponse utilisateur
                    ['answer_text' => 'Je ne peux stationner ni avant ni après le panneau', 'is_correct' => false],
                ],
            ],
            // Question n° 456 
            [
                'question_text' => 'A la vue du panneau B21b :',
                'answers' => [
                    ['answer_text' => 'Je peux tourner à droite', 'is_correct' => false],
                    ['answer_text' => 'Je peux tourner à gauche', 'is_correct' => false],
                    ['answer_text' => 'Je peux faire demi-tour', 'is_correct' => false],
                    ['answer_text' => 'Je vais tout droit à la prochaine intersection', 'is_correct' => true],
                ],
            ],
            // Question n° 457 
            [
                'question_text' => 'Que signifie le panneau B43',
                'answers' => [
                    ['answer_text' => 'Stationnement interdit à 30m devant le panneau', 'is_correct' => false],
                    ['answer_text' => 'Stationnement interdit à 30m après le panneau', 'is_correct' => false],
                    ['answer_text' => 'Fin de vitesse minimale obligatoire', 'is_correct' => true],
                ],
            ],
            // Question n° 458 
            [
                'question_text' => 'La voie de stockage permet aux conducteurs de tourner :',
                'answers' => [
                    ['answer_text' => 'A gauche sans gêner les véhicules venant en sens inverse', 'is_correct' => true],
                    ['answer_text' => 'A droite sans gêner les véhicules venant en sens inverse', 'is_correct' => false],
                    ['answer_text' => 'Au milieu sans gêner les véhicules venant en sens inverse', 'is_correct' => false],
                ],
            ],
            // Question n° 459 
            [
                'question_text' => 'Sur les bandes et les pistes cyclables :',
                'answers' => [
                    ['answer_text' => 'Les automobilistes peuvent s’arrêter pour prendre un passager', 'is_correct' => false],
                    ['answer_text' => 'Les piétons peuvent circuler', 'is_correct' => false],
                    ['answer_text' => 'Les autos peuvent stationner en cas de panne', 'is_correct' => false],
                    ['answer_text' => 'Rien de tout ce qui précède', 'is_correct' => true],
                ],
            ],
            // Question n° 460
            [
                'question_text' => 'Pour suivre un véhicule qui roule à 90 km/h l’intervalle minimal de sécurité à conserver derrière ce véhicule est de :',
                'answers' => [
                    ['answer_text' => '10m environ', 'is_correct' => false],
                    ['answer_text' => '15m environ', 'is_correct' => false],
                    ['answer_text' => '25m environ', 'is_correct' => true], // Suivi de la réponse utilisateur
                ],
            ],
            // Question n° 461 
            [
                'question_text' => 'Il commence à pleuvoir, l’adhérence de mes pneumatiques sur la chaussée est :',
                'answers' => [
                    ['answer_text' => 'Aussi bonne que s’il avait plu toute la journée', 'is_correct' => false],
                    ['answer_text' => 'Moins bonne que s’il avait plu toute la journée', 'is_correct' => true],
                    ['answer_text' => 'Meilleure que s’il avait plu toute la journée', 'is_correct' => false],
                ],
            ],
            // Question n° 462 
            [
                'question_text' => 'La bifurcation, c’est la division d’une autoroute en :',
                'answers' => [
                    ['answer_text' => 'Quatre autoroutes', 'is_correct' => false],
                    ['answer_text' => 'Deux autoroutes', 'is_correct' => true],
                    ['answer_text' => 'Cinq autoroutes', 'is_correct' => false],
                    ['answer_text' => 'Trois autoroutes', 'is_correct' => false],
                ],
            ],
            // Question n° 463 
            [
                'question_text' => 'Le contrôle de la durée d’un stationnement à une durée limitée peut se faire :',
                'answers' => [
                    ['answer_text' => 'Par horodateur', 'is_correct' => false],
                    ['answer_text' => 'Par disque de stationnement', 'is_correct' => true],
                    ['answer_text' => 'Par parcmètre', 'is_correct' => false],
                ],
            ],
            // Question n° 464 
            [
                'question_text' => 'La rétrogradation permet de :',
                'answers' => [
                    ['answer_text' => 'Ralentir le véhicule dans une descente', 'is_correct' => true],
                    ['answer_text' => 'Repartir après un ralentissement', 'is_correct' => true],
                    ['answer_text' => 'Arrêter le véhicule en circulation', 'is_correct' => false],
                ],
            ],
            // Question n° 465 
            [
                'question_text' => 'En marche normale :',
                'answers' => [
                    ['answer_text' => 'Je dois rouler au milieu de la chaussée', 'is_correct' => false],
                    ['answer_text' => 'Je dois rouler à gauche de la chaussée', 'is_correct' => false],
                    ['answer_text' => 'Je dois rouler près du bord droit de la chaussée autant que la permettent son profil et son état', 'is_correct' => true],
                    ['answer_text' => 'Je dois rouler sur le trottoir', 'is_correct' => false],
                ],
            ],
            // Question n° 466 
            [
                'question_text' => 'En cas d’éclatement d’un pneumatique :',
                'answers' => [
                    ['answer_text' => 'Je freine fortement pour m’arrêter', 'is_correct' => false],
                    ['answer_text' => 'Je décélère progressivement en maintenant la trajectoire', 'is_correct' => true],
                    ['answer_text' => 'Je contre braque rapidement pour éviter une tête à queue', 'is_correct' => false],
                ],
            ],
            // Question n° 467 
            [
                'question_text' => 'Le conducteur d’un véhicule qui dérape sur une chaussée glissante doit :',
                'answers' => [
                    ['answer_text' => 'Freiner fort pour stopper le véhicule', 'is_correct' => false],
                    ['answer_text' => 'Braquer calmement pour ramener le véhicule dans sa trajectoire', 'is_correct' => true],
                    ['answer_text' => 'Accélérer franchement pour redonner de l’adhérence aux roues arrière', 'is_correct' => false],
                ],
            ],
            // Question n° 468 
            [
                'question_text' => 'Que signifie le panneau C12 ?',
                'answers' => [
                    ['answer_text' => 'Obligation d’aller tout droit après le panneau', 'is_correct' => false],
                    ['answer_text' => 'Obligation d’aller tout droit jusqu’à la prochaine intersection', 'is_correct' => false],
                    ['answer_text' => 'Circulation à sens unique', 'is_correct' => true],
                ],
            ],
            // Question n° 469 
            [
                'question_text' => 'Le stationnement est dangereux :',
                'answers' => [
                    ['answer_text' => 'Derrière les véhicules en stationnement', 'is_correct' => false],
                    ['answer_text' => 'A proximité d’une intersection', 'is_correct' => true],
                    ['answer_text' => 'Sur les accotements', 'is_correct' => false],
                    ['answer_text' => 'Au sommet de côte', 'is_correct' => true],
                    ['answer_text' => 'Dans les virages', 'is_correct' => true],
                ],
            ],
            // Question n° 470 
            [
                'question_text' => 'A bord d’un véhicule de tourisme pour, tourner à gauche sur une chaussée à double sens, je dois :',
                'answers' => [
                    ['answer_text' => 'Mettre le clignotant à gauche et céder le passage à droite', 'is_correct' => true],
                    ['answer_text' => 'Ralentir et serrer la gauche', 'is_correct' => false],
                    ['answer_text' => 'Tourner sans respecter la priorité à droite', 'is_correct' => false],
                ],
            ],
            // Question n° 471 
            [
                'question_text' => 'Comment accéder à l’autoroute ?',
                'answers' => [
                    ['answer_text' => 'Par voie d’accès', 'is_correct' => true],
                    ['answer_text' => 'Par voie de décélération', 'is_correct' => false],
                    ['answer_text' => 'Par voie d’accélération', 'is_correct' => true],
                ],
            ],
            // Question n° 472 
            [
                'question_text' => 'La route à grande circulation perd sa priorité :',
                'answers' => [
                    ['answer_text' => 'En agglomération', 'is_correct' => true],
                    ['answer_text' => 'A l’entrée d’une ville', 'is_correct' => true],
                    ['answer_text' => 'En dehors de l’agglomération', 'is_correct' => false],
                ],
            ],
            // Question n° 473 
            [
                'question_text' => 'Quelle est la vitesse maximale sur une route à grande circulation pour un candidat dont le permis a moins d’un an d’âge',
                'answers' => [
                    ['answer_text' => '60 km/h', 'is_correct' => false],
                    ['answer_text' => '90 km/h', 'is_correct' => true],
                    ['answer_text' => '120 km/h', 'is_correct' => false],
                ],
            ],
            // Question n°474 
            [
                'question_text' => 'A quoi sert la voie d’accélération ?',
                'answers' => [
                    ['answer_text' => 'Permet d’atteindre la vitesse minimale autorisée sur autoroute', 'is_correct' => true],
                    ['answer_text' => 'Permet de quitter l’autoroute', 'is_correct' => false],
                    ['answer_text' => 'Permet de dépasser les usagers lents', 'is_correct' => false],
                ],
            ],
            // Question n° 475 
            [
                'question_text' => 'Que signifie l’arrêt d’urgence ?',
                'answers' => [
                    ['answer_text' => 'Immobilisation forcée', 'is_correct' => true],
                    ['answer_text' => 'Arrêt pour faire descendre un passager', 'is_correct' => false],
                    ['answer_text' => 'Arrêt d’autobus', 'is_correct' => false],
                ],
            ],
            // Question n° 476 
            [
                'question_text' => 'La bande d’arrêt d’urgence est utilisée :',
                'answers' => [
                    ['answer_text' => 'Pour s’arrêter en cas de panne', 'is_correct' => true],
                    ['answer_text' => 'Pour s’arrêter et prendre un passager', 'is_correct' => false],
                    ['answer_text' => 'Pour s’arrêter en cas de malaise', 'is_correct' => true],
                ],
            ],
            // Question n°477 
            [
                'question_text' => 'Quelles sont les manœuvres interdites sur autoroute ?',
                'answers' => [
                    ['answer_text' => 'Dépassement', 'is_correct' => false],
                    ['answer_text' => 'Demi-tour', 'is_correct' => true],
                    ['answer_text' => 'Marche arrière', 'is_correct' => true],
                ],
            ],
            // Question n°478 
            [
                'question_text' => 'Le panneau triangle pointe en bas au début d’une voie d’accélération :',
                'answers' => [
                    ['answer_text' => 'oblige les usagers circulant sur autoroute à me céder le passage', 'is_correct' => false],
                    ['answer_text' => 'oblige à céder le passage aux usagers de l’autoroute', 'is_correct' => true],
                    ['answer_text' => 'oblige à marquer l’arrêt', 'is_correct' => false],
                ],
            ],
            // Question n°479 
            [
                'question_text' => 'Les différentes parties d’une rue sont :',
                'answers' => [
                    ['answer_text' => 'Chaussée, accotement', 'is_correct' => false],
                    ['answer_text' => 'Chaussée, terre-plein central, accotement', 'is_correct' => false],
                    ['answer_text' => 'Chaussée, trottoirs', 'is_correct' => true],
                    ['answer_text' => 'Terre-plein central, chaussée, trottoirs', 'is_correct' => true],
                ],
            ],
            // Question n°480 
            [
                'question_text' => 'Le trottoir est la partie d’une rue réservée :',
                'answers' => [
                    ['answer_text' => 'Pour les vendeuses', 'is_correct' => false],
                    ['answer_text' => 'Pour les piétons', 'is_correct' => true],
                    ['answer_text' => 'Pour le dépassement en cas de bouchon', 'is_correct' => false],
                ],
            ],
            // Question n°481 
            [
                'question_text' => 'La chaussée est la partie d’une route réservée :',
                'answers' => [
                    ['answer_text' => 'A la circulation de gros camions uniquement', 'is_correct' => false],
                    ['answer_text' => 'A la circulation des véhicules', 'is_correct' => true],
                    ['answer_text' => 'A la circulation des taxis uniquement', 'is_correct' => false],
                ],
            ],
            // Question n°482 
            [
                'question_text' => 'La voie est :',
                'answers' => [
                    ['answer_text' => 'Une partie de la chaussée ou le dépassement est possible', 'is_correct' => false],
                    ['answer_text' => 'Une partie de la chaussée réservée pour la circulation des véhicules', 'is_correct' => true],
                    ['answer_text' => 'Une partie de la chaussée réservée pour la circulation dans un sens', 'is_correct' => true],
                ],
            ],
            // Question n°483 
            [
                'question_text' => 'Où doit-on stationner en cas d’ennui mécanique sur l’autoroute ?',
                'answers' => [
                    ['answer_text' => 'Sur le terre- plein', 'is_correct' => false],
                    ['answer_text' => 'Sur la bande d’arrêt d’urgence', 'is_correct' => true],
                    ['answer_text' => 'Sur l’aire de repos', 'is_correct' => true],
                ],
            ],
            // Question n°484 
            [
                'question_text' => 'La vitesse maximale autorisée sur une autoroute est :',
                'answers' => [
                    ['answer_text' => '90km/h', 'is_correct' => false],
                    ['answer_text' => '200km/h', 'is_correct' => false],
                    ['answer_text' => '60km/h', 'is_correct' => false],
                    ['answer_text' => 'Fonction de la législation en vigueur dans chaque pays', 'is_correct' => true],
                ],
            ],
            // Question n°485 
            [
                'question_text' => 'La vitesse maximale autorisée sur une route pour automobile est :',
                'answers' => [
                    ['answer_text' => '90km/h', 'is_correct' => false],
                    ['answer_text' => '130km/h', 'is_correct' => false],
                    ['answer_text' => '110km/h', 'is_correct' => true],
                    ['answer_text' => 'Fonction de la législation en vigueur dans chaque pays', 'is_correct' => true],
                ],
            ],
            // Question n°486
            [
                'question_text' => 'La vitesse maximale autorisée en agglomération est :',
                'answers' => [
                    ['answer_text' => '70km/h', 'is_correct' => false],
                    ['answer_text' => '50km/h', 'is_correct' => true],
                    ['answer_text' => '90km/h', 'is_correct' => false],
                    ['answer_text' => '100km/h', 'is_correct' => false],
                ],
            ],
            // Question n°487 
            [
                'question_text' => 'Je suis en panne de carburant sur l’autoroute :',
                'answers' => [
                    ['answer_text' => 'Je vais à pied chercher du carburant à la station-service la plus proche', 'is_correct' => false],
                    ['answer_text' => 'Je me fais remorquer par un autre usager jusqu’à la station-service la plus proche', 'is_correct' => false],
                    ['answer_text' => 'J’utilise la cabine d’appel d’urgence pour me faire dépanner', 'is_correct' => true],
                    ['answer_text' => 'Je place mon triangle de pré-signalisation', 'is_correct' => false],
                ],
            ],
            // Question n°488 
            [
                'question_text' => 'Mon véhicule tombe en panne sur l’autoroute :',
                'answers' => [
                    ['answer_text' => 'je gare sur la bande d’arrêt d’urgence', 'is_correct' => true],
                    ['answer_text' => 'J’attends un véhicule de dépannage', 'is_correct' => true],
                    ['answer_text' => 'Je fais du stop pour demander de l’aide', 'is_correct' => false],
                    ['answer_text' => 'Je vais à pied jusqu\'à la prochaine borne d’appel', 'is_correct' => true],
                ],
            ],
            // Question n°489 
            [
                'question_text' => 'La circulation sur les bandes d’arrêt d’urgence de l’autoroute est autorisée :',
                'answers' => [
                    ['answer_text' => 'Aux ambulances effectuant un transport urgent de blessés', 'is_correct' => true],
                    ['answer_text' => 'A tous les véhicules en cas d’embouteillage', 'is_correct' => false],
                    ['answer_text' => 'Aux services d’entretien se rendant sur un lieu d’intervention', 'is_correct' => true],
                    ['answer_text' => 'Aux véhicules prioritaires en mission.', 'is_correct' => true],
                ],
            ],
            // Question n°490 
            [
                'question_text' => 'Sur autoroute les bornes d’appel d’urgence sont placées à :',
                'answers' => [
                    ['answer_text' => 'tous les kilomètres', 'is_correct' => false],
                    ['answer_text' => 'tous les deux kilomètres', 'is_correct' => true],
                    ['answer_text' => 'tous les trois kilomètres', 'is_correct' => false],
                    ['answer_text' => 'tous les cinq kilomètres', 'is_correct' => false],
                ],
            ],
            // Question n°491 
            [
                'question_text' => 'Quel doit être le comportement d’un conducteur à la sortie d’une autoroute ?',
                'answers' => [
                    ['answer_text' => 'réduire sa vitesse', 'is_correct' => true],
                    ['answer_text' => 'se réadapté à la vitesse normale', 'is_correct' => true],
                    ['answer_text' => 'tenir compte des intersections et de la présence des autres usagers', 'is_correct' => true],
                    ['answer_text' => 'utiliser son avertisseur sonore pour dégager la voie', 'is_correct' => false],
                ],
            ],
            // Question n°492 
            [
                'question_text' => 'L’accès à l’autoroute est interdit à certaines catégories d’usagers : lesquels ?',
                'answers' => [
                    ['answer_text' => 'piétons', 'is_correct' => true],
                    ['answer_text' => 'cyclomoteurs', 'is_correct' => true],
                    ['answer_text' => 'véhicules agricoles', 'is_correct' => true],
                    ['answer_text' => 'cavaliers', 'is_correct' => true],
                    ['answer_text' => 'véhicules lents', 'is_correct' => true],
                ],
            ],
            // Question n°493 
            [
                'question_text' => 'Quels sont les usagers dont l’accès à l’autoroute est interdit ?',
                'answers' => [
                    ['answer_text' => 'piétons', 'is_correct' => true],
                    ['answer_text' => 'motocyclette', 'is_correct' => false],
                    ['answer_text' => 'cavaliers', 'is_correct' => true],
                    ['answer_text' => 'véhicules de tourisme', 'is_correct' => false],
                    ['answer_text' => 'véhicules lents', 'is_correct' => true],
                ],
            ],
            // Question n°494 
            [
                'question_text' => 'Pour effectuer un changement de voie à droite, je contrôle :',
                'answers' => [
                    ['answer_text' => 'le rétroviseur droit', 'is_correct' => true],
                    ['answer_text' => 'le rétroviseur gauche', 'is_correct' => false],
                    ['answer_text' => 'en vision directe à droite', 'is_correct' => false],
                    ['answer_text' => 'le rétroviseur intérieur', 'is_correct' => true],
                ],
            ],
            // Question n°495 
            [
                'question_text' => 'La circulation est établie en files, je peux changer de voie pour :',
                'answers' => [
                    ['answer_text' => 'prendre une voie qui circule plus vite', 'is_correct' => false],
                    ['answer_text' => 'préparer un changement de direction', 'is_correct' => true],
                ],
            ],
            // Question n°496 
            [
                'question_text' => 'Une jonction d’autoroute est :',
                'answers' => [
                    ['answer_text' => 'Le raccordement de deux autoroutes', 'is_correct' => true],
                    ['answer_text' => 'La séparation d’une autoroute en deux branches', 'is_correct' => false],
                    ['answer_text' => 'Le raccordement d’une autoroute et d’une voie d’insertion', 'is_correct' => false],
                ],
            ],
            // Question n°497 
            [
                'question_text' => 'Une autoroute est toujours une route :',
                'answers' => [
                    ['answer_text' => 'A sens unique', 'is_correct' => true],
                    ['answer_text' => 'A trois voies de circulation', 'is_correct' => false],
                    ['answer_text' => 'Interdite aux piétons, cyclistes et cyclomotoristes', 'is_correct' => true],
                ],
            ],
            // Question n°498 
            [
                'question_text' => 'Une voie pour véhicules lents est réservée :',
                'answers' => [
                    ['answer_text' => 'aux poids-lourds uniquement', 'is_correct' => false],
                    ['answer_text' => 'aux véhicules dont la vitesse est inférieure à 60km/h', 'is_correct' => true],
                    ['answer_text' => 'aux véhicules dont la vitesse est inférieure à 80 km/h', 'is_correct' => false],
                ],
            ],
            // Question n°499 
            [
                'question_text' => 'Sur les chaussées d’autoroute à 3 voies, il est permis de dépasser :',
                'answers' => [
                    ['answer_text' => 'Par la droite', 'is_correct' => false],
                    ['answer_text' => 'Par la gauche', 'is_correct' => true],
                    ['answer_text' => 'Du côté souhaité', 'is_correct' => false],
                ],
            ],
            // Question n°500 
            [
                'question_text' => 'Les routes à accès règlementé sont toutes :',
                'answers' => [
                    ['answer_text' => 'A chaussées séparées et à sens unique', 'is_correct' => false],
                    ['answer_text' => 'A vitesse limité à 110 km/h', 'is_correct' => false],
                    ['answer_text' => 'A chaussées à double sens', 'is_correct' => false],
                    ['answer_text' => 'Rien de tout ce qui précède', 'is_correct' => true],
                ],
            ],
            // Question n°501 
            [
                'question_text' => 'Quels sont les types de stationnement ?',
                'answers' => [
                    ['answer_text' => 'Bataille – créneau – perpendiculaire', 'is_correct' => false],
                    ['answer_text' => 'Bataille – épi – créneau', 'is_correct' => true],
                    ['answer_text' => 'Epi – créneau – oblique', 'is_correct' => false],
                    ['answer_text' => 'En double file – épi – parallèle', 'is_correct' => false],
                ],
            ],
            // Question n°502 
            [
                'question_text' => 'A quoi sert le terre-plein central ?',
                'answers' => [
                    ['answer_text' => 'A stationner', 'is_correct' => false],
                    ['answer_text' => 'A exposer les marchandises', 'is_correct' => false],
                    ['answer_text' => 'A faire un demi-tour', 'is_correct' => false],
                    ['answer_text' => 'A séparer deux chaussées', 'is_correct' => true],
                ],
            ],
            // Question n°503 
            [
                'question_text' => 'En quittant le stationnement en marche normale pour intégrer la circulation, je dois :',
                'answers' => [
                    ['answer_text' => 'Utiliser le rétroviseur de droite', 'is_correct' => false],
                    ['answer_text' => 'Mettre le clignotant de gauche, utiliser le rétroviseur de gauche et m’engager avec prudence', 'is_correct' => true],
                    ['answer_text' => 'M’engager rapidement', 'is_correct' => false],
                ],
            ],
            // Question n°504 
            [
                'question_text' => 'En sortant d’un garage pour intégrer la circulation, je dois :',
                'answers' => [
                    ['answer_text' => 'Céder le passage aux usagers venant de la droite seulement', 'is_correct' => false],
                    ['answer_text' => 'Céder le passage aux usagers venant de la gauche seulement', 'is_correct' => false],
                    ['answer_text' => 'Céder le passage aux usagers venant de la droite et de la gauche', 'is_correct' => true],
                ],
            ],
            // Question n°505 
            [
                'question_text' => 'En sortant d’un garage pour intégrer la circulation, quelle est la toute première précaution à prendre ?',
                'answers' => [
                    ['answer_text' => 'Jeter un coup d’œil à gauche', 'is_correct' => true],
                    ['answer_text' => 'Klaxonner', 'is_correct' => false],
                    ['answer_text' => 'Jeter un coup d’œil à droite', 'is_correct' => false],
                ],
            ],
        ];

        $currentQuestionOrder = 405;
        foreach ($questionsData as $data) {
            // Assurez-vous que les modèles Question et Answer existent et sont corrects
            // J'utilise le modèle Question (qui a le 'quiz_id', 'question_text', 'order', 'type')
            $question = Question::create([
                'quiz_id' => $quizId,
                'question_text' => $data['question_text'],
                'order' => $currentQuestionOrder,
                'type' => 'multiple_choice', 
            ]);

            $answerOrder = 1;
            foreach ($data['answers'] as $answerData) {
                // J'utilise le modèle Answer (qui a le 'question_id', 'answer_text', 'is_correct', 'order')
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