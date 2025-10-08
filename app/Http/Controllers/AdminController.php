<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Module;
use App\Models\Course;
use App\Models\Quiz;
use App\Models\Payment;
use App\Models\QuizResult;
use Illuminate\Http\Request;
use App\Models\Question;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function index()
    {
        $stats = [
            'total_users' => User::where('is_admin', false)->count(),
            'total_modules' => Module::count(),
            'total_courses' => Course::count(),
            'total_quizzes' => Quiz::count(),
            'total_payments' => Payment::where('status', 'completed')->sum('amount'),
            'recent_users' => User::where('is_admin', false)->latest()->take(5)->get(),
            'recent_quiz_results' => QuizResult::with(['user', 'quiz.module'])->latest()->take(10)->get()
        ];

        return view('admin.dashboard', compact('stats'));
    }

    public function users(Request $request)
    {
        $query = User::where('is_admin', false);

        if ($request->has('search') && !empty($request->input('search'))) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $users = $query->latest()->paginate(20);
        return view('admin.users.index', compact('users'));
    }

    public function payments(Request $request)
    {
        $query = Payment::with('user');

        if ($request->has('status') && !empty($request->input('status'))) {
            $query->where('status', $request->input('status'));
        }

        $payments = $query->orderBy('created_at', 'desc')->paginate(20);
        return view('admin.payments.index', compact('payments'));
    }

    /**
     * Vérifier l'email d'un utilisateur
     */
    public function verifyUser(User $user)
    {
        if ($user->email_verified_at) {
            return redirect()->back()->with('error', 'L\'email de cet utilisateur est déjà vérifié.');
        }

        $user->email_verified_at = now();
        $user->save();

        return redirect()->back()->with('success', 'Email vérifié avec succès pour ' . $user->name);
    }

    /**
     * Supprimer un utilisateur
     */
    public function destroyUser(User $user)
    {
        if ($user->is_admin || $user->role === 'admin') {
            return redirect()->back()->with('error', 'Impossible de supprimer un administrateur.');
        }

        $userName = $user->name;
        
        try {
            // Supprimer les résultats de quiz associés
            $user->quizResults()->delete();
            
            // Supprimer les paiements associés
            $user->payments()->delete();
            
            // Supprimer l'utilisateur
            $user->delete();

            return redirect()->back()->with('success', 'Utilisateur "' . $userName . '" supprimé avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erreur lors de la suppression de l\'utilisateur.');
        }
    }

    /**
     * Changer le statut d'un utilisateur (activer/suspendre)
     */
    public function toggleUserStatus(User $user)
    {
        if ($user->is_admin || $user->role === 'admin') {
            return response()->json(['error' => 'Impossible de modifier le statut d\'un administrateur.'], 403);
        }

        // Toggle du statut de vérification email (simple implémentation)
        if ($user->email_verified_at) {
            $user->email_verified_at = null;
            $message = 'Utilisateur suspendu';
        } else {
            $user->email_verified_at = now();
            $message = 'Utilisateur activé';
        }

        $user->save();

        return response()->json(['success' => true, 'message' => $message]);
    }

    /**
     * Obtenir les détails d'un utilisateur
     */
    public function getUserDetails(User $user)
    {
        $user->load(['quizResults.quiz.module', 'payments']);

        return response()->json([
            'user' => $user,
            'stats' => [
                'total_quiz_attempts' => $user->quizResults->count(),
                'passed_quizzes' => $user->quizResults->where('passed', true)->count(),
                'average_score' => $user->quizResults->avg('score'),
                'total_payments' => $user->payments->where('status', 'completed')->sum('amount'),
                'progress_percentage' => method_exists($user, 'getProgressPercentage') ? $user->getProgressPercentage() : 0,
                'completed_modules' => method_exists($user, 'getCompletedModulesCount') ? $user->getCompletedModulesCount() : 0,
            ]
        ]);
    }
     public function userResults($userId)
    {
        $user = User::findOrFail($userId);
        $results = QuizResult::with(['quiz.module'])
            ->where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.users.results', compact('user', 'results'));
    }

    /**
     * Afficher les détails d'un résultat spécifique
     */
    public function resulttDetails($resultId)
    {
        $result = QuizResult::with(['quiz.module', 'user', 'quiz.questions.answers'])
            ->findOrFail($resultId);

        return view('admin.users.result-details', compact('result'));
    }

    /**
     * API pour récupérer les résultats d'un utilisateur (AJAX)
     */
    public function getUserQuizResults(Request $request, $userId)
    {
        $user = User::findOrFail($userId);
        
        $results = QuizResult::with(['quiz.module'])
            ->where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'success' => true,
            'user' => $user,
            'results' => $results
        ]);
    }
    

