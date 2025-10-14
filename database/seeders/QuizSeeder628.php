<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Answer;

class QuizSeeder628 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ID du Quiz à associer aux questions
        $quizId = 9;

        // Assurez-vous que le Quiz existe
        if (!Quiz::find($quizId)) {
            $this->command->error("Le Quiz avec l'ID {$quizId} n'existe pas. Veuillez le créer d'abord.");
            return;
        }

        $questionsData = [
            // Question n°508
            [
                'question_text' => 'Sur les lignes hachurées appelées zébras :',
                'answers' => [
                    ['answer_text' => 'Je peux stationner', 'is_correct' => false],
                    ['answer_text' => 'Je peux circuler', 'is_correct' => false],
                    ['answer_text' => 'Je ne peux ni circuler, ni stationner', 'is_correct' => true], // Réponse c
                ],
            ],
            // Question n°509
            [
                'question_text' => 'On doit s’abstenir de conduire :',
                'answers' => [
                    ['answer_text' => 'Si on est sous l’effet des boissons alcoolisées ou des médicaments', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'Si on vient de manger sans prendre de l’alcool', 'is_correct' => false],
                    ['answer_text' => 'Si on est fatigué et somnolant', 'is_correct' => true], // Réponse c
                    ['answer_text' => 'Si on se sent nerveux', 'is_correct' => true], // Réponse d
                ],
            ],
            // Question N°510
            [
                'question_text' => 'Dans quel cas utiliser les avertisseurs sonores ?',
                'answers' => [
                    ['answer_text' => 'Pour avertir les autres usagers', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'Pour rechercher les passagers', 'is_correct' => false],
                    ['answer_text' => 'Pour saluer les autres usagers', 'is_correct' => false],
                ],
            ],
            // Question n°511
            [
                'question_text' => 'A toute réquisition des forces de sécurité concernant mon véhicule je dois présenter :',
                'answers' => [
                    ['answer_text' => 'La carte grise', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'Les papiers de dédouanement', 'is_correct' => false],
                    ['answer_text' => 'Le papier d’achat', 'is_correct' => false],
                    ['answer_text' => 'L’attestation d’assurance', 'is_correct' => true], // Réponse d
                    ['answer_text' => 'La visite technique', 'is_correct' => true], // Réponse e
                ],
            ],
            // Question n°512
            [
                'question_text' => 'Les règles de circulation doivent être respectées par :',
                'answers' => [
                    ['answer_text' => 'Les motocyclistes', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'Les piétons', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'Les automobilistes seulement', 'is_correct' => false],
                    ['answer_text' => 'Les automobilistes', 'is_correct' => true], // Réponse d
                ],
            ],
            // Question n°513
            [
                'question_text' => 'Quand je suis sur le point d’être dépassé, je dois :',
                'answers' => [
                    ['answer_text' => 'Accélérer', 'is_correct' => false],
                    ['answer_text' => 'Je serre ma droite sans accélérer', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'M’arrêter', 'is_correct' => false],
                ],
            ],
            // Question n°514
            [
                'question_text' => 'Dans un véhicule à cinq places il y a infraction avec :',
                'answers' => [
                    ['answer_text' => '6 passagers adultes à bord', 'is_correct' => true], // Réponse a
                    ['answer_text' => '5 passagers adultes à bord', 'is_correct' => true], // Réponse b. **NOTE: Ceci pourrait être une erreur dans le texte source si "5 places" est la capacité MAXIMALE légale pour 5 adultes, mais je suis la réponse fournie (a-b). Si un véhicule 5 places est déjà plein avec 5, ajouter un 6ème est une infraction (a). Si "5 passagers adultes" est une infraction avec un véhicule 5 places, cela pourrait signifier 5 AU TOTAL sont permis, y compris le conducteur. Je garde a-b comme dans la source.**
                    ['answer_text' => '4 passagers adultes à bord', 'is_correct' => false],
                ],
            ],
            // Question n°515
            [
                'question_text' => 'Une bonne conduite :',
                'answers' => [
                    ['answer_text' => 'Nécessite une attention soutenue de ma part', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'M’oblige à rouler tantôt à gauche tantôt à droite', 'is_correct' => false],
                    ['answer_text' => 'Me permet de tout regarder sur la route', 'is_correct' => false],
                    ['answer_text' => 'M’oblige à éviter tous les trous.', 'is_correct' => false],
                ],
            ],
            // Question n° 516
            [
                'question_text' => 'Quelle est l’intervalle minimum de sécurité entre deux véhicules qui se suivent et roulants à 50km/h :',
                'answers' => [
                    ['answer_text' => '10m environ', 'is_correct' => false],
                    ['answer_text' => '15m environ', 'is_correct' => true], // Réponse b (Temps de réaction (1s) x Vitesse (50/3.6) ≈ 14m. 15m est la réponse habituelle)
                    ['answer_text' => '20m environ', 'is_correct' => false],
                ],
            ],
            // Question n°517
            [
                'question_text' => 'Les principaux facteurs d’accident sont :',
                'answers' => [
                    ['answer_text' => 'une bonne tenue de route', 'is_correct' => false],
                    ['answer_text' => 'la fatigue', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'le non-respect des règles de circulation', 'is_correct' => true], // Réponse c
                    ['answer_text' => 'la vitesse excessive ou non adapté', 'is_correct' => true], // Réponse d
                    ['answer_text' => 'la conduite dans un état d’ivresse.', 'is_correct' => true], // Réponse e
                ],
            ],
            // Question n°518
            [
                'question_text' => 'En cas de traitement médical en cour et pour faire un long trajet, il est préférable :',
                'answers' => [
                    ['answer_text' => 'de modifier le traitement médical', 'is_correct' => false],
                    ['answer_text' => 'd’arrêter le traitement médical', 'is_correct' => false],
                    ['answer_text' => 'de se renseigner auprès de son médecin', 'is_correct' => true], // Réponse c
                ],
            ],
            // Question n°519
            [
                'question_text' => 'Que dois-je faire en présence d’une flaque d’eau sur la chaussée ?',
                'answers' => [
                    ['answer_text' => 'Accélérer', 'is_correct' => false],
                    ['answer_text' => 'Ralentir', 'is_correct' => true], // Réponse b (Pour éviter l'aquaplaning et les éclaboussures)
                    ['answer_text' => 'M’arrêter', 'is_correct' => false],
                ],
            ],
            // Question n°520
            [
                'question_text' => 'Quel serait votre comportement si le véhicule qui vous précède s’arrête subitement ?',
                'answers' => [
                    ['answer_text' => 'Je m’arrête et j’apprécie la situation', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'Je dépasse rapidement le véhicule', 'is_correct' => false],
                    ['answer_text' => 'Je klaxonne', 'is_correct' => false],
                ],
            ],
            // Question n°521
            [
                'question_text' => 'Dans un véhicule pour passagers, on peut transporter :',
                'answers' => [
                    ['answer_text' => 'des passagers et des marchandises', 'is_correct' => false],
                    ['answer_text' => 'des passagers et des animaux', 'is_correct' => false],
                    ['answer_text' => 'des passagers uniquement', 'is_correct' => true], // Réponse c (La mention "véhicule pour passagers" implique un transport de personnes.)
                ],
            ],
            // Question n°522
            [
                'question_text' => 'Au volant de son véhicule, passagers à bord, le conducteur :',
                'answers' => [
                    ['answer_text' => 'peut fumer', 'is_correct' => false],
                    ['answer_text' => 'peut discuter', 'is_correct' => false],
                    ['answer_text' => 'doit se concentrer sur la conduite', 'is_correct' => true], // Réponse c
                ],
            ],
            // Question n°523
            [
                'question_text' => 'En cas de crevaison, à défaut de cric et seul à bord de votre véhicule, vous pouvez :',
                'answers' => [
                    ['answer_text' => 'creuser la chaussée pour changer la roue crevée', 'is_correct' => false],
                    ['answer_text' => 'Soulever le véhicule pour changer la roue crevée', 'is_correct' => false],
                    ['answer_text' => 'Attendre d’autres usagers de la route pour solliciter leur aide', 'is_correct' => true], // Réponse c
                ],
            ],
            // Question n°524
            [
                'question_text' => 'En cas de panne sur la route et à défaut des triangles de pré signalisation, je peux utiliser :',
                'answers' => [
                    ['answer_text' => 'des touffes d’herbes', 'is_correct' => false],
                    ['answer_text' => 'les feux de détresse', 'is_correct' => true], // Réponse b (Feux de détresse sont le premier réflexe)
                    ['answer_text' => 'la roue-secours', 'is_correct' => false],
                ],
            ],
            // Question n°525
            [
                'question_text' => 'Lorsque les piétons sont engagés sur le passage clouté, je dois :',
                'answers' => [
                    ['answer_text' => 'leur céder le passage', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'klaxonner pour les empêcher de traverser', 'is_correct' => false],
                    ['answer_text' => 'leur demander d’attendre mon passage', 'is_correct' => false],
                ],
            ],
            // Question n°526
            [
                'question_text' => 'Parmi les véhicules suivants, lesquels sont prioritaires :',
                'answers' => [
                    ['answer_text' => 'Les corbillards', 'is_correct' => false],
                    ['answer_text' => 'Les véhicules des sapeurs-pompiers en mission', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'Les ambulances', 'is_correct' => false], // Prioritaires seulement en mission et avec avertisseur sonore et lumineux. Le texte ne le précise pas. On suit la réponse 'b' mais 'c' est aussi souvent prioritaire.
                    ['answer_text' => 'Les véhicules militaires', 'is_correct' => false],
                ],
            ],
            // Question n°527
            [
                'question_text' => 'Parmi les véhicules suivants ; lesquels peuvent emprunter un sens interdit',
                'answers' => [
                    ['answer_text' => 'les véhicules de police en mission', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'les corbillards', 'is_correct' => false],
                    ['answer_text' => 'les véhicules de SAMU en mission', 'is_correct' => true], // Réponse c
                ],
            ],
            // Question n°528
            [
                'question_text' => 'Que dois-je faire à la vue d’une personne traversant ou s’apprêtant à s’engager sur la chaussée, canne blanche levée ?',
                'answers' => [
                    ['answer_text' => 'Je passe rapidement', 'is_correct' => false],
                    ['answer_text' => 'Je m’arrête pour la laisser passer', 'is_correct' => true], // Réponse b (Canne blanche : malvoyant)
                    ['answer_text' => 'Je klaxonne', 'is_correct' => false],
                ],
            ],
            // Question n°529
            [
                'question_text' => 'Pour aider les enfants qui attendent pour traverser la rue :',
                'answers' => [
                    ['answer_text' => 'Je m’arrête et leur adresse un signe de main', 'is_correct' => false], // Mauvaise pratique, peut les encourager à traverser trop vite
                    ['answer_text' => 'Je ralentis et me tiens prêt à freiner si ces enfants se décident', 'is_correct' => false],
                    ['answer_text' => 'Je m’arrête si aucun véhicule ne vient en sens inverse', 'is_correct' => true], // Réponse c
                    ['answer_text' => 'Je descends de ma voiture pour les aider à traverser', 'is_correct' => true], // Réponse d
                ],
            ],
            // Question n°530
            [
                'question_text' => 'Je dois m’abstenir de conduire :',
                'answers' => [
                    ['answer_text' => 'Sous l’effet de boissons alcoolisées', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'Sous l’effet de la fatigue', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'En cas de visibilité insuffisante grave', 'is_correct' => true], // Réponse c
                    ['answer_text' => 'En cas de chaussée rétrécie', 'is_correct' => false],
                    ['answer_text' => 'En cas de défaillance du câble compteur', 'is_correct' => false],
                ],
            ],
            // Question n°531
            [
                'question_text' => 'Comment réagir quand le conducteur venant d’en face m’éblouit, malgré mes appels de feux ?',
                'answers' => [
                    ['answer_text' => 'j’allume et je reste en feu de route', 'is_correct' => false],
                    ['answer_text' => 'je me protège les yeux avec la main', 'is_correct' => false],
                    ['answer_text' => 'je ralentis au maximum et je m’arrête au besoin', 'is_correct' => true], // Réponse c
                    ['answer_text' => 'je ralentis et je fixe le bord droit de la chaussée', 'is_correct' => true], // Réponse d
                ],
            ],
            // Question n°532
            [
                'question_text' => 'Quel est le comportement d’un usager sur un lieu d’accident ?',
                'answers' => [
                    ['answer_text' => 'Alerter, secourir et protéger', 'is_correct' => false],
                    ['answer_text' => 'Secourir, protéger et alerter', 'is_correct' => false],
                    ['answer_text' => 'Protéger, alerter et secourir', 'is_correct' => true], // Réponse c (P.A.S.)
                ],
            ],
            // Question n°533
            [
                'question_text' => 'Pour éteindre un début d’incendie dans une voiture, j’utilise :',
                'answers' => [
                    ['answer_text' => 'le sable uniquement', 'is_correct' => false],
                    ['answer_text' => 'l’eau', 'is_correct' => false],
                    ['answer_text' => 'l’extincteur', 'is_correct' => true], // Réponse c
                ],
            ],
            // Question n°534
            [
                'question_text' => 'Pour baliser un lieu d’accident, j’utilise :',
                'answers' => [
                    ['answer_text' => 'Des balises', 'is_correct' => false],
                    ['answer_text' => 'Des branchages', 'is_correct' => false],
                    ['answer_text' => 'Des triangles de pré signalisation', 'is_correct' => true], // Réponse c
                ],
            ],
            // Question n°535
            [
                'question_text' => 'A quelle distance place-t-on ordinairement les triangles de pré-signalisation sur un lieu d’accident ?',
                'answers' => [
                    ['answer_text' => 'à 30m au moins', 'is_correct' => false],
                    ['answer_text' => 'à 100m au moins', 'is_correct' => false],
                    ['answer_text' => 'à 200m au moins', 'is_correct' => true], // Réponse c (La distance légale standard pour un triangle est souvent 100m, mais 200m est plus sûr, et c'est la réponse dans la source. Je la garde.)
                ],
            ],
            // Question n°536
            [
                'question_text' => 'A quelle catégorie d’agents avez-vous recours en cas d’accident en rase campagne ?',
                'answers' => [
                    ['answer_text' => 'Les sapeurs-pompiers', 'is_correct' => false],
                    ['answer_text' => 'les gendarmes', 'is_correct' => true], // Réponse b (Gendarmerie pour rase campagne, Police pour agglomération)
                    ['answer_text' => 'les douaniers', 'is_correct' => false],
                    ['answer_text' => 'les policiers', 'is_correct' => false],
                ],
            ],
            // Question n°537
            [
                'question_text' => 'Quand le blessé d’un accident de circulation réclame à boire :',
                'answers' => [
                    ['answer_text' => 'je lui offre de l’eau', 'is_correct' => false],
                    ['answer_text' => 'je lui offre de l’alcool', 'is_correct' => false],
                    ['answer_text' => 'je lui offre du jus de fruit', 'is_correct' => false],
                    ['answer_text' => 'je ne lui donne rien', 'is_correct' => true], // Réponse d
                ],
            ],
            // Question n°538
            [
                'question_text' => 'Quelles sont les causes qui peuvent être à l’origine de la mort d’un blessé avant l’arrivée des secours ?',
                'answers' => [
                    ['answer_text' => 'L’hémorragie', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'La peur', 'is_correct' => false],
                    ['answer_text' => 'L’asphyxie', 'is_correct' => true], // Réponse c
                ],
            ],
            // Question n°539
            [
                'question_text' => 'Comment arrêter l’hémorragie externe ?',
                'answers' => [
                    ['answer_text' => 'en faisant un pansement alcoolisé', 'is_correct' => false],
                    ['answer_text' => 'en plaçant un garrot à longue durée', 'is_correct' => false],
                    ['answer_text' => 'en faisant un pansement compressif', 'is_correct' => true], // Réponse c
                    ['answer_text' => 'en faisant une pression directe sur la plaie avec un linge propre plié', 'is_correct' => true], // Réponse d
                    ['answer_text' => 'en appuyant sur les points de compression', 'is_correct' => true], // Réponse e
                ],
            ],
            // Question n°540
            [
                'question_text' => 'Comment reconnaitre une personne asphyxiée ?',
                'answers' => [
                    ['answer_text' => 'Par l’arrêt du mouvement du ventre et de la poitrine', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'Par l’arrêt du pouls', 'is_correct' => false],
                    ['answer_text' => 'Par le mouvement du ventre et de la poitrine', 'is_correct' => false],
                ],
            ],
            // Question n°541
            [
                'question_text' => 'Comment réanimer une personne asphyxiée ?',
                'answers' => [
                    ['answer_text' => 'en desserrant les vêtements de la victime', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'en pratiquant la respiration bouche à bouche après désobstruction des voies aériennes supérieures', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'en pratiquant la respiration bouche à nez sans désobstruction des voies aériennes supérieures', 'is_correct' => false],
                    ['answer_text' => 'en mettant le blessé dans la Position Latérale de Sécurité (P.L.S.)', 'is_correct' => true], // Réponse d (Si inconscient et respire)
                    ['answer_text' => 'en lui donnant à boire', 'is_correct' => false],
                ],
            ],
            // Question n°542
            [
                'question_text' => 'Quels sont les signes qui apparaissent en cas d’entorse ?',
                'answers' => [
                    ['answer_text' => 'douleur, gonflement, mouvements impossibles', 'is_correct' => false],
                    ['answer_text' => 'Douleur, saignement, mouvements possibles', 'is_correct' => false],
                    ['answer_text' => 'Douleur, gonflement, mouvements possibles', 'is_correct' => true], // Réponse c
                ],
            ],
            // Question n°543
            [
                'question_text' => 'L’hémorragie est :',
                'answers' => [
                    ['answer_text' => 'La sortie du sang hors des vaisseaux sanguins', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'Une mauvaise circulation du sang', 'is_correct' => false],
                    ['answer_text' => 'Le passage du sang dans le cœur', 'is_correct' => false],
                ],
            ],
            // Question n°544
            [
                'question_text' => 'Il y a hémorragie externe lorsque le sang s’écoule :',
                'answers' => [
                    ['answer_text' => 'D’un orifice naturel', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'A l’extérieur du corps par une plaie', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'D’un orifice naturel ou à l’extérieur du corps par une plaie', 'is_correct' => true], // Réponse c
                    ['answer_text' => 'A l’intérieur du corps', 'is_correct' => false],
                ],
            ],
            // Question n°545
            [
                'question_text' => 'Il y a hémorragie interne lorsque le sang s’écoule :',
                'answers' => [
                    ['answer_text' => 'A l’extérieur du corps', 'is_correct' => false],
                    ['answer_text' => 'A l’intérieur du corps hors des vaisseaux', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'A l’intérieur des vaisseaux', 'is_correct' => false],
                ],
            ],
            // Question n°546
            [
                'question_text' => 'En cas de brûlure grave par le feu, vêtements enflammés :',
                'answers' => [
                    ['answer_text' => 'Je déshabille la victime avant de l’évacuer à l’hôpital', 'is_correct' => false],
                    ['answer_text' => 'J’empêche la victime de courir, je l’enroule dans une couverture et je l’évacue à l’hôpital', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'Je l’arrose de l’extincteur', 'is_correct' => false],
                ],
            ],
            // Question n°547
            [
                'question_text' => 'En cas de brûlure par liquide bouillant ou par vapeur :',
                'answers' => [
                    ['answer_text' => 'Je déshabille la victime, je la douche le plus vite possible et je le fais évacuer vers un centre médical', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'Je l’enroule de couverture', 'is_correct' => false],
                    ['answer_text' => 'Je l’évacue sans rien faire', 'is_correct' => false],
                ],
            ],
            // Question n°548
            [
                'question_text' => 'En cas de projection de l’acide de la batterie dans l’œil d’un individu :',
                'answers' => [
                    ['answer_text' => 'je rince l’œil pendant au moins 10 minutes avec de l’eau courante et je mets une compresse, puis je l’évacue chez l’ophtalmologiste', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'j’instille de l’huile à frein sur l’œil', 'is_correct' => false],
                    ['answer_text' => 'je bande l’œil', 'is_correct' => false],
                ],
            ],
            // Question n°549
            [
                'question_text' => 'Pour effectuer le dégagement d’urgence d’un blessé de quelques mètres :',
                'answers' => [
                    ['answer_text' => 'je le roule par terre', 'is_correct' => false],
                    ['answer_text' => 'je le mets au dos', 'is_correct' => false],
                    ['answer_text' => 'je soulève légèrement sa tête, une aide le tire par les pieds en le glissant sur le sol dans l’axe du corps', 'is_correct' => true], // Réponse c (Technique de dégagement d'urgence)
                ],
            ],
            // Question n°550
            [
                'question_text' => 'Quel est l’utilité de la position latérale de sécurité (PLS) ?',
                'answers' => [
                    ['answer_text' => 'Elle permet d’être couché sur le dos afin de bien respirer', 'is_correct' => false],
                    ['answer_text' => 'Elle permet de rester assis pour empêcher le choc', 'is_correct' => false],
                    ['answer_text' => 'Elle permet d’être couché à plat ventre', 'is_correct' => false],
                    ['answer_text' => 'Elle permet à la victime d’être couché sur le côté, d’éviter la chute de la langue en arrière, l’encombrement des voies respiratoires par le sang, le vomissement et la mucosité', 'is_correct' => true], // Réponse d
                ],
            ],
            // Question n°551
            [
                'question_text' => 'Quel est le but du massage cardiaque ?',
                'answers' => [
                    ['answer_text' => 'Il permet au malade d’éviter le vertige', 'is_correct' => false],
                    ['answer_text' => 'Il permet au malade de bien respirer', 'is_correct' => false],
                    ['answer_text' => 'Il permet de réanimer une victime qui présente un arrêt circulatoire', 'is_correct' => true], // Réponse c
                    ['answer_text' => 'il permet d’arrêter une hémorragie interne', 'is_correct' => false],
                ],
            ],
            // Question n°552
            [
                'question_text' => 'Quand dit-on qu’il y a luxation ?',
                'answers' => [
                    ['answer_text' => 'Lorsqu’il y a étirement ou déchirure des ligaments', 'is_correct' => false],
                    ['answer_text' => 'Lorsqu’il y a cassure d’un os et qu’il est en contact avec l’extérieur', 'is_correct' => false],
                    ['answer_text' => 'Lorsque les ligaments sont déchirés, l’articulation déboitée', 'is_correct' => true], // Réponse c. **NOTE: Le texte est ambigu, la luxation est le déboîtement, la déchirure des ligaments est une entorse grave, mais on suit la réponse 'c'.**
                ],
            ],
            // Question n°553
            [
                'question_text' => 'Quand dit-on qu’il y a luxation ?',
                'answers' => [
                    ['answer_text' => 'Lorsqu’il y a cassure d’un os sans saignement', 'is_correct' => false],
                    ['answer_text' => 'Lorsque les ligaments sont déchirés, l’articulation déboitée', 'is_correct' => true], // Réponse b (Une redondance de la question précédente, on garde la réponse logique pour la luxation)
                    ['answer_text' => 'Lorsqu’il y a étirement ou déchirure des ligaments, les surfaces articulaires restent en contact', 'is_correct' => false],
                ],
            ],
            // Question n°554
            [
                'question_text' => 'Pour le ramassage d’un blessé :',
                'answers' => [
                    ['answer_text' => 'Je dois remuer le blessé et le mettre débout', 'is_correct' => false],
                    ['answer_text' => 'Je dois mettre le blessé au dos', 'is_correct' => false],
                    ['answer_text' => 'Je dois le remuer le moins possible et respecter le bloc tête-cou-tronc', 'is_correct' => true], // Réponse c
                ],
            ],
            // Question n°555
            [
                'question_text' => 'On appelle fracture :',
                'answers' => [
                    ['answer_text' => 'La rupture brutale d’un os', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'La douleur d’un os', 'is_correct' => false],
                    ['answer_text' => 'La sortie de l’os dans l’organisme', 'is_correct' => false],
                ],
            ],
            // Question n°556
            [
                'question_text' => 'Il y a fracture fermée lorsque :',
                'answers' => [
                    ['answer_text' => 'Un os a un abcès', 'is_correct' => false],
                    ['answer_text' => 'Un os est cassé et prend contact avec l’extérieur', 'is_correct' => false],
                    ['answer_text' => 'Un os est cassé et ne prend pas contact avec l’extérieur', 'is_correct' => true], // Réponse c
                ],
            ],
            // Question n°557
            [
                'question_text' => 'Il y a fracture ouverte lorsque :',
                'answers' => [
                    ['answer_text' => 'Un os est courbé', 'is_correct' => false],
                    ['answer_text' => 'Un os est cassé et ne prend pas contact avec l’extérieur', 'is_correct' => false],
                    ['answer_text' => 'Un os est cassé et prend contact avec l’extérieur', 'is_correct' => true], // Réponse c
                ],
            ],
            // Question n°558
            [
                'question_text' => 'Quels peuvent être les signes révélateurs de fatigue au volant ?',
                'answers' => [
                    ['answer_text' => 'Maux de dents – picotements gastrique –lourdeurs des pieds et des bras', 'is_correct' => false],
                    ['answer_text' => 'lourdeur de tête – picotement des yeux – lourdeurs des paupières', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'Maux d’estomac – picotements de la peau – campes aux jambes', 'is_correct' => false],
                    ['answer_text' => 'Faim – soif – vertige', 'is_correct' => false],
                ],
            ],
            // Question n°559
            [
                'question_text' => 'Secourir un accident de la route est-il obligatoire ?',
                'answers' => [
                    ['answer_text' => 'Oui', 'is_correct' => true], // Réponse a (Non-assistance à personne en danger)
                    ['answer_text' => 'Non', 'is_correct' => false],
                    ['answer_text' => 'Facultatif', 'is_correct' => false],
                ],
            ],
            // Question n°560
            [
                'question_text' => 'Quel effet l’alcool produit-il sur un conducteur ?',
                'answers' => [
                    ['answer_text' => 'Permet au conducteur de mieux voir', 'is_correct' => false],
                    ['answer_text' => 'Permet au conducteur de respecter le code de la route', 'is_correct' => false],
                    ['answer_text' => 'Réduit les facultés mentales et physiques du conducteur', 'is_correct' => true], // Réponse c
                ],
            ],
            // Question n°561
            [
                'question_text' => 'Quel est le bon comportement d’un usager sur un lieu d’accident :',
                'answers' => [
                    ['answer_text' => 'alerter – secourir – et protéger', 'is_correct' => false],
                    ['answer_text' => 'secourir – protéger – et alerter', 'is_correct' => false],
                    ['answer_text' => 'secourir – alerter – et protéger', 'is_correct' => false],
                    ['answer_text' => 'rien de tout ce qui précède', 'is_correct' => true], // Réponse d (La bonne réponse est Protéger, Alerter, Secourir : PAS. Comme aucune option ne correspond, on prend 'rien de tout ce qui précède' de la source.)
                ],
            ],
            // Question n°562
            [
                'question_text' => 'Sur autoroute, je commets une infraction en m’insérant sur l’axe principal :',
                'answers' => [
                    ['answer_text' => 'si je fais ralentir un véhicule', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'si j’oblige un usager à changer de voie', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'si je cède le passage à un usager circulant sur l’axe principal', 'is_correct' => false],
                ],
            ],
            // Question n°563
            [
                'question_text' => 'En cas d’accident sur autoroute je peux prévenir les secours :',
                'answers' => [
                    ['answer_text' => 'à l’aide des bornes d’appel d’urgence placées tous les 2km', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'à l’aide de mon téléphone portable en composant le numéro d’un service secours', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'avec l’aide d’un autre usager', 'is_correct' => false],
                ],
            ],
            // Question n°564
            [
                'question_text' => 'Pour m’installer à mon poste de conduite, dans l’ordre :',
                'answers' => [
                    ['answer_text' => 'je mets la ceinture, je règle les rétroviseurs puis le siège', 'is_correct' => false],
                    ['answer_text' => 'je règle le siège puis les rétroviseurs et je mets la ceinture', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'je règle les rétroviseurs puis le siège et je mets la ceinture', 'is_correct' => false],
                ],
            ],
            // Question n°565
            [
                'question_text' => 'Titulaire du permis de conduire depuis 18mois, je peux rouler à :',
                'answers' => [
                    ['answer_text' => '80km/h', 'is_correct' => true], // Réponse a
                    ['answer_text' => '70km/h', 'is_correct' => true], // Réponse b
                    ['answer_text' => '60km/h', 'is_correct' => true], // Réponse c
                    ['answer_text' => '100km/h', 'is_correct' => true], // Réponse d. **NOTE: Ces limitations dépendent du pays et du type de route (je suis la réponse a b c d de la source).**
                ],
            ],
            // Question n°566
            [
                'question_text' => 'Le taux d’alcoolémie est :',
                'answers' => [
                    ['answer_text' => 'le degré de l’état d’ivresse', 'is_correct' => false],
                    ['answer_text' => 'la quantité de bière dans le sang', 'is_correct' => false],
                    ['answer_text' => 'la quantité d’alcool contenue dans un litre de sang', 'is_correct' => true], // Réponse c (ou air expiré)
                    ['answer_text' => 'la quantité de vin contenu dans le sang', 'is_correct' => false],
                ],
            ],
            // Question n°567
            [
                'question_text' => 'Le dépistage de l’alcoolémie se fait par :',
                'answers' => [
                    ['answer_text' => 'l’air expiré par la bouche', 'is_correct' => false],
                    ['answer_text' => 'l’alcotest', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'la prise de sang', 'is_correct' => false],
                    ['answer_text' => 'l’éthylotest', 'is_correct' => true], // Réponse d
                ],
            ],
            // Question n°568
            [
                'question_text' => 'Le dosage de l’alcoolémie se fait par :',
                'answers' => [
                    ['answer_text' => 'l’alcooltest', 'is_correct' => false],
                    ['answer_text' => 'analyse de sang', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'éthylomètre', 'is_correct' => true], // Réponse c
                    ['answer_text' => 'éthylotest', 'is_correct' => false],
                ],
            ],
            // Question n°569
            [
                'question_text' => 'Quelle est la bonne position des mains au volant d’un conducteur en marche normale, en considérant le volant comme le cadran d’une montre',
                'answers' => [
                    ['answer_text' => '11h 05mn', 'is_correct' => false],
                    ['answer_text' => '9h 15mn', 'is_correct' => true], // Réponse b (Position recommandée 9h15 ou 10h10)
                    ['answer_text' => '7h 25mn', 'is_correct' => false],
                ],
            ],
            // Question n°570
            [
                'question_text' => 'Au volant de mon véhicule je peux :',
                'answers' => [
                    ['answer_text' => 'recevoir un appel', 'is_correct' => false],
                    ['answer_text' => 'appeler un ami', 'is_correct' => false],
                    ['answer_text' => 'communiquer si mon portable est équipé d’un écouteur', 'is_correct' => false],
                    ['answer_text' => 'rien de tout ce qui précède', 'is_correct' => true], // Réponse d (L'utilisation de téléphone, même avec oreillette/écouteur, est souvent interdite. Seul le kit main-libre intégré est souvent autorisé.)
                ],
            ],
            // Question n°571
            [
                'question_text' => 'Au volant de mon véhicule je peux :',
                'answers' => [
                    ['answer_text' => 'manger', 'is_correct' => false],
                    ['answer_text' => 'boire', 'is_correct' => false],
                    ['answer_text' => 'fumer', 'is_correct' => false],
                    ['answer_text' => 'écouter la radio', 'is_correct' => true], // Réponse d
                ],
            ],
            // Question n°572
            [
                'question_text' => 'Dans une agglomération éclairée je peux circuler :',
                'answers' => [
                    ['answer_text' => 'sans feux', 'is_correct' => false],
                    ['answer_text' => 'en feux de position', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'en feux de croisement', 'is_correct' => true], // Réponse c
                    ['answer_text' => 'en feux de route', 'is_correct' => false],
                ],
            ],
            // Question n°573
            [
                'question_text' => 'Je peux être condamné pour délit de fuite si je ne m’arrête pas après avoir :',
                'answers' => [
                    ['answer_text' => 'occasionné un accident matériel', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'occasionné un accident corporel', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'ignoré l’injonction d’un agent de force réglementant la circulation', 'is_correct' => false],
                ],
            ],
            // Question n°574
            [
                'question_text' => 'La vigilance au volant est dégradé si :',
                'answers' => [
                    ['answer_text' => 'Je téléphone', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'Je mange un sandwich', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'Je bavarde avec les passagers', 'is_correct' => true], // Réponse c
                    ['answer_text' => 'Je me concentre à la conduite', 'is_correct' => false],
                ],
            ],
            // Question n°575
            [
                'question_text' => 'La consommation de la drogue peut provoquer',
                'answers' => [
                    ['answer_text' => 'des effets d’ivresse', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'une diminution du champ visuel', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'l’euphorie', 'is_correct' => true], // Réponse c
                ],
            ],
            // Question n°576
            [
                'question_text' => 'Que doit faire un conducteur impliqué dans un accident de circulation ?',
                'answers' => [
                    ['answer_text' => 'dégager la chaussée après marquage pour ne pas gêner la circulation', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'avertir son assureur (compagnie d’assurance)', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'communiquer son identité (adresse) à toute personne impliquée dans l’accident', 'is_correct' => true], // Réponse c
                    ['answer_text' => 'rester calme et courtois', 'is_correct' => true], // Réponse d
                ],
            ],
            // Question n°577
            [
                'question_text' => 'Quel doit être le comportement d’un conducteur vis-à-vis d’un véhicule prioritaire en mission ?',
                'answers' => [
                    ['answer_text' => 'céder le passage aux intersections', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'céder le passage aux intersections munies de feux tricolores', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'faciliter leurs manœuvres, de croissement', 'is_correct' => true], // Réponse c
                    ['answer_text' => 'attendre l’ordre d’un agent règlementant la circulation', 'is_correct' => false],
                ],
            ],
            // Question n°578
            [
                'question_text' => 'Quels sont les signes évidents de la fatigue ?',
                'answers' => [
                    ['answer_text' => 'bâillement', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'picotement des yeux', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'somnolence', 'is_correct' => true], // Réponse c
                ],
            ],
            // Question n°579
            [
                'question_text' => 'Quels sont les effets de la fatigue ?',
                'answers' => [
                    ['answer_text' => 'réaction tardive', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'mauvaise analyse', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'mauvaise appréciation des vitesses', 'is_correct' => false], // Faible ou non correcte dans la source
                    ['answer_text' => 'l’impatience ou anxiété grandissante', 'is_correct' => true], // Réponse d
                ],
            ],
            // Question n°580
            [
                'question_text' => 'Comment limiter la fatigue ?',
                'answers' => [
                    ['answer_text' => 'conduire sur une longue durée sans repos', 'is_correct' => false],
                    ['answer_text' => 'pendant le trajet se reposer régulièrement', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'pratiquer l’alternance au volant', 'is_correct' => true], // Réponse c
                ],
            ],
            // Question n°581
            [
                'question_text' => 'Quels sont les conditions nécessaires pour un déplacement sûr ?',
                'answers' => [
                    ['answer_text' => 'être en forme pour conduire', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'avoir un véhicule en bon état de fonctionnement', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'anticiper les situations critiques', 'is_correct' => true], // Réponse c
                    ['answer_text' => 'être courtois avec les autres usagers', 'is_correct' => true], // Réponse d
                ],
            ],
            // Question n°582
            [
                'question_text' => 'Quel comportement adopter pour une conduite économique ?',
                'answers' => [
                    ['answer_text' => 'choisir un bon style de conduite', 'is_correct' => false], // Bien que vrai, la réponse donnée ne l'inclut pas. Je suis la source.
                    ['answer_text' => 'bien régler son moteur', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'bon gonflage des pneus', 'is_correct' => true], // Réponse c
                    ['answer_text' => 'aérodynamisme bien adapté', 'is_correct' => true], // Réponse d
                ],
            ],
            // Question n°583
            [
                'question_text' => 'Quel doit être le comportement d’un conducteur impliqué dans un accident de circulation ?',
                'answers' => [
                    ['answer_text' => 's’arrêter après marquage', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'dégager la chaussée pour ne pas gêner la circulation', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'avertir sa compagnie d’assurance', 'is_correct' => true], // Réponse c
                    ['answer_text' => 'communiquer son identité et son adresse à toute personne impliquée dans l’accident', 'is_correct' => true], // Réponse d
                    ['answer_text' => 'conduire le véhicule au poste de police le plus proche', 'is_correct' => false],
                ],
            ],
            // Question n°584
            [
                'question_text' => 'L’alcool :',
                'answers' => [
                    ['answer_text' => 'diminue le champ de vision,', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'réduit la vigilance', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'allonge le temps de réaction', 'is_correct' => true], // Réponse c
                    ['answer_text' => 'Augmente le champ de vision', 'is_correct' => false],
                ],
            ],
            // Question n°585
            [
                'question_text' => 'J’ai plus de risque de rencontrer du verglas si je circule :',
                'answers' => [
                    ['answer_text' => 'en lisière d’une forêt', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'le long d’un cours d’eau', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'à allure soutenue', 'is_correct' => false],
                ],
            ],
            // Question n°586
            [
                'question_text' => 'Je dois allumer mes feux :',
                'answers' => [
                    ['answer_text' => 'Dès que le jour tombe', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'Dès qu’il fait nuit', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'Dès qu’il commence par pleuvoir', 'is_correct' => false],
                ],
            ],
            // Question n°587
            [
                'question_text' => 'Pour stationner de nuit dans une rue non éclairée en agglomération, j’allume :',
                'answers' => [
                    ['answer_text' => 'Mes feux de croisement', 'is_correct' => false],
                    ['answer_text' => 'Mes feux de position', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'Aucun feu pour ne pas décharger ma batterie', 'is_correct' => false],
                ],
            ],
            // Question n°588
            [
                'question_text' => 'L’absorption d’alcool entraine une réduction :',
                'answers' => [
                    ['answer_text' => 'Du champ visuel', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'Des capacités d’analyse', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'Du temps de réaction', 'is_correct' => false], // L'alcool allonge le temps de réaction
                    ['answer_text' => 'Des habiletés motrices', 'is_correct' => true], // Réponse d
                ],
            ],
            // Question n°589
            [
                'question_text' => 'Les effets de l’alcool apparaissent à partir de :',
                'answers' => [
                    ['answer_text' => '0,3g/l de sang', 'is_correct' => false],
                    ['answer_text' => '0,5g/l de sang', 'is_correct' => true], // Réponse b (Seuil légal de conduite dans de nombreux pays)
                    ['answer_text' => '1,2g/l de sang', 'is_correct' => false],
                ],
            ],
            // Question n°590
            [
                'question_text' => 'Conduire avec une alcoolémie de 0,5g/l de sang multiplie le risque d’avoir un accident mortel :',
                'answers' => [
                    ['answer_text' => 'par dix', 'is_correct' => false],
                    ['answer_text' => 'par cinq', 'is_correct' => false],
                    ['answer_text' => 'par deux', 'is_correct' => true], // Réponse c
                ],
            ],
            // Question n°591
            [
                'question_text' => 'Pour faire redescendre à 0,5g/l, un taux d’alcoolémie de 0,8g/l de sang, il faut en moyenne :',
                'answers' => [
                    ['answer_text' => '1 heure', 'is_correct' => false],
                    ['answer_text' => '2 heures', 'is_correct' => true], // Réponse b (Le corps élimine environ 0,1 à 0,15 g/l par heure. Pour perdre 0,3g/l, il faut 2h-3h)
                    ['answer_text' => '3 heures', 'is_correct' => false],
                ],
            ],
            // Question n°592
            [
                'question_text' => 'L’association alcool et médicaments peut augmenter :',
                'answers' => [
                    ['answer_text' => 'Le taux d’alcoolémie', 'is_correct' => false],
                    ['answer_text' => 'Les effets de l’alcool', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'Le temps de réaction', 'is_correct' => true], // Réponse c
                ],
            ],
            // Question n° 593
            [
                'question_text' => 'Lors d’un long trajet, il est conseillé de faire une pause d’au moins 10minutes :',
                'answers' => [
                    ['answer_text' => 'Toutes les heures', 'is_correct' => false],
                    ['answer_text' => 'Toutes les deux heures', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'Toutes les 4 heures', 'is_correct' => false],
                ],
            ],
            // Question n°594
            [
                'question_text' => 'L’alcoolémie atteint son maximum :',
                'answers' => [
                    ['answer_text' => 'Immédiatement après absorption', 'is_correct' => false],
                    ['answer_text' => 'Entre demi-heure et une heure après absorption', 'is_correct' => true], // Réponse b (Variable selon les conditions)
                    ['answer_text' => 'Après deux heures', 'is_correct' => false],
                ],
            ],
            // Question n°595
            [
                'question_text' => 'La mesure exacte du taux d’alcoolémie est effectuée si :',
                'answers' => [
                    ['answer_text' => 'Le dépistage est positif', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'Le conducteur refuse le dépistage', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'Le dépistage est négatif', 'is_correct' => false],
                ],
            ],
            // Question n°596
            [
                'question_text' => 'Le contrôle d’alcoolémie est systématique :',
                'answers' => [
                    ['answer_text' => 'Si l’on est impliqué dans un accident corporel', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'Lors des contrôles routiers', 'is_correct' => false],
                    ['answer_text' => 'Lors d’un accident', 'is_correct' => false],
                ],
            ],
            // Question n°597
            [
                'question_text' => 'Les conditions qui augmentent la fatigue sont :',
                'answers' => [
                    ['answer_text' => 'Le manque de sommeil', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'La visibilité réduite', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'Une circulation fluide', 'is_correct' => false],
                    ['answer_text' => 'La conduite de nuit', 'is_correct' => false],
                ],
            ],
            // Question n°598
            [
                'question_text' => 'Pour retarder l’apparition de la fatigue, il faut :',
                'answers' => [
                    ['answer_text' => 'Boire beaucoup de café', 'is_correct' => false],
                    ['answer_text' => 'Etre bien installé au volant', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'Prendre la route après un bon repos', 'is_correct' => true], // Réponse c
                ],
            ],
            // Question n°599
            [
                'question_text' => 'En cas de fatigue, il faut :',
                'answers' => [
                    ['answer_text' => 'Marquer une pause', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'Rouler plus lentement', 'is_correct' => false],
                    ['answer_text' => 'Rouler plus vite pour maintenir la vigilance', 'is_correct' => false],
                    ['answer_text' => 'Passer le volant à un passager', 'is_correct' => false],
                ],
            ],
            // Question n°600
            [
                'question_text' => 'Lors d’un accident, s’il y a risque d’incendie :',
                'answers' => [
                    ['answer_text' => 'Je débranche la batterie des véhicules', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'Je maintien le contact des véhicules', 'is_correct' => false],
                    ['answer_text' => 'Je coupe le contact des véhicules', 'is_correct' => true], // Réponse c
                ],
            ],
            // Question n°601
            [
                'question_text' => 'De nuit pour signaler un accident :',
                'answers' => [
                    ['answer_text' => 'J’utilise les feux de mon véhicule', 'is_correct' => true], // Réponse a (Feux de détresse)
                    ['answer_text' => 'Je fais des signes avec une lampe de poche', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'Je place mes triangles de pré signalisation', 'is_correct' => true], // Réponse c
                ],
            ],
            // Question n°602
            [
                'question_text' => 'Lors d’un accident, le règlement à l’amiable est :',
                'answers' => [
                    ['answer_text' => 'Obligatoire', 'is_correct' => false],
                    ['answer_text' => 'Facultatif', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'Recommandé', 'is_correct' => true], // Réponse c
                ],
            ],
            // Question n°603
            [
                'question_text' => 'L’assurance minimum obligatoire :',
                'answers' => [
                    ['answer_text' => 'couvre les dommages occasionnés aux autres', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'couvre les dégâts occasionnés aux véhicules seulement', 'is_correct' => false],
                    ['answer_text' => 'est aussi appelée assurance aux tiers', 'is_correct' => true], // Réponse c
                ],
            ],
            // Question n°604
            [
                'question_text' => 'Si je suis témoin d’un accident, je dois :',
                'answers' => [
                    ['answer_text' => 'exposer ce que j’ai vu aux forces de l’ordre', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'remplir le contrat amiable', 'is_correct' => false],
                    ['answer_text' => 'déterminer les responsabilités', 'is_correct' => false],
                    ['answer_text' => 'laisser mes coordonnées pour un témoignage ultérieur', 'is_correct' => true], // Réponse d
                ],
            ],
            // Question n°605
            [
                'question_text' => 'En présence de blessés après un accident il faut :',
                'answers' => [
                    ['answer_text' => 'les couvrir', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'pratiquer les gestes qui sauvent', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'les faire boire pour éviter qu’ils ne se déshydratent', 'is_correct' => false],
                    ['answer_text' => 'les transporté sur l’accotement', 'is_correct' => false],
                ],
            ],
            // Question n°606
            [
                'question_text' => 'Lors de l’alerte des secours, j’indique :',
                'answers' => [
                    ['answer_text' => 'le lieu précis de l’accident', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'le numéro d’immatriculation des véhicules impliqués', 'is_correct' => false],
                    ['answer_text' => 'le nombre et le type de véhicules impliqués', 'is_correct' => true], // Réponse c
                    ['answer_text' => 'le nombre et l’état des blessés', 'is_correct' => true], // Réponse d
                ],
            ],
            // Question n°607
            [
                'question_text' => 'Protéger les lieux d’un accident, c’est :',
                'answers' => [
                    ['answer_text' => 'baliser les lieux pour éviter un autre accident', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'dégager complètement la chaussée', 'is_correct' => false],
                    ['answer_text' => 'barrer complètement la voie aux autres véhicules', 'is_correct' => false],
                ],
            ],
            // Question n°608
            [
                'question_text' => 'Après avoir déplacé un blessé, je le mets allongé sur:',
                'answers' => [
                    ['answer_text' => 'le coté', 'is_correct' => true], // Réponse a (PLS si inconscient et respire)
                    ['answer_text' => 'le dos', 'is_correct' => true], // Réponse b (Si conscient et pas de suspicion de traumatisme)
                    ['answer_text' => 'le ventre', 'is_correct' => false],
                ],
            ],
            // Question n°609
            [
                'question_text' => 'Si mon véhicule est immobilisé dangereusement sur la chaussée, je le déplace de préférence :',
                'answers' => [
                    ['answer_text' => 'en le poussant', 'is_correct' => false],
                    ['answer_text' => 'en enclenchant la 1ère ou la marche en arrière et en actionnant le démarreur', 'is_correct' => true], // Réponse b (Utiliser le démarreur pour un déplacement très court)
                    ['answer_text' => 'en faisant appel à des secours', 'is_correct' => false],
                ],
            ],
            // Question n°610
            [
                'question_text' => 'La présence à bord d’une boîte d’ampoule et de fusible de recharge est :',
                'answers' => [
                    ['answer_text' => 'obligatoire', 'is_correct' => false],
                    ['answer_text' => 'recommandée', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'inutile', 'is_correct' => false],
                ],
            ],
            // Question n°611
            [
                'question_text' => 'Le réglage de la hauteur des faisceaux lumineux du véhicule :',
                'answers' => [
                    ['answer_text' => 'dépend de la charge du véhicule', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'nécessite toujours l’intervention d’un spécialiste', 'is_correct' => false],
                    ['answer_text' => 'est effectué une fois pour toutes lors de la mise en circulation', 'is_correct' => false],
                ],
            ],
            // Question n°612
            [
                'question_text' => 'Pour remplir le réservoir de mon lave glace, j’utilise de préférence :',
                'answers' => [
                    ['answer_text' => 'de l’eau uniquement', 'is_correct' => false],
                    ['answer_text' => 'un produit détergent spécial', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'un détergent ménager', 'is_correct' => false],
                ],
            ],
            // Question n°613
            [
                'question_text' => 'Je dois faire vérifier l’équilibrage des roues de mon véhicule :',
                'answers' => [
                    ['answer_text' => 'après un choc violent contre un trottoir', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'en cas d’usure anormale de mes pneus', 'is_correct' => false],
                    ['answer_text' => 'je ressens des vibrations au niveau du volant', 'is_correct' => true], // Réponse c
                    ['answer_text' => 'si mon véhicule se déporte au freinage', 'is_correct' => false],
                ],
            ],
            // Question n°614
            [
                'question_text' => 'Parmi ces équipements, ceux qui déchargent le plus la batterie sont :',
                'answers' => [
                    ['answer_text' => 'l’autoradio', 'is_correct' => false],
                    ['answer_text' => 'les feux', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'le système dégivrage de la lunette arrière', 'is_correct' => true], // Réponse c
                ],
            ],
            // Question n° 615
            [
                'question_text' => 'Pour économiser du carburant, il faut :',
                'answers' => [
                    ['answer_text' => 'faire entretenir régulièrement son véhicule', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'éviter de rouler avec une galerie vide sur le toit', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'rouler le plus souvent possible en sous régime', 'is_correct' => false],
                    ['answer_text' => 'avoir les pneus bien gonflés', 'is_correct' => true], // Réponse d
                ],
            ],
            // Question n°616
            [
                'question_text' => 'Je dois faire vérifier le parallélisme des roues de mon véhicule :',
                'answers' => [
                    ['answer_text' => 'après un choc violent', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'en cas d’usure de mes pneus', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'si je ressens des vibrations au niveau du volant', 'is_correct' => false],
                    ['answer_text' => 'si mon véhicule se déporte', 'is_correct' => true], // Réponse d
                ],
            ],
            // Question n°617
            [
                'question_text' => 'L’installation au poste de conduite influence :',
                'answers' => [
                    ['answer_text' => 'la vision', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'le confort', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'la tenue de route', 'is_correct' => false],
                    ['answer_text' => 'la manipulation des commandes', 'is_correct' => true], // Réponse d
                ],
            ],
            // Question n°618
            [
                'question_text' => 'Il est indispensable de regarder dans ses rétroviseurs avant de :',
                'answers' => [
                    ['answer_text' => 'modifier sa trajectoire', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'activer ses clignotants', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'modifier son allure', 'is_correct' => true], // Réponse c
                ],
            ],
            // Question n°619
            [
                'question_text' => 'Les appels lumineux servent à signaler :',
                'answers' => [
                    ['answer_text' => 'une intention de dépasser', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'la présence de gendarmes', 'is_correct' => false],
                    ['answer_text' => 'l’approche à une intersection la nuit', 'is_correct' => true], // Réponse c
                ],
            ],
            // Question n°620
            [
                'question_text' => 'Je peux utiliser l’avertisseur sonore pour :',
                'answers' => [
                    ['answer_text' => 'avertir de ma présence un usager qui ne me regarde pas', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'signaler à un usager qu’il vient de commettre une faute', 'is_correct' => false],
                    ['answer_text' => 'Passer lorsque j’ai la priorité', 'is_correct' => false],
                ],
            ],
            // Question n°621
            [
                'question_text' => 'L’usage de l’avertisseur sonore est interdit :',
                'answers' => [
                    ['answer_text' => 'la nuit, uniquement en agglomération', 'is_correct' => false],
                    ['answer_text' => 'la nuit, en agglomération et hors agglomération', 'is_correct' => true], // Réponse b (Sauf danger immédiat)
                    ['answer_text' => 'le jour en agglomération sauf danger immédiat', 'is_correct' => true], // Réponse c
                ],
            ],
            // Question n°622
            [
                'question_text' => 'Avant de monter abord ou de descendre de mon véhicule je dois :',
                'answers' => [
                    ['answer_text' => 'm’assurer qu’il n’y aucun risque', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'contrôler que ma position ne gêne d’autres usagers', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'tenir compte les mouvements des autres usagers', 'is_correct' => true], // Réponse c
                ],
            ],
            // Question n°623
            [
                'question_text' => 'Lorsque la visibilité est réduite :',
                'answers' => [
                    ['answer_text' => 'je ralentis pour pouvoir m’arrêter le cas échéant', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'je ne ralentis pas car cela n’améliore pas la visibilité', 'is_correct' => false],
                ],
            ],
            // Question n°624
            [
                'question_text' => 'Lors d’un départ en cote, il faut desserrer le frein à main :',
                'answers' => [
                    ['answer_text' => 'avant de commencer à embrayer', 'is_correct' => false],
                    ['answer_text' => 'dès que l’on a trouvé le point de patinage', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'dès que l’on a fini d’embrayer', 'is_correct' => false],
                ],
            ],
            // Question n°625
            [
                'question_text' => 'Lors d’un arrêt en circulation, pour éviter de caler le moteur il faut :',
                'answers' => [
                    ['answer_text' => 'débrayer dès le début du freinage', 'is_correct' => false],
                    ['answer_text' => 'débrayer en fin de freinage seulement', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'débrayer avant de freiner', 'is_correct' => false],
                ],
            ],
            // Question n°626
            [
                'question_text' => 'Les mains sur le volant sont placées correctement sur le dessin :',
                // NOTE: Pas de dessin fourni, les réponses se basent sur les options de la source. La position correcte est 9h15 ou 10h10, on suppose que b et d correspondent à ces positions ou à deux positions correctes.
                'answers' => [
                    ['answer_text' => 'Dessin a', 'is_correct' => false],
                    ['answer_text' => 'Dessin b', 'is_correct' => true], // Réponse b
                    ['answer_text' => 'Dessin c', 'is_correct' => false],
                    ['answer_text' => 'Dessin d', 'is_correct' => true], // Réponse d
                ],
            ],
            // Question n°627
            [
                'question_text' => 'La rétrogradation permet :',
                'answers' => [
                    ['answer_text' => 'de ralentir le véhicule dans une descente', 'is_correct' => true], // Réponse a (Frein moteur)
                    ['answer_text' => 'de répartir après un ralentissement', 'is_correct' => true], // Réponse b (Se repositionner sur une vitesse plus basse pour relancer le véhicule)
                    ['answer_text' => 'd’arrêter le véhicule en circulation', 'is_correct' => false],
                ],
            ],
            // Question n°628
            [
                'question_text' => 'Le frein moteur intervient dès qu’on :',
                'answers' => [
                    ['answer_text' => 'lâche l’accélérateur', 'is_correct' => true], // Réponse a
                    ['answer_text' => 'appuie sur la pédale de frein', 'is_correct' => false],
                ],
            ],
        ];

        foreach ($questionsData as $order => $data) {
            $question = Question::create([
                'quiz_id' => $quizId,
                'question_text' => $data['question_text'],
                'type' => 'multiple_choice', // Type par défaut, à ajuster si besoin
                'order' => 508 + $order, // Numérotation basée sur 508
                // 'image' => null,
            ]);

            foreach ($data['answers'] as $answerData) {
                Answer::create([
                    'question_id' => $question->id,
                    'answer_text' => $answerData['answer_text'],
                    'is_correct' => $answerData['is_correct'],
                    // 'order' est géré implicitement par l'ordre d'insertion ou peut être ajouté manuellement si nécessaire
                ]);
            }
        }

        $this->command->info('Questions 508 à 628 ajoutées au Quiz ID ' . $quizId . ' avec succès.');
    }
}