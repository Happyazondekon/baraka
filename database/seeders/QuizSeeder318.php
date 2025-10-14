<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\Answer;

class QuizSeeder318 extends Seeder
{
    /**
     * Run the database seeds for Quiz ID 6 (Dépassement et Croisement, Q258-Q318).
     *
     * @return void
     */
    public function run()
    {
        // ID du Quiz
        $quizId = 6;

        $questionsData = [
            // Question n°258
            [
                'question_text' => 'Que doit faire un conducteur qui est sur le point d’être dépassé ?',
                'answers' => [
                    ['answer_text' => 'Il serre sa gauche sans accélérer', 'is_correct' => false],
                    ['answer_text' => 'Il serre sa droite en accélérant', 'is_correct' => false],
                    ['answer_text' => 'Il serre sa droite sans accélérer', 'is_correct' => true],
                    ['answer_text' => 'Il reste au milieu de la chaussée en accélérant', 'is_correct' => false],
                    ['answer_text' => 'Il serre sa droite en ralentissant', 'is_correct' => false],
                ],
            ],
            // Question n°259
            [
                'question_text' => 'Dans quels cas est-il interdit de dépasser ?',
                'answers' => [
                    ['answer_text' => 'Lorsque je gène un usager venant de derrière', 'is_correct' => false],
                    ['answer_text' => 'Lorsque je suis au sommet d’une côte où dans un virage', 'is_correct' => true],
                    ['answer_text' => 'Lorsque je suis en présence d’un panneau d’interdiction de dépasser', 'is_correct' => true],
                    ['answer_text' => 'Lorsque je suis sur le point d’être dépassé', 'is_correct' => true],
                ],
            ],
            // Question n°260
            [
                'question_text' => 'La nuit, pour dépasser,',
                'answers' => [
                    ['answer_text' => 'J’utilise mes avertisseurs sonores', 'is_correct' => false],
                    ['answer_text' => 'J’utilise mes avertisseurs lumineux', 'is_correct' => true],
                    ['answer_text' => 'Je ne fais rien de tout cela', 'is_correct' => false],
                ],
            ],
            // Question n°261
            [
                'question_text' => 'Lorsque la ligne discontinue de la ligne mixte est plus proche du conducteur, on peut franchir cette ligne :',
                'answers' => [
                    ['answer_text' => 'Pour tourner à droite', 'is_correct' => false],
                    ['answer_text' => 'Pour tourner à gauche', 'is_correct' => false],
                    ['answer_text' => 'Pour dépasser puis se rabattre', 'is_correct' => true],
                ],
            ],
            // Question n°262
            [
                'question_text' => 'Quelle est la toute première précaution à observer pour effectuer un dépassement ?',
                'answers' => [
                    ['answer_text' => 'S’assurer que l’on n’est pas dans un cas d’interdiction', 'is_correct' => true],
                    ['answer_text' => 'Accélérer pour dépasser', 'is_correct' => false],
                    ['answer_text' => 'Bien serrer sa droite', 'is_correct' => false],
                ],
            ],
            // Question n°263
            [
                'question_text' => 'En général, de quel côté s’effectue le dépassement ?',
                'answers' => [
                    ['answer_text' => 'Par la droite', 'is_correct' => false],
                    ['answer_text' => 'Par la gauche', 'is_correct' => true],
                    ['answer_text' => 'Du côté de votre choix', 'is_correct' => false],
                    ['answer_text' => 'Du côté où c’est possible', 'is_correct' => false],
                ],
            ],
            // Question n°264
            [
                'question_text' => 'Dans quel cas peut-on être autorisé, à dépasser par la droite ?',
                'answers' => [
                    ['answer_text' => 'Quand on a une file ininterrompue de véhicules devant soi', 'is_correct' => false],
                    ['answer_text' => 'Quand le véhicule à dépasser a déjà pris position pour tourner à gauche', 'is_correct' => true],
                    ['answer_text' => 'En abordant une intersection', 'is_correct' => false],
                    ['answer_text' => 'Sur une chaussée à sens unique', 'is_correct' => false],
                ],
            ],
            // Question n°265
            [
                'question_text' => 'Quand est-ce que le dépassement est effectif ?',
                'answers' => [
                    ['answer_text' => 'Quand l’usager dépassé apparaît dans le rétroviseur intérieur', 'is_correct' => true],
                    ['answer_text' => 'Après avoir mis le clignotant à droite pour se rabattre', 'is_correct' => false],
                    ['answer_text' => 'Quand on peut estimer soi-même que le dépassement est fait', 'is_correct' => false],
                ],
            ],
            // Question n°266
            [
                'question_text' => 'En combien d’étape s’effectue le dépassement ?',
                'answers' => [
                    ['answer_text' => 'En une étape', 'is_correct' => false],
                    ['answer_text' => 'En deux étapes', 'is_correct' => false],
                    ['answer_text' => 'En trois étapes', 'is_correct' => true],
                ],
            ],
            // Question n°267
            [
                'question_text' => 'Citez deux cas d’interdiction de dépasser :',
                'answers' => [
                    ['answer_text' => 'Devant un panneau interdisant de dépasser et sur une ligne continue', 'is_correct' => true],
                    ['answer_text' => 'Devant un panneau interdisant de dépasser et sur une ligne discontinue', 'is_correct' => false],
                    ['answer_text' => 'Sur des lignes mixtes dont la ligne discontinue se trouve du côté du conducteur', 'is_correct' => false],
                ],
            ],
            // Question n°268
            [
                'question_text' => 'Sur une chaussée à 3 voies et à double sens, on utilise, pour dépasser :',
                'answers' => [
                    ['answer_text' => 'La voie centrale', 'is_correct' => true],
                    ['answer_text' => 'La voie la plus à gauche', 'is_correct' => false],
                    ['answer_text' => 'La voie la plus à droite', 'is_correct' => false],
                ],
            ],
            // Question n°269
            [
                'question_text' => 'Donner l’écart latéral minimal entre deux véhicules automobiles lors d’un dépassement',
                'answers' => [
                    ['answer_text' => '1m environ', 'is_correct' => false],
                    ['answer_text' => '0,50m environ', 'is_correct' => true],
                    ['answer_text' => '0,3m environ', 'is_correct' => false],
                ],
            ],
            // Question n°270
            [
                'question_text' => 'Donner l’écart minimal à observer par un automobiliste qui dépasse un piéton ou un cycliste en agglomération:',
                'answers' => [
                    ['answer_text' => '1m environ', 'is_correct' => true],
                    ['answer_text' => '0,5m environ', 'is_correct' => false],
                    ['answer_text' => '2,0m environ', 'is_correct' => false],
                ],
            ],
            // Question n°271
            [
                'question_text' => 'Quel serait votre comportement quand un usager s’apprête à vous dépasser ?',
                'answers' => [
                    ['answer_text' => 'Je serre ma gauche', 'is_correct' => false],
                    ['answer_text' => 'J’occupe l’axe médian de la chaussée', 'is_correct' => false],
                    ['answer_text' => 'Je serre ma droite', 'is_correct' => true],
                    ['answer_text' => 'Je ralentis', 'is_correct' => false],
                ],
            ],
            // Question n°272
            [
                'question_text' => 'A la vue de ce panneau B3 (Fin d\'interdiction de dépasser) je peux dépasser :',
                'answers' => [
                    ['answer_text' => 'Tous véhicules à moteur qui me précèdent', 'is_correct' => false],
                    ['answer_text' => 'Un motocycliste sans side-car', 'is_correct' => true],
                    ['answer_text' => 'Un véhicule à traction animale', 'is_correct' => true],
                    ['answer_text' => 'Un cyclomotoriste sans side-car', 'is_correct' => true],
                ],
            ],
            // Question n°273
            [
                'question_text' => 'A la vue du panneau B3 (Interdiction de dépasser tous véhicules à moteur sauf deux roues sans side-car) :',
                'answers' => [
                    ['answer_text' => 'J’accélère et je passe', 'is_correct' => false],
                    ['answer_text' => 'Je ne dois pas dépasser', 'is_correct' => true],
                    ['answer_text' => 'Je dois dépasser par la droite', 'is_correct' => false],
                ],
            ],
            // Question n°274
            [
                'question_text' => 'Dans quels cas doit-on utiliser les clignotants ?',
                'answers' => [
                    ['answer_text' => 'Lorsqu’on veut s’insérer dans la circulation', 'is_correct' => true],
                    ['answer_text' => 'Lorsqu’on veut augmenter ou réduire sa vitesse', 'is_correct' => false],
                    ['answer_text' => 'Lorsqu’on veut dépasser ou se rabattre', 'is_correct' => true],
                    ['answer_text' => 'Lorsqu’on veut changer de direction', 'is_correct' => true],
                    ['answer_text' => 'Lorsqu’on veut croiser', 'is_correct' => false],
                ],
            ],
            // Question n°275
            [
                'question_text' => 'Dans quels cas utilise t- on ses feux de route ?',
                'answers' => [
                    ['answer_text' => 'En agglomération dans une rue non éclairée', 'is_correct' => true],
                    ['answer_text' => 'Lorsqu’on va croiser un autre usager', 'is_correct' => false],
                    ['answer_text' => 'Lorsqu’on ne risque d’éblouir personne', 'is_correct' => true],
                    ['answer_text' => 'Lorsqu’on quitte une zone éclairée pour une zone sombre', 'is_correct' => true],
                ],
            ],
            // Question n°276
            [
                'question_text' => 'En rase campagne le dépassement est autorisé :',
                'answers' => [
                    ['answer_text' => 'A proximité des intersections', 'is_correct' => false],
                    ['answer_text' => 'Au sommet de côte', 'is_correct' => false],
                    ['answer_text' => 'Dans les virages', 'is_correct' => false],
                    ['answer_text' => 'Rien de tout ce qui précède', 'is_correct' => true],
                ],
            ],
            // Question n°277
            [
                'question_text' => 'Pour effectuer un dépassement :',
                'answers' => [
                    ['answer_text' => 'J’avertis, je contrôle, puis je déboîte', 'is_correct' => false],
                    ['answer_text' => 'Je contrôle, j’avertis et je déboîte', 'is_correct' => true],
                    ['answer_text' => 'Je déboîte, j’avertis, je contrôle', 'is_correct' => false],
                ],
            ],
            // Question n°278
            [
                'question_text' => 'Lors du dépassement d’un véhicule la nuit, je mets les feux de route,',
                'answers' => [
                    ['answer_text' => 'Immédiatement après avoir déboîter', 'is_correct' => false],
                    ['answer_text' => 'En arrivant à la hauteur du conducteur du véhicule à dépasser', 'is_correct' => true],
                    ['answer_text' => 'Tout de suite après m’être rabattu', 'is_correct' => false],
                ],
            ],
            // Question n°279
            [
                'question_text' => 'Comment prévenir l’usager à dépasser le jour ?',
                'answers' => [
                    ['answer_text' => 'Par des appels sonores', 'is_correct' => true],
                    ['answer_text' => 'Par des appels lumineux', 'is_correct' => false],
                    ['answer_text' => 'Par le clignotant', 'is_correct' => false],
                ],
            ],
            // Question n°280
            [
                'question_text' => 'Comment prévenir l’usager à dépasser la nuit ?',
                'answers' => [
                    ['answer_text' => 'Par des appels sonores', 'is_correct' => false],
                    ['answer_text' => 'Par des appels lumineux', 'is_correct' => true],
                    ['answer_text' => 'Par le clignotant', 'is_correct' => false],
                ],
            ],
            // Question n°281
            [
                'question_text' => 'A une intersection de deux routes de même nature peut-on dépasser par la gauche ?',
                'answers' => [
                    ['answer_text' => 'On peut effectuer rapidement le dépassement', 'is_correct' => false],
                    ['answer_text' => 'On ne peut pas effectuer le dépassement', 'is_correct' => true],
                    ['answer_text' => 'On le peut si le véhicule qui me précède signal son intention de tourner à droite', 'is_correct' => true],
                ],
            ],
            // Question n°282
            [
                'question_text' => 'Aux sommets d’une côte :',
                'answers' => [
                    ['answer_text' => 'Je peux dépasser si ma voiture a une réserve d’accélération suffisante', 'is_correct' => false],
                    ['answer_text' => 'Je peux dépasser à la hauteur d’une ligne continue', 'is_correct' => false],
                    ['answer_text' => 'Je ne peux pas dépasser', 'is_correct' => true],
                ],
            ],
            // Question n°283
            [
                'question_text' => 'Sur une chaussée à double sens comportant trois voies :',
                'answers' => [
                    ['answer_text' => 'Je suis autorisé à dépasser en 3ème position lorsqu’aucun usager ne vient en face', 'is_correct' => false],
                    ['answer_text' => 'Je suis autorisé à dépasser en 3ème position lorsque je juge suffisante la largeur de la chaussée', 'is_correct' => false],
                    ['answer_text' => 'Je ne suis pas autorisé à dépasser en 3ème position', 'is_correct' => true],
                ],
            ],
            // Question n°284
            [
                'question_text' => 'Au niveau des flèches de rabattement',
                'answers' => [
                    ['answer_text' => 'Je suis autorisé à dépasser lorsqu’aucun usager ne vient en face', 'is_correct' => false],
                    ['answer_text' => 'Je suis autorisé à dépasser lorsque je juge la largeur de la chaussée suffisante', 'is_correct' => false],
                    ['answer_text' => 'Je ne suis pas autorisé à dépasser', 'is_correct' => true],
                    ['answer_text' => 'Je suis autorisé si l’usager devant moi est trop lent', 'is_correct' => false],
                ],
            ],
            // Question n°285
            [
                'question_text' => 'Au niveau d’une ligne continue accolée à une ligne discontinue plus proche du conducteur, peut-on effectuer le dépassement ?',
                'answers' => [
                    ['answer_text' => 'On ne peut pas effectuer le dépassement', 'is_correct' => false],
                    ['answer_text' => 'On peut effectuer le dépassement', 'is_correct' => true],
                    ['answer_text' => 'On ne peut pas effectuer le dépassement la nuit', 'is_correct' => false],
                ],
            ],
            // Question n°286
            [
                'question_text' => 'A quel passage à niveau le dépassement est-il autorisé ?',
                'answers' => [
                    ['answer_text' => 'A un passage à niveau sans barrière', 'is_correct' => false],
                    ['answer_text' => 'A un passage à niveau avec barrière à fonctionnement manuel', 'is_correct' => false],
                    ['answer_text' => 'A un passage à niveau avec barrière à fonctionnement automatique', 'is_correct' => false],
                    ['answer_text' => 'A aucun passage à niveau', 'is_correct' => true],
                ],
            ],
            // Question n°287
            [
                'question_text' => 'Sur cette image D9 (véhicule bleu double en virage) :',
                'answers' => [
                    ['answer_text' => 'Le véhicule bleu est en infraction', 'is_correct' => true],
                    ['answer_text' => 'Le véhicule bleu effectue une bonne manœuvre', 'is_correct' => false],
                    ['answer_text' => 'Le véhicule bleu n’est pas en infraction', 'is_correct' => false],
                    ['answer_text' => 'Le véhicule bleu effectue une mauvaise manœuvre', 'is_correct' => true],
                ],
            ],
            // Question n°288
            [
                'question_text' => 'Sur cette chaussée D10 à trois voies et à double sens de circulation (véhicule jaune utilise la voie la plus à gauche) :',
                'answers' => [
                    ['answer_text' => 'Le véhicule jaune est en infraction', 'is_correct' => true],
                    ['answer_text' => 'Le véhicule jaune n’est pas en infraction', 'is_correct' => false],
                    ['answer_text' => 'Le véhicule jaune effectue une bonne manœuvre', 'is_correct' => false],
                    ['answer_text' => 'Le véhicule jaune effectue une mauvaise manœuvre', 'is_correct' => true],
                ],
            ],
            // Question n°289
            [
                'question_text' => 'Sur cette image D11 (véhicule jaune dépassant par la droite un véhicule tournant à gauche) :',
                'answers' => [
                    ['answer_text' => 'Le véhicule jaune effectue une bonne manœuvre', 'is_correct' => true],
                    ['answer_text' => 'Le véhicule jaune n’est pas en infraction', 'is_correct' => true],
                    ['answer_text' => 'Le véhicule jaune effectue une mauvaise manœuvre', 'is_correct' => false],
                    ['answer_text' => 'Le véhicule jaune est en infraction', 'is_correct' => false],
                ],
            ],
            // Question n°290
            [
                'question_text' => 'Sur cette image D12 (véhicule vert dépasse un cycliste avec une ligne discontinue) :',
                'answers' => [
                    ['answer_text' => 'Le véhicule vert est en infraction', 'is_correct' => false],
                    ['answer_text' => 'Le véhicule vert effectue une bonne manœuvre', 'is_correct' => true],
                    ['answer_text' => 'Le véhicule vert n’est pas en infraction', 'is_correct' => true],
                    ['answer_text' => 'Le véhicule vert effectue une mauvaise manœuvre', 'is_correct' => false],
                ],
            ],
            // Question n°291
            [
                'question_text' => 'Sur cette chaussée D13 à quatre voies et à double sens de circulation, (véhicule vert sur la 4ème voie) :',
                'answers' => [
                    ['answer_text' => 'Le véhicule vert n’est pas en infraction', 'is_correct' => false],
                    ['answer_text' => 'Le véhicule vert effectue une bonne manœuvre', 'is_correct' => false],
                    ['answer_text' => 'Le véhicule vert effectue une mauvaise manœuvre', 'is_correct' => true],
                    ['answer_text' => 'Le véhicule vert est en infraction', 'is_correct' => true],
                ],
            ],
            // Question n°292
            [
                'question_text' => 'Sur cette chaussée D13 à quatre voies et à sens unique (véhicule vert sur la 4ème voie) :',
                'answers' => [
                    ['answer_text' => 'Le véhicule vert n’est pas en infraction', 'is_correct' => true],
                    ['answer_text' => 'Le véhicule vert effectue une bonne manœuvre', 'is_correct' => true],
                    ['answer_text' => 'Le véhicule vert effectue une mauvaise manœuvre', 'is_correct' => false],
                    ['answer_text' => 'Le véhicule vert est en infraction', 'is_correct' => false],
                ],
            ],
            // Question n°293
            [
                'question_text' => 'Sur cette image D9 (véhicule bleu double en virage) :',
                'answers' => [
                    ['answer_text' => 'Le véhicule bleu est en infraction', 'is_correct' => true],
                    ['answer_text' => 'Le véhicule bleu n’est pas en infraction', 'is_correct' => false],
                    ['answer_text' => 'Le véhicule bleu effectue une mauvaise manœuvre', 'is_correct' => true],
                    ['answer_text' => 'Le véhicule bleu effectue une bonne manœuvre', 'is_correct' => false],
                ],
            ],
            // Question n°294
            [
                'question_text' => 'Sur cette chaussée D10 à trois voies et à sens unique de circulation (véhicule jaune sur la 3ème voie pour dépasser) :',
                'answers' => [
                    ['answer_text' => 'Le véhicule jaune est en infraction', 'is_correct' => false],
                    ['answer_text' => 'Le véhicule jaune effectue une bonne manœuvre', 'is_correct' => true],
                    ['answer_text' => 'Le véhicule jaune effectue une mauvaise manœuvre', 'is_correct' => false],
                    ['answer_text' => 'Le véhicule jaune n’est pas en infraction', 'is_correct' => true],
                ],
            ],
            // Question n°295
            [
                'question_text' => 'Sur cette image D4 (ligne discontinue autorisant le dépassement) :',
                'answers' => [
                    ['answer_text' => 'Le véhicule bleu est en infraction', 'is_correct' => false],
                    ['answer_text' => 'Le véhicule bleu n’est pas en infraction', 'is_correct' => true],
                    ['answer_text' => 'Le véhicule bleu effectue une bonne manœuvre', 'is_correct' => true],
                    ['answer_text' => 'Le véhicule bleu effectue une mauvaise manœuvre', 'is_correct' => false],
                ],
            ],
            // Question n°296
            [
                'question_text' => 'Sur une chaussée à plus de deux voies et à double sens de circulation, le dépassement est interdit :',
                'answers' => [
                    ['answer_text' => 'Sur la voie se trouvant la plus à gauche', 'is_correct' => true],
                    ['answer_text' => 'Sur la voie du milieu', 'is_correct' => false],
                    ['answer_text' => 'Sur toutes les voies', 'is_correct' => false],
                ],
            ],
            // Question n°297
            [
                'question_text' => 'Sur une chaussée à deux voies et à double sens, je peux circuler :',
                'answers' => [
                    ['answer_text' => 'Sur la voie de gauche pour effectuer un dépassement', 'is_correct' => true],
                    ['answer_text' => 'Sur la voie de gauche de façon continue', 'is_correct' => false],
                    ['answer_text' => 'Sur la voie de droite seulement', 'is_correct' => false],
                ],
            ],
            // Question n°298
            [
                'question_text' => 'Le franchissement ou le chevauchement de la ligne continue est autorisé :',
                'answers' => [
                    ['answer_text' => 'A tout moment', 'is_correct' => false],
                    ['answer_text' => 'A aucun moment', 'is_correct' => true],
                    ['answer_text' => 'Pour effectuer un dépassement', 'is_correct' => false],
                    ['answer_text' => 'Lorsque la chaussée est libre', 'is_correct' => false],
                ],
            ],
            // Question n°299
            [
                'question_text' => 'Vous circulez par temps de grand vent ; pour dépasser un autre usager :',
                'answers' => [
                    ['answer_text' => 'Vous diminuez l’écart latéral', 'is_correct' => false],
                    ['answer_text' => 'Vous maintenez l’écart latéral', 'is_correct' => false],
                    ['answer_text' => 'Vous augmentez l’écart latéral', 'is_correct' => true],
                ],
            ],
            // Question n°300
            [
                'question_text' => 'Pour effectuer un croisement, je dois :',
                'answers' => [
                    ['answer_text' => 'Accélérer', 'is_correct' => false],
                    ['answer_text' => 'Ralentir', 'is_correct' => true],
                    ['answer_text' => 'Serrer ma droite', 'is_correct' => true],
                ],
            ],
            // Question n°301
            [
                'question_text' => 'Pour effectuer un croisement la nuit, je dois',
                'answers' => [
                    ['answer_text' => 'Klaxonner', 'is_correct' => false],
                    ['answer_text' => 'Circuler en phare', 'is_correct' => false],
                    ['answer_text' => 'Circuler en code', 'is_correct' => true],
                    ['answer_text' => 'Circuler en feux de détresse', 'is_correct' => false],
                ],
            ],
            // Question n°302
            [
                'question_text' => 'Quel est le véhicule qui doit s’arrêter à temps à cause d’un croisement difficile sur un terrain plat ?',
                'answers' => [
                    ['answer_text' => 'Le véhicule léger', 'is_correct' => false],
                    ['answer_text' => 'Le véhicule encombrant', 'is_correct' => true],
                    ['answer_text' => 'Le véhicule qui veut', 'is_correct' => false],
                ],
            ],
            // Question n°303
            [
                'question_text' => 'Sur une pente, quel est le véhicule qui doit s’arrêter à temps à cause d’un croisement difficile ?',
                'answers' => [
                    ['answer_text' => 'Le véhicule montant', 'is_correct' => false],
                    ['answer_text' => 'Le véhicule descendant', 'is_correct' => true],
                    ['answer_text' => 'Le véhicule qui le désire', 'is_correct' => false],
                ],
            ],
            // Question n°304
            [
                'question_text' => 'En agglomération, quel est le véhicule qui doit s’arrêter à temps à cause d’un croisement difficile ?',
                'answers' => [
                    ['answer_text' => 'L’autobus', 'is_correct' => false],
                    ['answer_text' => 'Le véhicule qui le désire', 'is_correct' => false],
                    ['answer_text' => 'Le camion', 'is_correct' => true],
                ],
            ],
            // Question n°305
            [
                'question_text' => 'Lorsque deux véhicules de même catégorie se retrouvent sur une pente, lequel doit faire la marche arrière à cause d’un croisement difficile ?',
                'answers' => [
                    ['answer_text' => 'Le véhicule montant', 'is_correct' => false],
                    ['answer_text' => 'Le véhicule descendant', 'is_correct' => true],
                    ['answer_text' => 'Le véhicule qui veut', 'is_correct' => false],
                ],
            ],
            // Question n°306
            [
                'question_text' => 'Dans quels cas dois-je m’arrêter pour laisser passer l’usager venant en sens inverse ?',
                'answers' => [
                    ['answer_text' => 'Devant le panneau "chaussée rétrécie" et un obstacle devant moi', 'is_correct' => true],
                    ['answer_text' => 'Devant le panneau "céder le passage" aux usagers venant en sens inverse et devant un panneau "chaussée rétrécie"', 'is_correct' => true],
                    ['answer_text' => 'Devant le panneau sens interdit et un obstacle devant moi', 'is_correct' => false],
                ],
            ],
            // Question n°307
            [
                'question_text' => 'Sur une pente, quel est le véhicule qui doit faciliter le passage lors d’un croisement difficile ?',
                'answers' => [
                    ['answer_text' => 'L’autobus chargé', 'is_correct' => false],
                    ['answer_text' => 'Le camion', 'is_correct' => true],
                    ['answer_text' => 'Le véhicule qui le désire', 'is_correct' => false],
                ],
            ],
            // Question n°308
            [
                'question_text' => 'Sur une pente, quel est le véhicule qui doit faire la marche arrière à cause d’un croisement difficile ?',
                'answers' => [
                    ['answer_text' => 'Le véhicule isolé', 'is_correct' => true],
                    ['answer_text' => 'Le véhicule articulé', 'is_correct' => false],
                    ['answer_text' => 'Le véhicule qui veut', 'is_correct' => false],
                ],
            ],
            // Question n°309
            [
                'question_text' => 'La nuit, pour éviter d’être ébloui :',
                'answers' => [
                    ['answer_text' => 'Je regarde le bord droit de la chaussée', 'is_correct' => true],
                    ['answer_text' => 'Je ferme les yeux pendant un court instant', 'is_correct' => false],
                    ['answer_text' => 'Je porte des verres teintés', 'is_correct' => false],
                    ['answer_text' => 'J’allume mes feux de route', 'is_correct' => false],
                ],
            ],
            // Question n°310
            [
                'question_text' => 'L’écart minimal de vitesse recommandé pour un véhicule qui veut effectuer le dépassement est de :',
                'answers' => [
                    ['answer_text' => '30km/h', 'is_correct' => false],
                    ['answer_text' => '25 km/h', 'is_correct' => false],
                    ['answer_text' => '40 km/h', 'is_correct' => false],
                    ['answer_text' => '20 km/h', 'is_correct' => true],
                    ['answer_text' => '10 km/h', 'is_correct' => false],
                ],
            ],
            // Question n°311
            [
                'question_text' => 'Sur une chaussée à forte déclivité, quel est le véhicule qui doit s’arrêter à temps lorsque le croisement se révèle difficile ?',
                'answers' => [
                    ['answer_text' => 'Le véhicule descendant', 'is_correct' => true],
                    ['answer_text' => 'Le véhicule qui le désire', 'is_correct' => false],
                    ['answer_text' => 'Le véhicule montant', 'is_correct' => false],
                ],
            ],
            // Question n°312
            [
                'question_text' => 'Je laisse passer l’usager d’en face en m’arrêtant :',
                'answers' => [
                    ['answer_text' => 'Quand se dresse un obstacle devant moi', 'is_correct' => true],
                    ['answer_text' => 'Devant un panneau de circulation à sens unique', 'is_correct' => false],
                    ['answer_text' => 'Quand je suis au volant d’un véhicule encombrant', 'is_correct' => true],
                ],
            ],
            // Question n°313
            [
                'question_text' => 'Quel doit être mon comportement lorsqu’un usager manifeste son intention de me dépasser ?',
                'answers' => [
                    ['answer_text' => 'Je ne l’empêche pas si la manœuvre est régulière', 'is_correct' => true],
                    ['answer_text' => 'Je serre ma droite le plus possible', 'is_correct' => true],
                    ['answer_text' => 'J’accélère', 'is_correct' => false],
                    ['answer_text' => 'Je maintiens mon allure et, au besoin je ralentis', 'is_correct' => true],
                    ['answer_text' => 'La nuit, je passe en feu de croisement quand il arrive à ma hauteur', 'is_correct' => true],
                ],
            ],
            // Question n°314
            [
                'question_text' => 'Dans quels cas devez-vous céder le passage de gauche comme de droite ?',
                'answers' => [
                    ['answer_text' => 'devant le feu vert ou jaune clignotant', 'is_correct' => false],
                    ['answer_text' => 'devant le feu rouge', 'is_correct' => true],
                    ['answer_text' => 'devant le panneau « STOP »', 'is_correct' => true],
                    ['answer_text' => 'devant le panneau « Triangle pointe en bas » (Cédez le passage)', 'is_correct' => true],
                    ['answer_text' => 'en sortant d’un chemin de terre, d’un garage ou d’un parking', 'is_correct' => true],
                ],
            ],
            // Question n°318 (J'ai sauté les numéros manquants car ils n'étaient pas fournis)
            [
                'question_text' => 'A quoi peut-on s’attendre lors d’un croisement ou dépassement d’un véhicule à deux roues ?',
                'answers' => [
                    ['answer_text' => 'non-respect des signaux', 'is_correct' => true],
                    ['answer_text' => 'non-respect des règles de priorité', 'is_correct' => true],
                    ['answer_text' => 'des écarts sans avertir, sans contrôler', 'is_correct' => true],
                ],
            ],
        ];

        // Je commence à 258 et j'incrémente. Je ferai un saut pour Q318
        $currentQuestionOrder = 258;
        foreach ($questionsData as $data) {
            // Pour la question 318, je force l'ordre si la question_text correspond
            if ($data['question_text'] == 'A quoi peut-on s’attendre lors d’un croisement ou dépassement d’un véhicule à deux roues ?') {
                $currentQuestionOrder = 318;
            }

            $question = Question::create([
                'quiz_id' => $quizId,
                'question_text' => $data['question_text'],
                'order' => $currentQuestionOrder,
                'image' => (strpos($data['question_text'], 'Sur cette image') !== false) ? 'D' . ($currentQuestionOrder - 278) . '.jpg' : null, // Tentative pour l'image
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
            
            // On incrémente normalement, sauf si on était sur 318 (pour éviter de passer à 319)
            if ($currentQuestionOrder < 318) {
                $currentQuestionOrder++;
            }
        }
    }
}