public function mockExams()
{
    $mockExams = Quiz::mockExams()
        ->withCount('questions')
        ->orderBy('created_at', 'desc')
        ->paginate(10);
    
    $allQuestions = Question::with('quiz.module')->get();
    
    return view('admin.mock-exams.index', compact('mockExams', 'allQuestions'));
}

// AdminController.php
public function destroyMockExam(Quiz $quiz)
{
    if (!$quiz->isMockExam()) {
        abort(404);
    }

    try {
        // Supprimer les questions et réponses associées
        foreach ($quiz->questions as $question) {
            $question->answers()->delete();
            $question->delete();
        }

        // Supprimer les résultats de quiz associés
        $quiz->userResults()->delete();

        // Supprimer le quiz
        $quiz->delete();

        return redirect()->route('admin.mock-exams.index')
            ->with('success', 'Examen blanc supprimé avec succès !');

    } catch (\Exception $e) {
        Log::error('Erreur lors de la suppression de l\'examen blanc: ' . $e->getMessage());
        
        return redirect()->route('admin.mock-exams.index')
            ->with('error', 'Erreur lors de la suppression de l\'examen blanc.');
    }
}

public function storeMockExam(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'time_limit' => 'required|integer|min:1',
        'passing_score' => 'required|integer|min:0|max:100',
        'selected_questions' => 'required|array|min:1',
        'selected_questions.*' => 'exists:questions,id',
        'is_active' => 'boolean'
    ]);

    DB::beginTransaction();
    
    try {
        // Créer le quiz examen blanc avec module_id null et is_mock_exam true
        $quiz = Quiz::create([
            'module_id' => null, // Pas de module associé
            'title' => $validated['title'],
            'description' => $validated['description'],
            'time_limit' => $validated['time_limit'],
            'passing_score' => $validated['passing_score'],
            'is_active' => $validated['is_active'] ?? true,
            'is_mock_exam' => true, // Marquer comme examen blanc
        ]);

        // Associer les questions sélectionnées
        foreach ($validated['selected_questions'] as $questionId) {
            $question = Question::find($questionId);
            
            // Créer une copie de la question pour l'examen blanc
            $newQuestion = $question->replicate();
            $newQuestion->quiz_id = $quiz->id;
            $newQuestion->save();

            // Copier les réponses
            foreach ($question->answers as $answer) {
                $newAnswer = $answer->replicate();
                $newAnswer->question_id = $newQuestion->id;
                $newAnswer->save();
            }
        }

        DB::commit();

        return redirect()->route('admin.mock-exams.index')
            ->with('success', 'Examen blanc créé avec succès !');

    } catch (\Exception $e) {
        DB::rollBack();
        Log::error('Erreur lors de la création de l\'examen blanc: ' . $e->getMessage());
        
        return redirect()->back()
            ->withInput()
            ->with('error', 'Erreur lors de la création de l\'examen blanc: ' . $e->getMessage());
    }
}



public function updateMockExam(Request $request, Quiz $quiz)
{
    if (!$quiz->isMockExam()) {
        abort(404);
    }

    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'time_limit' => 'required|integer|min:1',
        'passing_score' => 'required|integer|min:0|max:100',
        'selected_questions' => 'required|array|min:1',
        'selected_questions.*' => 'exists:questions,id',
        'is_active' => 'boolean'
    ]);

    DB::beginTransaction();
    
    try {
        // Mettre à jour le quiz
        $quiz->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'time_limit' => $validated['time_limit'],
            'passing_score' => $validated['passing_score'],
            'is_active' => $validated['is_active'] ?? $quiz->is_active,
            'is_mock_exam' => true,
        ]);

        // Supprimer les anciennes questions
        $quiz->questions()->delete();

        // Ajouter les nouvelles questions avec vérification
        foreach ($validated['selected_questions'] as $questionId) {
            $question = Question::find($questionId);
            
            // Vérifier que la question existe
            if (!$question) {
                throw new \Exception("Question avec ID {$questionId} non trouvée");
            }
            
            // Créer une copie de la question
            $newQuestion = $question->replicate();
            $newQuestion->quiz_id = $quiz->id;
            $newQuestion->save();

            // Copier les réponses
            foreach ($question->answers as $answer) {
                $newAnswer = $answer->replicate();
                $newAnswer->question_id = $newQuestion->id;
                $newAnswer->save();
            }
        }

        DB::commit();

        return redirect()->route('admin.mock-exams.index')
            ->with('success', 'Examen blanc mis à jour avec succès !');

    } catch (\Exception $e) {
        DB::rollBack();
        Log::error('Erreur lors de la mise à jour de l\'examen blanc: ' . $e->getMessage());
        
        return redirect()->back()
            ->withInput()
            ->with('error', 'Erreur lors de la mise à jour de l\'examen blanc: ' . $e->getMessage());
    }
}

