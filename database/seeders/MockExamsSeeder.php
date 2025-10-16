<?php
// database/seeders/MockExamsSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Module;
use App\Models\Answer;

class MockExamsSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info("🚀 Démarrage de la création des examens blancs...");

        // Étape 1: Supprimer tous les examens blancs existants et leurs questions
        $this->deleteExistingMockExams();

        // Étape 2: Vérifier les données disponibles
        $modules = Module::where('is_active', true)->get();
        $allQuestions = Question::with('answers')->get();
        
        if ($modules->isEmpty() || $allQuestions->count() < 20) {
            $this->command->error('❌ Données insuffisantes. Modules: ' . $modules->count() . ', Questions: ' . $allQuestions->count());
            return;
        }

        $this->command->info("📊 Questions disponibles: " . $allQuestions->count());
        $this->command->info("📚 Modules disponibles: " . $modules->count());

        // Étape 3: Créer les 30 examens blancs
        $this->createMockExams($modules, $allQuestions);

        $this->command->info("\n🎉 CRÉATION TERMINÉE !");
        $this->displayFinalStatistics();
    }

    /**
     * Supprimer tous les examens blancs existants
     */
    private function deleteExistingMockExams(): void
    {
        $this->command->info("🗑️  Suppression des examens blancs existants...");
        
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        
        // Récupérer tous les examens blancs
        $mockExams = Quiz::where('is_mock_exam', true)->get();
        
        if ($mockExams->isNotEmpty()) {
            // Supprimer toutes les questions et réponses associées
            foreach ($mockExams as $exam) {
                $questions = Question::where('quiz_id', $exam->id)->get();
                foreach ($questions as $question) {
                    // Supprimer les réponses de la question
                    Answer::where('question_id', $question->id)->delete();
                    // Supprimer la question
                    $question->delete();
                }
            }
            
            // Supprimer les examens
            Quiz::where('is_mock_exam', true)->delete();
            $this->command->info("✅ " . $mockExams->count() . " examens blancs supprimés");
        } else {
            $this->command->info("ℹ️  Aucun examen blanc existant à supprimer");
        }
        
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }

    /**
     * Créer les 30 examens blancs
     */
    private function createMockExams($modules, $allQuestions): void
    {
        $createdExams = 0;

        for ($i = 1; $i <= 30; $i++) {
            try {
                // Sélectionner un module aléatoire pour cet examen
                $randomModule = $modules->random();
                
                // Sélectionner 20 questions aléatoires parmi TOUTES les questions
                $selectedQuestions = $allQuestions->shuffle()->take(20);

                // Créer l'examen blanc avec titre simplifié
                $exam = Quiz::create([
                    'module_id' => $randomModule->id,
                    'title' => "Examen Blanc " . $i,
                    'description' => $this->generateExamDescription($i, $randomModule->title, $selectedQuestions->count()),
                    'time_limit' => 30,
                    'passing_score' => 70,
                    'is_active' => true,
                    'is_mock_exam' => true,
                ]);

                // Créer des copies des questions sélectionnées pour cet examen
                $this->createQuestionsForExam($exam, $selectedQuestions, $i);
                
                $createdExams++;
                
                $this->command->info("✅ Examen Blanc " . $i . " créé");
                $this->command->info("   📍 Module: " . $randomModule->title . " | ❓ Questions: " . $selectedQuestions->count());

            } catch (\Exception $e) {
                $this->command->error("❌ Erreur lors de la création de l'examen " . $i . ": " . $e->getMessage());
            }
        }

        $this->command->info("\n📊 " . $createdExams . " examens blancs créés avec succès");
    }

    /**
     * Créer les questions pour un examen (copies des questions originales)
     */
    private function createQuestionsForExam(Quiz $exam, $selectedQuestions, int $examNumber): void
    {
        $questionOrder = 1;
        $questionsCreated = 0;
        
        foreach ($selectedQuestions as $originalQuestion) {
            try {
                // Créer une nouvelle question pour cet examen (copie)
                $newQuestion = Question::create([
                    'quiz_id' => $exam->id,
                    'question_text' => $originalQuestion->question_text,
                    'image' => $originalQuestion->image,
                    'type' => $originalQuestion->type,
                    'order' => $questionOrder,
                ]);

                // Copier toutes les réponses de la question originale
                foreach ($originalQuestion->answers as $originalAnswer) {
                    $newQuestion->answers()->create([
                        'answer_text' => $originalAnswer->answer_text,
                        'is_correct' => $originalAnswer->is_correct,
                        'order' => $originalAnswer->order,
                    ]);
                }

                $questionOrder++;
                $questionsCreated++;
                
            } catch (\Exception $e) {
                $this->command->error("   ❌ Erreur création question pour Examen Blanc {$examNumber}: " . $e->getMessage());
            }
        }

        $this->command->info("   📋 " . $questionsCreated . " questions créées pour l'Examen Blanc " . $examNumber);
    }

    /**
     * Générer une description pour l'examen
     */
    private function generateExamDescription(int $examNumber, string $moduleTitle, int $questionCount): string
    {
        $descriptions = [
            "Examen blanc complet avec {$questionCount} questions sélectionnées aléatoirement parmi tous les modules. Testez vos connaissances de manière exhaustive.",
            "Simulation d'examen officiel comprenant {$questionCount} questions variées provenant de l'ensemble du programme. Préparation intensive garantie.",
            "Test d'évaluation globale avec {$questionCount} questions couvrant tous les aspects de la formation. Mesurez votre niveau de maîtrise.",
            "Examen de synthèse incluant {$questionCount} questions sélectionnées parmi tous les modules. Excellent pour les révisions complètes.",
            "Simulation complète avec {$questionCount} questions soigneusement choisies dans l'ensemble de la base de données. Conditions réelles d'examen.",
            "Test de préparation avancée comprenant {$questionCount} questions challenges issues de tous les modules. Perfectionnez-vous !",
            "Examen blanc de validation avec {$questionCount} questions couvrant l'ensemble des compétences requises pour la certification.",
            "Simulation d'examen final incluant {$questionCount} questions représentatives de tous les modules du programme.",
            "Test d'aptitude complet de {$questionCount} questions pour évaluer votre readiness à l'examen officiel. Tous modules confondus.",
            "Examen de révision générale avec {$questionCount} questions soigneusement choisies parmi l'ensemble du programme de formation."
        ];

        $baseDescription = $descriptions[array_rand($descriptions)];
        
        return "Examen Blanc {$examNumber} - {$baseDescription} Durée: 30 minutes. Score de passage: 70%.";
    }

    /**
     * Afficher les statistiques finales
     */
    private function displayFinalStatistics(): void
    {
        $mockExams = Quiz::where('is_mock_exam', true)
            ->withCount('questions')
            ->with('module')
            ->get();

        $totalQuestionsInExams = $mockExams->sum('questions_count');
        $totalQuestionsCreated = Question::whereIn('quiz_id', $mockExams->pluck('id'))->count();
        $totalAnswersCreated = Answer::whereIn('question_id', 
            Question::whereIn('quiz_id', $mockExams->pluck('id'))->pluck('id')
        )->count();
        
        $this->command->info("\n📈 STATISTIQUES DÉTAILLÉES:");
        $this->command->info("===========================");
        $this->command->info("🏁 Examens créés: " . $mockExams->count());
        $this->command->info("❓ Questions totales dans les examens: " . $totalQuestionsInExams);
        $this->command->info("📋 Questions créées (copies): " . $totalQuestionsCreated);
        $this->command->info("🎯 Réponses créées: " . $totalAnswersCreated);
        
        // Répartition par module
        $this->command->info("\n📚 RÉPARTITION PAR MODULE:");
        $moduleStats = $mockExams->groupBy('module.title')
            ->map(function($exams) {
                return $exams->count();
            });
            
        foreach ($moduleStats as $moduleName => $examCount) {
            $this->command->info("   📍 {$moduleName}: {$examCount} examens");
        }

        $this->command->info("\n⭐ CARACTÉRISTIQUES:");
        $this->command->info("====================");
        $this->command->info("🎯 Chaque examen: 20 questions aléatoires");
        $this->command->info("📚 Questions provenant de: TOUS les modules");
        $this->command->info("⏱ Durée: 30 minutes par examen");
        $this->command->info("📈 Score de passage: 70%");
        $this->command->info("🔗 Chaque examen lié à un module (pour l'organisation)");
        
        // Liste des examens créés
        $this->command->info("\n📝 LISTE DES EXAMENS CRÉÉS:");
        $this->command->info("===========================");
        foreach ($mockExams as $exam) {
            $this->command->info("   ✅ " . $exam->title . " - " . $exam->questions_count . " questions");
        }
    }
}