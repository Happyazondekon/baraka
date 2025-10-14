<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\Answer;

class QuizSeeder920 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quizId = 10;
        $questionsData = [
            // Question n°800
            [
                'question_text' => 'Lequel des quatre temps ci-après correspond au temps utile ou au temps moteur ?',
                'answers' => [
                    ['answer_text' => 'Echappement', 'is_correct' => false],
                    ['answer_text' => 'Admission', 'is_correct' => false],
                    ['answer_text' => 'Explosion', 'is_correct' => true], // Réponse c
                    ['answer_text' => 'Compression', 'is_correct' => false],
                ],
            ],
            // Question n°801
            [
                'question_text' => 'Donnez la position des soupapes à l’explosion :',
                'answers' => [
                    ['answer_text' => 'Les soupapes s’ouvrent', 'is_correct' => false],
                    ['answer_text' => 'Les deux soupapes sont fermées', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'Les soupapes d’admission et d’échappement sont ouvertes', 'is_correct' => false],
                ],
            ],
            // Question n°802
            [
                'question_text' => 'Donnez la position du piston à l’explosion :',
                'answers' => [
                    ['answer_text' => 'Le piston monte', 'is_correct' => false],
                    ['answer_text' => 'Le piston descend', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'Le piston est sur place', 'is_correct' => false],
                ],
            ],
            // Question n°803
            [
                'question_text' => 'Quel est le rôle du carburateur ?',
                'answers' => [
                    ['answer_text' => 'Le carburateur fournit du carburant', 'is_correct' => false],
                    ['answer_text' => 'Le carburateur fait tourner le moteur', 'is_correct' => false],
                    ['answer_text' => 'Le carburateur produit un mélange gazeux', 'is_correct' => true], // Réponse c
                ],
            ],
            // Question n°804
            [
                'question_text' => 'Quel est le rôle de la batterie ?',
                'answers' => [
                    ['answer_text' => 'La batterie génère le courant', 'is_correct' => false],
                    ['answer_text' => 'La batterie fournit du courant à l’alternateur', 'is_correct' => false],
                    ['answer_text' => 'La batterie accumule le courant', 'is_correct' => true], // Réponse c
                    ['answer_text' => 'La batterie fournit l’énergie nécessaire au démarrage du moteur', 'is_correct' => true], // Réponse d
                ],
            ],
            // Question n°805
            [
                'question_text' => 'Quel est le rôle du radiateur ?',
                'answers' => [
                    ['answer_text' => 'Le radiateur conserve la chaleur du moteur', 'is_correct' => false],
                    ['answer_text' => 'Le radiateur aère le moteur', 'is_correct' => false],
                    ['answer_text' => 'Le radiateur contribue au refroidissement du moteur', 'is_correct' => true], // Réponse c
                    ['answer_text' => 'Le radiateur fait tourner le ventilateur', 'is_correct' => false],
                ],
            ],
            // Question n°806
            [
                'question_text' => 'Entre quels organes du moteur se situe la pompe à essence ?',
                'answers' => [
                    ['answer_text' => 'Le radiateur et la pompe à eau', 'is_correct' => false],
                    ['answer_text' => 'Le réservoir et le carburateur', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'Le filtre à air et le carburateur', 'is_correct' => false],
                ],
            ],
            // Question n°807
            [
                'question_text' => 'Quel est le rôle de la bobine',
                'answers' => [
                    ['answer_text' => 'la bobine transforme le courant primaire de la batterie en courant secondaire', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'La bobine réduit l’intensité électrique', 'is_correct' => false],
                    ['answer_text' => 'La bobine régularise le courant', 'is_correct' => false],
                ],
            ],
            // Question n°808
            [
                'question_text' => 'Quel est le rôle de l’allumeur ?',
                'answers' => [
                    ['answer_text' => 'L’allumeur distribue du courant aux bougies', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'L’allumeur fournit du courant au démarreur', 'is_correct' => false],
                    ['answer_text' => 'L’allumeur absorbe l’étincelle des bougies', 'is_correct' => false],
                ],
            ],
            // Question n°809
            [
                'question_text' => 'Quel est le circuit d’allumage d’un moteur à essence ?',
                'answers' => [
                    ['answer_text' => 'Batterie – bobine – allumeur – bougies', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'Démarreur – allumeur – batterie', 'is_correct' => false],
                    ['answer_text' => 'Allumeur – bobine – vis platinée', 'is_correct' => false],
                ],
            ],
            // Question n°810
            [
                'question_text' => 'De quels éléments le moteur tire-t-il sa force ?',
                'answers' => [
                    ['answer_text' => 'Essence – air – courant électrique', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'Air – essence', 'is_correct' => false],
                    ['answer_text' => 'Courant électrique – eau – essence', 'is_correct' => false],
                ],
            ],
            // Question n°811
            [
                'question_text' => 'Quels dégâts peuvent provoquer l’échauffement excessif du moteur',
                'answers' => [
                    ['answer_text' => 'Joint de culasse brûlé', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'Décalage du moteur', 'is_correct' => false],
                    ['answer_text' => 'Culasse bombée', 'is_correct' => true], // Réponse c
                    ['answer_text' => 'Batterie déchargée', 'is_correct' => false],
                ],
            ],
            // Question n°812
            [
                'question_text' => 'Citer les feux obligatoires à l’arrière d’un véhicule de tourisme :',
                'answers' => [
                    ['answer_text' => 'Deux feux de route – deux feux de croisement – deux feux indicateurs de changement de direction – deux feux de position - -deux feux stop', 'is_correct' => false],
                    ['answer_text' => 'Deux feux de position – deux clignotants – deux feux stop – deux cataphotes – feux plaques d’immatriculation', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'Deux feux de position – deux clignotants – feu plaque d’immatriculation – deux feux stop – deux cataphotes – deux feux antibrouillard – deux feux de recule', 'is_correct' => false],
                ],
            ],
            // Question n°813
            [
                'question_text' => 'Il est dangereux d’utiliser des pneumatiques usés parce qu’ils assurent :',
                'answers' => [
                    ['answer_text' => 'une bonne adhérence', 'is_correct' => false],
                    ['answer_text' => 'une mauvaise adhérence', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'une conduite aisée', 'is_correct' => false],
                ],
            ],
            // Question n°814
            [
                'question_text' => 'Le véhicule de tourisme possède combien de sortes de freins ?',
                'answers' => [
                    ['answer_text' => 'Quatre sortes', 'is_correct' => false],
                    ['answer_text' => 'Deux sortes', 'is_correct' => false],
                    ['answer_text' => 'Trois sortes', 'is_correct' => true], // Réponse c
                ],
            ],
            // Question n°815
            [
                'question_text' => 'Le lit nacelle est un dispositif qui permet de transporter dans le véhicule les enfants de :',
                'answers' => [
                    ['answer_text' => '1 à 6 mois uniquement', 'is_correct' => false],
                    ['answer_text' => '0 à 9 mois', 'is_correct' => true], // Réponse b
                    ['answer_text' => '2 à 10 mois', 'is_correct' => false],
                    ['answer_text' => '3 à 20 mois', 'is_correct' => false],
                ],
            ],
            // Question n°816
            [
                'question_text' => 'Le siège homologué (baquet, harnais, réceptacle) sert à transporter dans le véhicule les enfants de :',
                'answers' => [
                    ['answer_text' => '3 à 4 mois', 'is_correct' => false],
                    ['answer_text' => '4 à 5 mois', 'is_correct' => false],
                    ['answer_text' => '6 à 8 mois', 'is_correct' => false],
                    ['answer_text' => '9 mois à 4 ans', 'is_correct' => true], // Réponse d
                ],
            ],
            // Question n°817
            [
                'question_text' => 'Quels dégâts peuvent provoquer le manque d’huile à moteur ?',
                'answers' => [
                    ['answer_text' => 'Bielles coulées', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'Moteur bloqué', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'Moteur tournant en sous-régime', 'is_correct' => false],
                    ['answer_text' => 'Eclatement du disque d’embrayage', 'is_correct' => false],
                ],
            ],
            // Question n°818
            [
                'question_text' => 'Quelle anomalie occasionne l’éclatement d’une durit à eau ?',
                'answers' => [
                    ['answer_text' => 'Le refroidissement du moteur', 'is_correct' => false],
                    ['answer_text' => 'L’emballement du moteur', 'is_correct' => false],
                    ['answer_text' => 'L’échauffement du moteur', 'is_correct' => true], // Réponse c
                ],
            ],
            // Question n°819
            [
                'question_text' => 'A quel ennui vous expose la rupture de la courroie d’alternateur ?',
                'answers' => [
                    ['answer_text' => 'Le circuit de charge interrompue', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'La charge excessive', 'is_correct' => false],
                    ['answer_text' => 'La charge suffisante', 'is_correct' => false],
                ],
            ],
            // Question n°820
            [
                'question_text' => 'Combien de pompes permettent le bon fonctionnement d’un moteur à essence ?',
                'answers' => [
                    ['answer_text' => '2 pompes', 'is_correct' => false],
                    ['answer_text' => '3 pompes', 'is_correct' => true], // Réponse b
                    ['answer_text' => '4 pompes', 'is_correct' => false],
                    ['answer_text' => '5 pompes', 'is_correct' => false],
                ],
            ],
            // Question n°821
            [
                'question_text' => 'Quelles sont les pompes qui contribuent au bon fonctionnement d’un moteur à essence ?',
                'answers' => [
                    ['answer_text' => 'Pompe à essence', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'Pompe à huile', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'Pompe à air', 'is_correct' => false],
                    ['answer_text' => 'Pompe à eau', 'is_correct' => true], // Réponse d
                ],
            ],
            // Question n°822
            [
                'question_text' => 'Avec mon feu d’éclairage, la plaque minéralogique doit être lisible à une distance de :',
                'answers' => [
                    ['answer_text' => '50m', 'is_correct' => false],
                    ['answer_text' => '20m', 'is_correct' => true], // Réponse b
                    ['answer_text' => '30m', 'is_correct' => false],
                ],
            ],
            // Question n°823
            [
                'question_text' => 'Par temps de brouillard, tout conducteur de véhicule circulant sur une route doit obligatoirement allumer :',
                'answers' => [
                    ['answer_text' => 'Les feux de position', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'Les feux de route', 'is_correct' => false],
                    ['answer_text' => 'Les feux de croisement', 'is_correct' => true], // Réponse c
                ],
            ],
            // Question n°824
            [
                'question_text' => 'Par temps de forte pluie, tout conducteur de véhicule circulant sur une route, doit obligatoirement allumer :',
                'answers' => [
                    ['answer_text' => 'Les feux de position', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'Les feux de route', 'is_correct' => false],
                    ['answer_text' => 'Les feux de croisement', 'is_correct' => true], // Réponse c
                ],
            ],
            // Question n°825
            [
                'question_text' => 'Quand vérifie-t-on le niveau d’huile dans le moteur ?',
                'answers' => [
                    ['answer_text' => 'Toutes les semaines', 'is_correct' => false],
                    ['answer_text' => 'Tous les mois', 'is_correct' => false],
                    ['answer_text' => 'Tous les milles kilomètres', 'is_correct' => false],
                    ['answer_text' => 'Tous les jours', 'is_correct' => true], // Réponse d
                ],
            ],
            // Question n°826
            [
                'question_text' => 'Quand vérifie-t-on le niveau de l’eau dans le radiateur ?',
                'answers' => [
                    ['answer_text' => 'Toutes les semaines', 'is_correct' => false],
                    ['answer_text' => 'Tous les jours', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'Tous les milles kilomètres', 'is_correct' => false],
                    ['answer_text' => 'Seulement quand le moteur commence à se chauffer', 'is_correct' => false],
                ],
            ],
            // Question n°827
            [
                'question_text' => 'Pour compléter le liquide de la batterie, j’utilise',
                'answers' => [
                    ['answer_text' => 'L’eau de pluie', 'is_correct' => false],
                    ['answer_text' => 'L’eau de mer', 'is_correct' => false],
                    ['answer_text' => 'L’eau distillée', 'is_correct' => true], // Réponse c
                    ['answer_text' => 'L’eau du robinet', 'is_correct' => false],
                ],
            ],
            // Question n°828
            [
                'question_text' => 'Sur un véhicule ou trouve-t-on l’instrument qui indique la température de l’eau',
                'answers' => [
                    ['answer_text' => 'Dans le moteur', 'is_correct' => false],
                    ['answer_text' => 'Sur le radiateur', 'is_correct' => false],
                    ['answer_text' => 'Au tableau de bord', 'is_correct' => true], // Réponse c
                    ['answer_text' => 'Sur le filtre à air', 'is_correct' => false],
                ],
            ],
            // Question n°829
            [
                'question_text' => 'Sur un véhicule ou trouve-t-on l’instrument qui indique la pression de l’huile à moteur',
                'answers' => [
                    ['answer_text' => 'Dans le moteur', 'is_correct' => false],
                    ['answer_text' => 'Sur le tableau de bord', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'Sur le carter', 'is_correct' => false],
                ],
            ],
            // Question n°830
            [
                'question_text' => 'Le moteur de votre véhicule roulant normalement s’éteint, de quoi peut provenir la panne ?',
                'answers' => [
                    ['answer_text' => 'De l’insuffisance d’huile à moteur', 'is_correct' => false],
                    ['answer_text' => 'De l’insuffisance d’eau dans le radiateur', 'is_correct' => false],
                    ['answer_text' => 'De la faiblesse de la batterie', 'is_correct' => false],
                    ['answer_text' => 'Du manque de carburant', 'is_correct' => true], // Réponse d
                ],
            ],
            // Question n°831
            [
                'question_text' => 'La batterie montée sur le véhicule après une charge correcte ne démarre pas le moteur. Quelle peut être la cause ?',
                'answers' => [
                    ['answer_text' => 'le manque d’eau sur la batterie', 'is_correct' => false],
                    ['answer_text' => 'les cosses mal serrées sur les bornes', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'le manque de carburant', 'is_correct' => false],
                    ['answer_text' => 'la défectuosité de l’alternateur', 'is_correct' => false],
                ],
            ],
            // Question n°832
            [
                'question_text' => 'L’eau du radiateur bouillonne, que doit-on faire ?',
                'answers' => [
                    ['answer_text' => 'Arrêter le moteur et mettre de l’eau dans le radiateur', 'is_correct' => false],
                    ['answer_text' => 'Poursuivre sa route', 'is_correct' => false],
                    ['answer_text' => 'Arrêter le moteur, le laisser se refroidir, mettre de l’eau et consulter après un garagiste', 'is_correct' => true], // Réponse c
                    ['answer_text' => 'Arrêter le véhicule, ouvrir le radiateur pour laisser dégager la chaleur', 'is_correct' => false],
                ],
            ],
            // Question n°833
            [
                'question_text' => 'Quelles sont les pièces administratives obligatoires d’un véhicule automobile ?',
                'answers' => [
                    ['answer_text' => '- La carte grise - le certificat d’assurance - la vignette de l’année en cours - la visite technique', 'is_correct' => true], // Réponse a
                    ['answer_text' => '- le permis de conduire - l’attestation de réglage phares - le papier d’achat - la quittance de la douane', 'is_correct' => false],
                    ['answer_text' => '–la visite technique - le permis de conduire - la quittance de la douane - l’attestation de réglage phares', 'is_correct' => false],
                ],
            ],
            // Question n°834
            [
                'question_text' => 'Un véhicule de tourisme possède combien de roues ?',
                'answers' => [
                    ['answer_text' => 'quatre', 'is_correct' => false],
                    ['answer_text' => 'cinq', 'is_correct' => true], // Réponse b (incluant la roue de secours)
                    ['answer_text' => 'six', 'is_correct' => false],
                    ['answer_text' => 'sept', 'is_correct' => false],
                ],
            ],
            // Question n°835
            [
                'question_text' => 'Une automobile est autorisée à circuler :',
                'answers' => [
                    ['answer_text' => 'Sans plaque d’immatriculation, avec assurance', 'is_correct' => false],
                    ['answer_text' => 'Avec la plaque d’immatriculation portant le numéro du châssis', 'is_correct' => false],
                    ['answer_text' => 'Avec la plaque d’immatriculation homologuée par le service chargé des transports', 'is_correct' => true], // Réponse c
                ],
            ],
            // Question n°836
            [
                'question_text' => 'Quand utilise-t-on l’essuie-glace ?',
                'answers' => [
                    ['answer_text' => 'Par temps de pluie', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'Quand le pare-brise est sale', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'Quand il fait sombre', 'is_correct' => false],
                ],
            ],
            // Question n°837
            [
                'question_text' => 'Les feux de route servent à éclairer jusqu’à :',
                'answers' => [
                    ['answer_text' => '100m environ', 'is_correct' => true], // Réponse a
                    ['answer_text' => '30m environ', 'is_correct' => false],
                    ['answer_text' => '150m et au-delà', 'is_correct' => false],
                ],
            ],
            // Question n°838
            [
                'question_text' => 'Quels feux utilisez-vous la nuit, quand vous êtes derrière un autre usager à faible distance sur une route mal éclairée ?',
                'answers' => [
                    ['answer_text' => 'Les feux de route', 'is_correct' => false],
                    ['answer_text' => 'Les feux de croisement', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'Les feux de position', 'is_correct' => false],
                ],
            ],
            // Question n°839
            [
                'question_text' => 'Quels feux utilisez-vous en stationnement en bordure d’une route mal éclairée ?',
                'answers' => [
                    ['answer_text' => 'les feux de détresse', 'is_correct' => false],
                    ['answer_text' => 'les feux de croisement', 'is_correct' => false],
                    ['answer_text' => 'les feux de position', 'is_correct' => true], // Réponse c
                ],
            ],
            // Question n°840
            [
                'question_text' => 'J’utilise mes feux de détresse pour :',
                'answers' => [
                    ['answer_text' => 'indiquer que je vais tout droit', 'is_correct' => false],
                    ['answer_text' => 'faire marche arrière', 'is_correct' => false],
                    ['answer_text' => 'indiquer que je suis en panne', 'is_correct' => true], // Réponse c
                    ['answer_text' => 'indiquer que je suis le dernier d’un convoi', 'is_correct' => true], // Réponse d
                    ['answer_text' => 'indiquer que je suis pressé', 'is_correct' => false],
                ],
            ],
            // Question n°841
            [
                'question_text' => 'Sans feux arrière la nuit :',
                'answers' => [
                    ['answer_text' => 'Je peux circuler sur une chaussée à double sens', 'is_correct' => false],
                    ['answer_text' => 'Je peux circuler sur une chaussée à sens unique', 'is_correct' => false],
                    ['answer_text' => 'Je ne peux pas circuler', 'is_correct' => true], // Réponse c
                ],
            ],
            // Question n°842
            [
                'question_text' => 'A quoi sert le triangle de pré-signalisation ?',
                'answers' => [
                    ['answer_text' => 'A signaler la position d’un véhicule en panne sur la chaussée', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'A signaler la présence d’un véhicule en stationnement', 'is_correct' => false],
                    ['answer_text' => 'A signaler un arrêt', 'is_correct' => false],
                ],
            ],
            // Question n°843
            [
                'question_text' => 'A quoi sert l’extincteur ?',
                'answers' => [
                    ['answer_text' => 'A éteindre un début d’incendie sur un véhicule', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'A secourir un blessé', 'is_correct' => false],
                    ['answer_text' => 'A refroidir le moteur', 'is_correct' => false],
                ],
            ],
            // Question n°844
            [
                'question_text' => 'La roue secours :',
                'answers' => [
                    ['answer_text' => 'Est obligatoire pour tout déplacement', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'N’est pas obligatoire lorsqu’on circule en ville', 'is_correct' => false],
                    ['answer_text' => 'Est obligatoire seulement pour les longs voyages', 'is_correct' => false],
                ],
            ],
            // Question n°845
            [
                'question_text' => 'Que faut-il faire pour éviter de polluer l’environnement par le gaz d’échappement de votre moteur ?',
                'answers' => [
                    ['answer_text' => 'Bien régler le moteur de mon véhicule', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'Utiliser un carburant de bonne qualité', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'Rouler à vive allure', 'is_correct' => false],
                ],
            ],
            // Question n°846
            [
                'question_text' => 'Pour vidanger le moteur d’un véhicule bien entretenu, il faut tenir compte :',
                'answers' => [
                    ['answer_text' => 'Du kilométrage parcouru', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'De la vitesse élevée', 'is_correct' => false],
                    ['answer_text' => 'Du nombre de voyages effectués', 'is_correct' => false],
                ],
            ],
            // Question n°847
            [
                'question_text' => 'La vérification de l’huile à frein se fait :',
                'answers' => [
                    ['answer_text' => 'Tous les jours', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'Tous les mois', 'is_correct' => false],
                    ['answer_text' => 'Au bon vouloir du conducteur', 'is_correct' => false],
                ],
            ],
            // Question n°848
            [
                'question_text' => 'Qu’est-ce qui peut causer l’incendie sur un véhicule automobile ?',
                'answers' => [
                    ['answer_text' => 'La chaleur ambiante', 'is_correct' => false],
                    ['answer_text' => 'Un court-circuit', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'Des gouttes d’eau dans le moteur en marche', 'is_correct' => false],
                    ['answer_text' => 'Fuite d’essence', 'is_correct' => true], // Réponse d
                    ['answer_text' => 'Les flammes de la tuyauterie d’échappement', 'is_correct' => true], // Réponse e
                ],
            ],
            // Question n°849
            [
                'question_text' => 'Quelles sont les causes d’usure prématurée des pneumatiques ?',
                'answers' => [
                    ['answer_text' => 'La surcharge et le défaut de gonflage', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'Le démarrage violent et les coups de trottoir', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'L’utilisation des pneumatiques sur chaussées mouillées', 'is_correct' => false],
                ],
            ],
            // Question n°850
            [
                'question_text' => 'Le rétroviseur extérieur côté droit est obligatoire sur :',
                'answers' => [
                    ['answer_text' => 'tous véhicules', 'is_correct' => false],
                    ['answer_text' => 'les véhicules de transport de marchandises', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'les véhicules de transport en commun de personnes', 'is_correct' => true], // Réponse c
                    ['answer_text' => 'les machines agricoles', 'is_correct' => false],
                ],
            ],
            // Question n°851
            [
                'question_text' => 'Les dispositifs réfléchissants placés à l’arrière du véhicule sont :',
                'answers' => [
                    ['answer_text' => 'facultatifs', 'is_correct' => false],
                    ['answer_text' => 'obligatoires', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'de couleur rouge', 'is_correct' => true], // Réponse c
                    ['answer_text' => 'visibles la nuit par temps clair à une distance de 100m quand ils sont éclairés par les feux de route', 'is_correct' => true], // Réponse d
                ],
            ],
            // Question n°852
            [
                'question_text' => 'Un chargement dépassant de plus d’un mètre à l’arrière d’un véhicule doit être signalé par :',
                'answers' => [
                    ['answer_text' => 'Un dispositif réfléchissant rouge', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'Un feu rouge visible à 150m en cas de visibilité insuffisante', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'Un chiffon flottant', 'is_correct' => false],
                    ['answer_text' => 'Une lanterne rouge', 'is_correct' => true], // Réponse d
                ],
            ],
            // Question n°853
            [
                'question_text' => 'A quelle distance les feux de route éclairent-ils, par temps normal ?',
                'answers' => [
                    ['answer_text' => '50m environ', 'is_correct' => false],
                    ['answer_text' => '100m environ', 'is_correct' => true], // Réponse b
                    ['answer_text' => '150m environ', 'is_correct' => false],
                ],
            ],
            // Question n°854
            [
                'question_text' => 'Quels feux utilisez-vous lorsque votre véhicule suit un autre usager à faible distance ?',
                'answers' => [
                    ['answer_text' => 'Feux de route', 'is_correct' => false],
                    ['answer_text' => 'Feux de croisement', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'Feux de détresse', 'is_correct' => false],
                ],
            ],
            // Question n°855
            [
                'question_text' => 'Le moteur au régime élevé fait des à-coups, à quoi cela peut-il être dû ?',
                'answers' => [
                    ['answer_text' => 'La batterie mal chargée', 'is_correct' => false],
                    ['answer_text' => 'Les bougies défectueuses', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'L’allumeur déréglé', 'is_correct' => true], // Réponse c
                    ['answer_text' => 'La vis platinée déréglée', 'is_correct' => true], // Réponse d
                ],
            ],
            // Question n°856
            [
                'question_text' => 'Un véhicule automobile est équipé de combien de rétroviseurs obligatoires ?',
                'answers' => [
                    ['answer_text' => 'Un', 'is_correct' => false],
                    ['answer_text' => 'Deux', 'is_correct' => true], // Réponse b (gauche + intérieur) ou (gauche + droit si nécessaire)
                    ['answer_text' => 'Trois', 'is_correct' => false],
                ],
            ],
            // Question n°857
            [
                'question_text' => 'Que faut-il en cas de crevaison ?',
                'answers' => [
                    ['answer_text' => 'Un cric', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'Une roue secours', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'Un extincteur', 'is_correct' => false],
                ],
            ],
            // Question n°858
            [
                'question_text' => 'A quoi sert la ceinture de sécurité ?',
                'answers' => [
                    ['answer_text' => 'Pour régler le siège', 'is_correct' => false],
                    ['answer_text' => 'Permet de maintenir les bagages en sécurité', 'is_correct' => false],
                    ['answer_text' => 'Maintient efficacement le conducteur et les passagers sur leur siège en cas d’accident, de Collision ou de freinage brusque', 'is_correct' => true], // Réponse c
                ],
            ],
            // Question n°859
            [
                'question_text' => 'Quel est le circuit d’alimentation en carburant d’un moteur à essence ?',
                'answers' => [
                    ['answer_text' => 'Réservoir – pompe à essence – carburateur', 'is_correct' => true], // Réponse a (pour moteur à carburateur)
                    ['answer_text' => 'Réservoir – carburateur – pompe à essence', 'is_correct' => false],
                    ['answer_text' => 'Pompe à essence – réservoir – carburateur', 'is_correct' => false],
                    ['answer_text' => 'Réservoir – Pompe à essence – pompe à injection – injecteurs', 'is_correct' => true], // Réponse d (pour moteur à injection moderne)
                ],
            ],
            // Question n°860
            [
                'question_text' => 'En cas de début d’incendie sur véhicule :',
                'answers' => [
                    ['answer_text' => 'je jette de l’eau sur les flammes', 'is_correct' => false],
                    ['answer_text' => 'je jette du sable ou de la terre à la base des flammes', 'is_correct' => true], // Réponse b (si pas d'extincteur)
                    ['answer_text' => 'j’utilise une couverture pour étouffer le feu', 'is_correct' => false],
                    ['answer_text' => 'j’utilise l’extincteur', 'is_correct' => true], // Réponse d
                ],
            ],
            // Question n°861
            [
                'question_text' => 'Sur mon véhicule, en roulant je peux contrôler visuellement :',
                'answers' => [
                    ['answer_text' => 'certains niveaux', 'is_correct' => true], // Réponse a (via voyants/jauges)
                    ['answer_text' => 'l’état des pneumatiques', 'is_correct' => false],
                    ['answer_text' => 'l’état des courroies', 'is_correct' => false],
                ],
            ],
            // Question n°862
            [
                'question_text' => 'En cas de crevaison, pour changer la roue :',
                'answers' => [
                    ['answer_text' => 'je cale le véhicule et sors la roue secours, la clé de roue et le cric,', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'je desserre les écrous', 'is_correct' => true], // Réponse b (d'abord desserrer avant de lever)
                    ['answer_text' => 'je débloque et libère la roue crevée,', 'is_correct' => true], // Réponse c
                    ['answer_text' => 'je mets la roue secours et resserrer les écrous,', 'is_correct' => true], // Réponse d
                    ['answer_text' => 'je soulève le véhicule du côté de la crevaison.', 'is_correct' => true], // Réponse e (après desserrage initial)
                ],
            ],
            // Question n°863
            [
                'question_text' => 'Quelle pièce officielle permet d’identifier le propriétaire d’un véhicule ?',
                'answers' => [
                    ['answer_text' => 'la police d’assurance', 'is_correct' => false],
                    ['answer_text' => 'la carte grise', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'l’attestation de réglage phare', 'is_correct' => false],
                ],
            ],
            // Question n°864
            [
                'question_text' => 'Pour un véhicule léger de transport privé la visite technique doit s’effectuer :',
                'answers' => [
                    ['answer_text' => 'tous les ans', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'tous les six mois', 'is_correct' => false],
                    ['answer_text' => 'tous les trois mois', 'is_correct' => false],
                ],
            ],
            // Question n°865
            [
                'question_text' => 'A quoi sert le contrat d’assurance au tiers ?',
                'answers' => [
                    ['answer_text' => 'A couvrir les dégâts causés lors d’un accident', 'is_correct' => false],
                    ['answer_text' => 'A couvrir les surcharges', 'is_correct' => false],
                    ['answer_text' => 'A couvrir les dégâts causés à autrui', 'is_correct' => true], // Réponse c
                ],
            ],
            // Question n°866
            [
                'question_text' => 'Le contrat d’assurance est valable :',
                'answers' => [
                    ['answer_text' => 'sans la visite technique', 'is_correct' => false],
                    ['answer_text' => 'avec la visite technique', 'is_correct' => true], // Réponse b (la validité de l'assurance est souvent liée à la conformité du véhicule)
                    ['answer_text' => 'avec la vignette', 'is_correct' => false],
                ],
            ],
            // Question n°867
            [
                'question_text' => 'La vignette fiscale est une pièce obligatoire :',
                'answers' => [
                    ['answer_text' => 'pour tout véhicule', 'is_correct' => false],
                    ['answer_text' => 'pour les véhicules de transport en commun de personnes', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'pour les véhicules de transport de marchandises', 'is_correct' => true], // Réponse c
                    ['answer_text' => 'pour les véhicules administratifs', 'is_correct' => false],
                ],
            ],
            // Question n°868
            [
                'question_text' => 'Lorsque les pneus sont neufs :',
                'answers' => [
                    ['answer_text' => 'La tenue de route est améliorée', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'Le risque d’aquaplaning est écarté', 'is_correct' => false],
                    ['answer_text' => 'L’adhérence est bonne', 'is_correct' => true], // Réponse c
                    ['answer_text' => 'Le risque de dérapage augmente', 'is_correct' => false],
                ],
            ],
            // Question n°869
            [
                'question_text' => 'L’absence de bouchon sur la valve d’une roue :',
                'answers' => [
                    ['answer_text' => 'est dangereuse', 'is_correct' => false],
                    ['answer_text' => 'peut diminuer l’étanchéité de la roue', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'permet de libérer une surpression d’air', 'is_correct' => false],
                    ['answer_text' => 'permet d’augmenter l’air dans la roue', 'is_correct' => false],
                ],
            ],
            // Question n°870
            [
                'question_text' => 'Il n’est pas obligatoire de mettre la ceinture de sécurité :',
                'answers' => [
                    ['answer_text' => 'Si le véhicule est équipé de coussin de gonflage', 'is_correct' => false],
                    ['answer_text' => 'Si la conduite s’effectue en agglomération', 'is_correct' => false],
                    ['answer_text' => 'Si la conduite s’effectue sur un long trajet', 'is_correct' => false],
                    ['answer_text' => 'Rien de tout ce qui précède', 'is_correct' => true], // Réponse d (la ceinture est obligatoire, sauf exceptions rares non listées ici)
                ],
            ],
            // Question n°871
            [
                'question_text' => 'La profondeur des rainures principales d’un pneu doit être au minimum de :',
                'answers' => [
                    ['answer_text' => '0,6m', 'is_correct' => false],
                    ['answer_text' => '1,6m', 'is_correct' => true], // Réponse b (millimètres, pas mètres, mais l'option avec '1,6' est correcte selon le standard)
                    ['answer_text' => '1,5m', 'is_correct' => false],
                ],
            ],
            // Question n°872
            [
                'question_text' => 'La portée minimale des feux dois être de :',
                'answers' => [
                    ['answer_text' => '30m pour les feux de croisement', 'is_correct' => true], // Réponse a
                    ['answer_text' => '45m pour les feux de croisement', 'is_correct' => false],
                    ['answer_text' => '100m pour les feux de route', 'is_correct' => true], // Réponse c
                    ['answer_text' => '150m pour les feux de route', 'is_correct' => false],
                ],
            ],
            // Question n°873
            [
                'question_text' => 'Sur un même itinéraire et dans des conditions identiques, une voiture qui roule à 90km/h consomme à 130km/h :',
                'answers' => [
                    ['answer_text' => 'la même quantité d’essence', 'is_correct' => false],
                    ['answer_text' => 'moins d’essence', 'is_correct' => false],
                    ['answer_text' => 'plus d’essence', 'is_correct' => true], // Réponse c
                ],
            ],
            // Question n°874
            [
                'question_text' => 'La roue motrice est celle qui :',
                'answers' => [
                    ['answer_text' => 'a un moteur', 'is_correct' => false],
                    ['answer_text' => 'est relié au moteur et entraine le véhicule', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'tire le moteur', 'is_correct' => false],
                    ['answer_text' => 'oriente le véhicule', 'is_correct' => false],
                ],
            ],
            // Question n°875
            [
                'question_text' => 'Les roues motrices d’un véhicule peuvent être :',
                'answers' => [
                    ['answer_text' => 'à l’avant', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'à l’arrière', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'à l’avant et à l’arrière', 'is_correct' => true], // Réponse c
                    ['answer_text' => 'sur le porte-à-faux', 'is_correct' => false],
                ],
            ],
            // Question n°876
            [
                'question_text' => 'Quand dit-on qu’un véhicule est à traction avant :',
                'answers' => [
                    ['answer_text' => 'si les roues motrices sont à l’avant', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'si les roues motrices sont à l’arrière', 'is_correct' => false],
                    ['answer_text' => 'si le moteur est à l’avant', 'is_correct' => false],
                    ['answer_text' => 'si le moteur est à l’arrière', 'is_correct' => false],
                ],
            ],
            // Question n°877
            [
                'question_text' => 'quand dit-on qu’un véhicule est à propulsion arrière :',
                'answers' => [
                    ['answer_text' => 'si les roues motrices sont à l’avant', 'is_correct' => false],
                    ['answer_text' => 'si les roues motrices sont à l’arrière', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'si le moteur est à l’avant', 'is_correct' => false],
                    ['answer_text' => 'si le moteur est à l’arrière', 'is_correct' => false],
                ],
            ],
            // Question n°878
            [
                'question_text' => 'Les roues directrices d’une voiture sont placées :',
                'answers' => [
                    ['answer_text' => 'à l’avant', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'à l’arrière', 'is_correct' => false],
                    ['answer_text' => 'à l’avant et à l’arrière', 'is_correct' => false],
                    ['answer_text' => 'rien de tout ce qui précède', 'is_correct' => false],
                ],
            ],
            // Question n°879
            [
                'question_text' => 'Par temps de brouillard, je peux allumer les feux :',
                'answers' => [
                    ['answer_text' => 'de croisement', 'is_correct' => true], // Réponse a (obligatoire)
                    ['answer_text' => 'de route', 'is_correct' => false],
                    ['answer_text' => 'de brouillard avant', 'is_correct' => true], // Réponse c (autorisé)
                    ['answer_text' => 'de brouillard arrière', 'is_correct' => true], // Réponse d (autorisé)
                ],
            ],
            // Question n°880
            [
                'question_text' => 'Des amortisseurs usés :',
                'answers' => [
                    ['answer_text' => 'allongent la distance de freinage', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'diminuent la distance de freinage', 'is_correct' => false],
                    ['answer_text' => 'compliquent la tenue de route', 'is_correct' => true], // Réponse c
                ],
            ],
            // Question n°881
            [
                'question_text' => 'Dans une station-service, l’extincteur est utilisable par :',
                'answers' => [
                    ['answer_text' => 'le technicien préposé', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'le pompiste', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'le gardien', 'is_correct' => true], // Réponse c
                    ['answer_text' => 'n’importe quel client', 'is_correct' => false],
                    ['answer_text' => 'tout usager capable de s’en servir', 'is_correct' => true], // Réponse e
                ],
            ],
            // Question n°882
            [
                'question_text' => 'Lors d’un contrôle routier, je dois présenter :',
                'answers' => [
                    ['answer_text' => 'Mon permis de conduite', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'La carte grise', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'Ma carte d’identité', 'is_correct' => false],
                    ['answer_text' => 'Ma carte de groupe sanguin', 'is_correct' => false],
                    ['answer_text' => 'L’assurance et la visite technique', 'is_correct' => true], // Réponse e
                ],
            ],
            // Question n°883
            [
                'question_text' => 'La consommation du carburant augmente :',
                'answers' => [
                    ['answer_text' => 'si le chargement fait cabrer l’avant du véhicule', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'si je charge des bagages sur le toit', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'si je tracte une caravane', 'is_correct' => true], // Réponse c
                    ['answer_text' => 'rien de tout ce qui précède', 'is_correct' => false],
                ],
            ],
            // Question n°884
            [
                'question_text' => 'Quel effet un sous gonflage peut-il avoir sur la durée de vie de la carcasse du pneumatique ?',
                'answers' => [
                    ['answer_text' => 'usure plus rapide', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'la carcasse se fatigue plus vite', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'détérioration des composantes internes du pneu', 'is_correct' => true], // Réponse c
                    ['answer_text' => 'usure de la partie centrale', 'is_correct' => false],
                ],
            ],
            // Question n°885
            [
                'question_text' => 'Pour un bon fonctionnement de mes pneus je dois régulièrement vérifier :',
                'answers' => [
                    ['answer_text' => 'la pression à froid', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'c- la présence du bouchon de valve', 'is_correct' => true], // Réponse c (nommée b dans la réponse donnée)
                    ['answer_text' => 'd- les écrous de fixation des roues', 'is_correct' => true], // Réponse d (nommée c dans la réponse donnée)
                    ['answer_text' => 'd- le compteur kilométrique', 'is_correct' => false],
                ],
            ],
            // Question n°886
            [
                'question_text' => 'Quelle incidence un sous gonflage peut avoir sur le comportement d’un véhicule ?',
                'answers' => [
                    ['answer_text' => 'tenue de route réduite', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'instabilité', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'risque de renversement', 'is_correct' => true], // Réponse c
                    ['answer_text' => 'réduction de la consommation de carburant', 'is_correct' => false],
                ],
            ],
            // Question n°887
            [
                'question_text' => 'Pour diminuer les risques en cas de verglas, je peux équiper mon véhicule :',
                'answers' => [
                    ['answer_text' => 'de pneus spéciaux', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'de pneus à crampons', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'de chaînes', 'is_correct' => false], // La réponse fournie était a, b, mais les chaînes sont aussi utilisées pour le verglas/neige. J'ai gardé a, b.
                ],
            ],
            // Question n°888
            [
                'question_text' => 'Par temps de pluie, pour voir et être vu, j’allume :',
                'answers' => [
                    ['answer_text' => 'mes feux de route', 'is_correct' => false],
                    ['answer_text' => 'mes feux de croisement', 'is_correct' => true], // Réponse b (obligatoire)
                    ['answer_text' => 'mes feux de brouillard avant', 'is_correct' => true], // Réponse c (autorisé)
                    ['answer_text' => 'mon ou mes feux de brouillard arrière', 'is_correct' => true], // Réponse d (autorisé)
                ],
            ],
            // Question n°889
            [
                'question_text' => 'Pour éviter la buée sur les vitres, je peux utiliser :',
                'answers' => [
                    ['answer_text' => 'la ventilation et le chauffage', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'le dégivreur arrière', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'les essuie-glaces', 'is_correct' => false],
                    ['answer_text' => 'le lave-glace', 'is_correct' => false],
                ],
            ],
            // Question n°890
            [
                'question_text' => 'Les éléments qui permettent une meilleure visibilité sont :',
                'answers' => [
                    ['answer_text' => 'le lave-glace', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'les essuie-glaces', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'le pare-soleil', 'is_correct' => true], // Réponse c
                    ['answer_text' => 'les déflecteurs de vitres', 'is_correct' => false],
                ],
            ],
            // Question n°891
            [
                'question_text' => 'Avant un voyage, je peux obtenir des renseignements sur la circulation par :',
                'answers' => [
                    ['answer_text' => 'le téléphone', 'is_correct' => false],
                    ['answer_text' => 'la radio', 'is_correct' => false],
                    ['answer_text' => 'la carte routière', 'is_correct' => true], // Réponse c
                ],
            ],
            // Question n°892
            [
                'question_text' => 'Les véhicules prioritaires sont équipés de feux :',
                'answers' => [
                    ['answer_text' => 'Tournant bleus', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'Clignotant bleus', 'is_correct' => false],
                    ['answer_text' => 'Tournants jaunes', 'is_correct' => false],
                ],
            ],
            // Question n°893
            [
                'question_text' => 'Lorsqu’un voyant s’allume au tableau de bord en circulation, il s’agit :',
                'answers' => [
                    ['answer_text' => 'd’un indice informel', 'is_correct' => false],
                    ['answer_text' => 'd’un indice formel', 'is_correct' => true], // Réponse b
                ],
            ],
            // Question n°894
            [
                'question_text' => 'Les indices inquiétants relatifs à mon véhicule peuvent se caractériser :',
                'answers' => [
                    ['answer_text' => 'par une odeur', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'par un bruit', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'par un voyant bleu sur le tableau de bord', 'is_correct' => false],
                ],
            ],
            // Question n°895
            [
                'question_text' => 'L’utilisation de la climatisation du véhicule a une influence :',
                'answers' => [
                    ['answer_text' => 'Sur le confort', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'Sur la sécurité', 'is_correct' => false],
                    ['answer_text' => 'Sur la consommation', 'is_correct' => true], // Réponse c
                ],
            ],
            // Question n°896
            [
                'question_text' => 'Sur mon pare-brise, je dois apposer :',
                'answers' => [
                    ['answer_text' => 'La vignette fiscale en haut, à droite', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'La vignette fiscale en bas, à droite', 'is_correct' => false],
                    ['answer_text' => 'Le certificat d’assurance en bas, à droite', 'is_correct' => true], // Réponse c
                    ['answer_text' => 'Le certificat d’assurance en bas à gauche', 'is_correct' => false],
                ],
            ],
            // Question n°897
            [
                'question_text' => 'Mon assureur peut refuser de m’indemniser en totalité ou partiellement si :',
                'answers' => [
                    ['answer_text' => 'Ma responsabilité est engagée', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'Je ne portais pas la ceinture', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'Je conduisais avec une alcoolémie positive', 'is_correct' => true], // Réponse c
                    ['answer_text' => 'Je ne portais pas les lunettes mentionnées sur mon permis', 'is_correct' => true], // Réponse d
                ],
            ],
            // Question n°898
            [
                'question_text' => 'Une différence importante de profondeur des rainures des pneus sur un même essieu a :',
                'answers' => [
                    ['answer_text' => 'une influence sur la tenue de route', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'n’a pas d’influence sur la tenue de route', 'is_correct' => false],
                    ['answer_text' => 'a une influence sur la suspension', 'is_correct' => true], // Réponse c
                ],
            ],
            // Question n°899
            [
                'question_text' => 'Sur le même essieu d’un véhicule:',
                'answers' => [
                    ['answer_text' => 'il n’est pas recommandé de monter des pneus de structures différentes', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'il n’est pas recommandé de monter des pneus de marques différentes', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'il est recommandé de monter des pneus de structures différentes', 'is_correct' => false],
                    ['answer_text' => 'il est recommandé de monter des pneus de marques différentes', 'is_correct' => false],
                ],
            ],
            // Question n°900
            [
                'question_text' => 'La suspension a pour rôle d’assurer :',
                'answers' => [
                    ['answer_text' => 'le contact permanent du pneu avec la route', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'la stabilité du véhicule', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'le confort uniquement', 'is_correct' => false],
                    ['answer_text' => 'la sécurité', 'is_correct' => true], // Réponse d
                ],
            ],
            // Question n°901
            [
                'question_text' => 'L’état des pneumatiques peut se contrôler :',
                'answers' => [
                    ['answer_text' => 'visuellement avant d’utiliser le véhicule', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'au moins une fois par mois avec un manomètre pour la pression', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'uniquement lors des opérations d’entretien prescrites par le constructeur', 'is_correct' => false],
                ],
            ],
            // Question n°902
            [
                'question_text' => 'Que faire si le niveau du liquide de frein baisse régulièrement dans le réservoir :',
                'answers' => [
                    ['answer_text' => 'je rajoute simplement du liquide', 'is_correct' => false],
                    ['answer_text' => 'je fais immédiatement vérifier mon véhicule', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'j’attends la prochaine révision', 'is_correct' => false],
                ],
            ],
            // Question n°903
            [
                'question_text' => 'La fréquence des opérations d’entretien :',
                'answers' => [
                    ['answer_text' => 'est indiquée sur le carnet d’entretien du véhicule', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'varie selon les véhicules', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'est fixée par le conducteur', 'is_correct' => false],
                ],
            ],
            // Question n°904
            [
                'question_text' => 'Sur une batterie dite sans entretien, je vérifie :',
                'answers' => [
                    ['answer_text' => 'le niveau d’eau par transparence', 'is_correct' => false],
                    ['answer_text' => 'l’état des cosses', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'rien, puisqu’elle est sans entretien', 'is_correct' => false],
                ],
            ],
            // Question n°905
            [
                'question_text' => 'Si le niveau de liquide de refroidissement est très bas :',
                'answers' => [
                    ['answer_text' => 'c’est dû à l’évaporation', 'is_correct' => false],
                    ['answer_text' => 'je rajoute de l’eau simplement', 'is_correct' => false],
                    ['answer_text' => 'je fais vérifier l’étanchéité du circuit', 'is_correct' => true], // Réponse c
                ],
            ],
            // Question n°906
            [
                'question_text' => 'Je fais vérifier rapidement mon véhicule si je constate une baisse importante du niveau :',
                'answers' => [
                    ['answer_text' => 'de l’huile à moteur', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'du liquide de frein', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'du liquide de refroidissement', 'is_correct' => true], // Réponse c
                    ['answer_text' => 'du liquide de lave-glace', 'is_correct' => false],
                ],
            ],
            // Question n°907
            [
                'question_text' => 'Il est recommandé d’avoir à bord du véhicule :',
                'answers' => [
                    ['answer_text' => 'une lampe de poche', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'un tournevis', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'un chiffon', 'is_correct' => true], // Réponse c
                    ['answer_text' => 'un bidon d’essence', 'is_correct' => false],
                ],
            ],
            // Question n°908
            [
                'question_text' => 'Il est préférable, pour remorquer un véhicule',
                'answers' => [
                    ['answer_text' => 'd’utiliser une corde solide', 'is_correct' => false],
                    ['answer_text' => 'd’utiliser une barre fixée aux points d’ancrage prévus', 'is_correct' => true], // Réponse b
                ],
            ],
            // Question n°909
            [
                'question_text' => 'La position du point mort concerne :',
                'answers' => [
                    ['answer_text' => 'le levier de vitesse lorsqu’une vitesse n’est enclenchée', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'l’embrayage quand le moteur commence à entraîner les roues', 'is_correct' => false],
                    ['answer_text' => 'la boîte de vitesse en prise directe', 'is_correct' => false],
                ],
            ],
            // Question n°910
            [
                'question_text' => 'Pour que le moteur entraine les roues alors qu’une vitesse est enclenchée, il faut :',
                'answers' => [
                    ['answer_text' => 'embrayer', 'is_correct' => true], // Réponse a (relâcher la pédale d'embrayage)
                    ['answer_text' => 'débrayé', 'is_correct' => false],
                ],
            ],
            // Question n°911
            [
                'question_text' => 'En marche normale, l’embrayage sert à :',
                'answers' => [
                    ['answer_text' => 'passer les vitesses', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'démarrer le véhicule', 'is_correct' => false], // Vrai aussi, mais la question demande 'En marche normale'
                    ['answer_text' => 'ralentir le véhicule', 'is_correct' => false],
                    ['answer_text' => 'exécuter une manœuvre', 'is_correct' => false], // Vrai aussi, mais la réponse est 'a'
                ],
            ],
            // Question n°912
            [
                'question_text' => 'La liaison entre le moteur et les roues est établie sur le schéma :',
                'answers' => [
                    ['answer_text' => 'a', 'is_correct' => false],
                    ['answer_text' => 'b', 'is_correct' => false],
                    ['answer_text' => 'c', 'is_correct' => true], // Réponse c
                ],
            ],
            // Question n°913
            [
                'question_text' => 'Le "point de patinage", c’est lorsque :',
                'answers' => [
                    ['answer_text' => 'le moteur transmet toute son énergie aux roues', 'is_correct' => false],
                    ['answer_text' => 'le moteur commence à entrainer les roues', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'le moteur tourne sans entrainer les roues', 'is_correct' => false],
                ],
            ],
            // Question n°914
            [
                'question_text' => 'L’embrayage a pour Rôle',
                'answers' => [
                    ['answer_text' => 'd’assurer la liaison progressive entre le moteur et les roues', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'de faire tourner le moteur plus vite', 'is_correct' => false],
                    ['answer_text' => 'd’arrêter le véhicule', 'is_correct' => false],
                ],
            ],
            // Question n°915
            [
                'question_text' => 'Un véhicule comporte obligatoirement :',
                'answers' => [
                    ['answer_text' => 'un indicateur de vitesse', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'un compte –tours', 'is_correct' => false],
                    ['answer_text' => 'un compteur kilométrique', 'is_correct' => true], // Réponse c
                    ['answer_text' => 'une jauge de carburant', 'is_correct' => true], // Réponse d
                ],
            ],
            // Question n°916
            [
                'question_text' => 'On appelle "angle mort" la partie de l’environnement que le conducteur :',
                'answers' => [
                    ['answer_text' => 'voit dans ses rétroviseurs', 'is_correct' => false],
                    ['answer_text' => 'voit directement au travers de son pare-brise', 'is_correct' => false],
                    ['answer_text' => 'ne peut voir au travers du pare-brise ou dans ses rétroviseurs', 'is_correct' => true], // Réponse c
                ],
            ],
            // Question n°917
            [
                'question_text' => 'L’importance de "l’angle mort" varie selon :',
                'answers' => [
                    ['answer_text' => 'le type de véhicule', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'le nombre de vitres latérales', 'is_correct' => false],
                    ['answer_text' => 'le réglage des rétroviseurs', 'is_correct' => true], // Réponse c
                ],
            ],
            // Question n°918
            [
                'question_text' => 'Le frein moteur intervient dès qu’on :',
                'answers' => [
                    ['answer_text' => 'lâche l’accélérateur', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'appuie sur la pédale de frein', 'is_correct' => false],
                ],
            ],
            // Question n°919
            [
                'question_text' => 'Le conducteur doit intervenir le plus rapidement possible si l’un de ces voyants s’allume :',
                'answers' => [
                    ['answer_text' => 'en circulation', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'alors qu’il met le contact', 'is_correct' => false],
                ],
            ],
            // Question n°920
            [
                'question_text' => 'Quelles sont les précautions à prendre en cas de crevaison :',
                'answers' => [
                    ['answer_text' => 'baliser les lieux,', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'caler le véhicule,', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'faire appel à son mécanicien.', 'is_correct' => false], // Réponse c (non inclus dans la réponse fournie, qui est a-b)
                ],
            ],
        ];

        $order = 1;
        foreach ($questionsData as $qData) {
            $question = Question::create([
                'quiz_id' => $quizId,
                'question_text' => $qData['question_text'],
                'type' => 'multiple_choice',
                'order' => $order++,
            ]);

            $answerOrder = 1;
            foreach ($qData['answers'] as $aData) {
                Answer::create([
                    'question_id' => $question->id,
                    'answer_text' => $aData['answer_text'],
                    'is_correct' => $aData['is_correct'],
                    'order' => $answerOrder++,
                ]);
            }
        }
    }
}