public function createMockExam()
{
    $questions = Question::with(['quiz.module', 'answers'])->get();
    $modules = Module::all(); // Pour le filtre
    
    return view('admin.mock-exams.create', compact('questions', 'modules'));
}

public function editMockExam(Quiz $quiz)
{
    if (!$quiz->isMockExam()) {
        abort(404);
    }

    $questions = Question::with(['quiz.module', 'answers'])->get();
    $selectedQuestions = $quiz->questions->pluck('id')->toArray();
    $modules = Module::all();

    return view('admin.mock-exams.edit', compact('quiz', 'questions', 'selectedQuestions', 'modules'));
}

public function resultDetails($resultId)
{
    $result = QuizResult::with([
        'quiz.module', 
        'user', 
        'quiz.questions.answers' // Charger les questions et réponses du quiz
    ])->findOrFail($resultId);

    // Reconstruire les detailed_results si ils sont manquants
    if (!$result->detailed_results || !is_array($result->detailed_results)) {
        $result = $this->rebuildDetailedResults($result);
    }

    // Calculer les statistiques des examens pour cet utilisateur
    $examStats = $this->getUserExamStats($result->user_id);
    
    return view('admin.users.result-details', compact('result', 'examStats'));
}

/**
 * Reconstruire les detailed_results si ils sont manquants
 */
private function rebuildDetailedResults($result)
{
    $detailedResults = [];
    $answers = $result->answers ?? [];
    
    foreach ($result->quiz->questions as $index => $question) {
        $userAnswerIds = $answers[$question->id] ?? [];
        
        // Si c'est une réponse unique, convertir en tableau
        if (!is_array($userAnswerIds)) {
            $userAnswerIds = [$userAnswerIds];
        }
        
        $correctAnswerIds = $question->answers->where('is_correct', true)->pluck('id')->toArray();
        $userAnswers = $question->answers->whereIn('id', $userAnswerIds);
        
        // Vérifier si la réponse est correcte
        $isCorrect = false;
        if (count($correctAnswerIds) > 0) {
            $allCorrectSelected = count(array_intersect($userAnswerIds, $correctAnswerIds)) === count($correctAnswerIds);
            $noIncorrectSelected = count(array_diff($userAnswerIds, $correctAnswerIds)) === 0;
            $isCorrect = $allCorrectSelected && $noIncorrectSelected;
        }
        
        $detailedResults[] = [
            'question_id' => $question->id,
            'question_text' => $question->question_text,
            'image' => $question->image,
            'user_answer_ids' => $userAnswerIds,
            'user_answers_text' => $userAnswers->pluck('answer_text')->toArray(),
            'correct_answer_ids' => $correctAnswerIds,
            'correct_answers_text' => $question->answers->where('is_correct', true)->pluck('answer_text')->toArray(),
            'is_correct' => $isCorrect,
            'is_multiple_choice' => count($correctAnswerIds) > 1,
            'explanation' => $question->explanation
        ];
    }
    
    // Mettre à jour le résultat avec les detailed_results reconstruits
    $result->detailed_results = $detailedResults;
    
    return $result;
}

/**
 * Obtenir les statistiques des examens pour un utilisateur
 */
private function getUserExamStats($userId)
{
    $userResults = QuizResult::where('user_id', $userId)
        ->with('quiz')
        ->get();

    $totalExams = $userResults->count();
    $passedExams = $userResults->where('passed', true)->count();
    $averageScore = $userResults->avg('score');
    
    // Statistiques par type (module vs examen blanc)
    $moduleExams = $userResults->filter(function($result) {
        return $result->quiz && $result->quiz->module_id !== null;
    });
    
    $mockExams = $userResults->filter(function($result) {
        return $result->quiz && $result->quiz->is_mock_exam;
    });

    return [
        'total_exams' => $totalExams,
        'passed_exams' => $passedExams,
        'failed_exams' => $totalExams - $passedExams,
        'success_rate' => $totalExams > 0 ? round(($passedExams / $totalExams) * 100, 1) : 0,
        'average_score' => round($averageScore, 1),
        'module_exams_count' => $moduleExams->count(),
        'mock_exams_count' => $mockExams->count(),
        'module_exams_success_rate' => $moduleExams->count() > 0 ? 
            round(($moduleExams->where('passed', true)->count() / $moduleExams->count()) * 100, 1) : 0,
        'mock_exams_success_rate' => $mockExams->count() > 0 ? 
            round(($mockExams->where('passed', true)->count() / $mockExams->count()) * 100, 1) : 0,
    ];
}

}