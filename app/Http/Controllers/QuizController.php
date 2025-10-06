<?php
namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Answer;
use App\Models\QuizResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class QuizController extends Controller
{
    // This method is for showing a quiz that belongs to a module
    public function show(Module $module)
    {
        $quiz = $module->quiz()->with(['questions.answers'])->first();
        
        if (!$quiz) {
            return redirect()->route('modules.show', $module)
                ->with('error', 'Aucun quiz disponible pour ce module.');
        }

        $user = auth()->user();
        $lastResult = $quiz->userResults()->where('user_id', $user->id)->latest()->first();

        return view('admin.quiz.show', compact('module', 'quiz', 'lastResult'));
    }

    // This method is for showing a quiz directly by its ID
    public function showByQuiz(Quiz $quiz)
    {
        $module = $quiz->module;

        if (!$quiz) {
            return redirect()->route('dashboard')->with('error', 'Quiz introuvable.');
        }

        $user = auth()->user();
        $lastResult = $quiz->userResults()->where('user_id', $user->id)->latest()->first();

        return view('quizzes.show', compact('module', 'quiz', 'lastResult'));
    }

    public function submit(Request $request, Module $module)
    {
        try {
            // Validation des données
            $request->validate([
                'answers' => 'required|array',
                'answers.*' => 'required|integer',
                'time_taken' => 'nullable|integer|min:0'
            ]);

            $quiz = $module->quiz()->with(['questions.answers'])->first();
            
            if (!$quiz) {
                return redirect()->route('modules.show', $module)
                    ->with('error', 'Quiz introuvable.');
            }

            // Vérifier que l'utilisateur n'a pas déjà passé le quiz récemment
            $user = auth()->user();
            $recentResult = $quiz->userResults()
                ->where('user_id', $user->id)
                ->where('created_at', '>', now()->subMinutes(5))
                ->first();

            if ($recentResult) {
                return redirect()->route('modules.show', $module)
                    ->with('error', 'Vous devez attendre 5 minutes avant de repasser ce quiz.');
            }

            $answers = $request->input('answers', []);
            $correctAnswers = 0;
            $totalQuestions = $quiz->questions->count();
            $detailedResults = [];

            // Vérifier que toutes les questions ont une réponse
            if (count($answers) < $totalQuestions) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Veuillez répondre à toutes les questions.');
            }

            DB::beginTransaction();

            foreach ($quiz->questions as $question) {
                $userAnswerId = $answers[$question->id] ?? null;
                $correctAnswer = $question->answers()->where('is_correct', true)->first();
                $userAnswer = $question->answers()->find($userAnswerId);
                
                $isCorrect = $correctAnswer && $userAnswerId == $correctAnswer->id;
                
                if ($isCorrect) {
                    $correctAnswers++;
                }

                $detailedResults[] = [
                    'question_id' => $question->id,
                    'question_text' => $question->question_text,
                    'user_answer_id' => $userAnswerId,
                    'user_answer_text' => $userAnswer ? $userAnswer->answer_text : null,
                    'correct_answer_id' => $correctAnswer ? $correctAnswer->id : null,
                    'correct_answer_text' => $correctAnswer ? $correctAnswer->answer_text : null,
                    'is_correct' => $isCorrect
                ];
            }

            $score = $totalQuestions > 0 ? round(($correctAnswers / $totalQuestions) * 100) : 0;
            $passed = $score >= $quiz->passing_score;

            $quizResult = QuizResult::create([
                'user_id' => $user->id,
                'quiz_id' => $quiz->id,
                'score' => $score,
                'total_questions' => $totalQuestions,
                'correct_answers' => $correctAnswers,
                'passed' => $passed,
                'time_taken' => $request->input('time_taken', 0),
                'answers' => $answers,
                'detailed_results' => $detailedResults
            ]);

            DB::commit();

            // Messages personnalisés selon le score
            if ($passed) {
                if ($score == 100) {
                    $message = "🎉 Parfait ! Vous avez obtenu 100% ! Excellent travail !";
                } elseif ($score >= 90) {
                    $message = "🌟 Très bien ! Vous avez obtenu {$score}% ! Presque parfait !";
                } else {
                    $message = "👍 Félicitations ! Vous avez réussi avec {$score}% !";
                }
                $messageType = 'success';
            } else {
                if ($score >= 50) {
                    $message = "📚 Score : {$score}%. Vous y êtes presque ! Révisez et réessayez.";
                } else {
                    $message = "📖 Score : {$score}%. Il faut réviser le module avant de reprendre le quiz.";
                }
                $messageType = 'warning';
            }

            // Stocker les résultats en session pour l'affichage
            return redirect()->route('modules.show', $module)
                ->with($messageType, $message)
                ->with('quiz_result_id', $quizResult->id)
                ->with('quiz_score', $score)
                ->with('quiz_correct_answers', $correctAnswers)
                ->with('quiz_total_questions', $totalQuestions)
                ->with('detailed_results', $detailedResults);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Erreur lors de la soumission du quiz: ' . $e->getMessage());
            
            return redirect()->back()
                ->withInput()
                ->with('error', 'Une erreur est survenue lors de la validation. Veuillez réessayer.');
        }
    }

    // Admin methods pour Quiz
    public function index()
    {
        $quizzes = Quiz::with('module')->paginate(20);
        return view('admin.quizzes.index', compact('quizzes'));
    }

    public function create()
    {
        $modules = Module::where('is_active', true)->orderBy('order')->get();
        return view('admin.quizzes.create', compact('modules'));
    }

    public function adminShow(Quiz $quiz)
    {
        $quiz->load(['questions.answers', 'module']);
        return view('admin.quizzes.show', compact('quiz'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'module_id' => 'required|exists:modules,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'time_limit' => 'nullable|integer|min:1',
            'passing_score' => 'required|integer|min:0|max:100',
            'is_active' => 'boolean'
        ]);

        Quiz::create($validated);

        return redirect()->route('admin.quizzes.index')->with('success', 'Quiz créé avec succès!');
    }

    public function edit(Quiz $quiz)
    {
        $modules = Module::where('is_active', true)->orderBy('order')->get();
        $quiz->load(['questions.answers']);
        return view('admin.quizzes.edit', compact('quiz', 'modules'));
    }

    public function update(Request $request, Quiz $quiz)
    {
        $validated = $request->validate([
            'module_id' => 'required|exists:modules,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'time_limit' => 'nullable|integer|min:1',
            'passing_score' => 'required|integer|min:0|max:100',
            'is_active' => 'boolean'
        ]);

        $quiz->update($validated);

        return redirect()->route('admin.quizzes.index')->with('success', 'Quiz mis à jour avec succès!');
    }

    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        return redirect()->route('admin.quizzes.index')->with('success', 'Quiz supprimé avec succès!');
    }

    /**
     * Récupérer les résultats détaillés d'un quiz pour un utilisateur
     */
    public function getQuizResults(Request $request, Module $module, $resultId = null)
    {
        $user = auth()->user();
        
        if ($resultId) {
            $result = QuizResult::where('id', $resultId)
                ->where('user_id', $user->id)
                ->first();
        } else {
            $result = QuizResult::where('quiz_id', $module->quiz->id)
                ->where('user_id', $user->id)
                ->latest()
                ->first();
        }
        
        if (!$result) {
            return response()->json(['error' => 'Résultat non trouvé'], 404);
        }
        
        return response()->json([
            'success' => true,
            'result' => $result,
            'detailed_results' => $result->detailed_results
        ]);
    }

    // Méthodes pour les examens blancs (mock exams)

public function examIndex(Request $request)
{
    $user = $request->user();

    // Récupérer les examens blancs actifs
    $mockExams = Quiz::mockExams()
        ->where('is_active', true)
        ->withCount('questions')
        ->get();
    
    // Statistiques mises à jour
    $totalQuestions = Question::count();
    $completedExams = $user->quizResults()->where('is_mock_exam', true)->count();
    
    // Calcul du score moyen
    $averageScore = $user->quizResults()
        ->where('is_mock_exam', true)
        ->avg('score') ?? 0;
    $averageScore = round($averageScore);

    // Examens récents
    $recentExams = $user->quizResults()
        ->where('is_mock_exam', true)
        ->with('quiz')
        ->orderByDesc('created_at')
        ->limit(5)
        ->get();

    return view('examens.index', compact(
        'mockExams', 
        'totalQuestions', 
        'completedExams', 
        'averageScore', 
        'recentExams'
    ));
}

public function startExam(?Quiz $exam = null)
{
    $user = auth()->user();

    if ($exam) {
        // Examen blanc spécifique créé par l'admin
        if (!$exam->isMockExam() || !$exam->is_active) {
            abort(404);
        }
        
        $questions = $exam->questions()->with('answers')->get();
        $timeLimit = $exam->time_limit;
    } else {
        // Examen blanc aléatoire (comportement actuel)
        $questions = Question::with('answers')->inRandomOrder()->get();
        $timeLimit = 30; // Durée par défaut
    }

    if ($questions->isEmpty()) {
        return redirect()->route('examens.index')->with('error', 'Aucune question disponible pour l\'examen blanc.');
    }

    return view('examens.start', compact('questions', 'exam', 'timeLimit'));
}


public function showResults($resultId)
{
    $user = auth()->user();
    
    // Récupérer le résultat du quiz
    $quizResult = QuizResult::where('id', $resultId)
        ->where('user_id', $user->id)
        ->with(['quiz'])
        ->firstOrFail();

    // Les résultats détaillés sont déjà dans la colonne detailed_results
    $detailedResults = $quizResult->detailed_results ?? [];

    // Récupérer l'examen si c'est un examen spécifique
    $exam = $quizResult->quiz_id ? Quiz::find($quizResult->quiz_id) : null;

    return view('examens.results', compact('quizResult', 'exam', 'detailedResults'));
}

/**
 * Traiter la soumission de l'examen et rediriger vers les résultats
 */
public function submitExam(Request $request, ?Quiz $exam = null)
{
    try {
        $request->validate([
            'answers' => 'required|array',
            'answers.*' => 'required|integer',
            'time_taken' => 'nullable|integer|min:0'
        ]);

        $user = auth()->user();
        $answers = $request->input('answers', []);

        if ($exam) {
            // Examen blanc spécifique
            $questions = $exam->questions()->with('answers')->get();
            $quizId = $exam->id;
            $passingScore = $exam->passing_score;
        } else {
            // Examen blanc aléatoire
            $questions = Question::with('answers')->get();
            $quizId = null;
            $passingScore = 70; // Score par défaut
        }

        $totalQuestions = $questions->count();
        $correctAnswers = 0;
        $detailedResults = [];

        if (count($answers) < $totalQuestions) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Veuillez répondre à toutes les questions.');
        }

        DB::beginTransaction();

        foreach ($questions as $question) {
            $userAnswerId = $answers[$question->id] ?? null;
            $correctAnswer = $question->answers()->where('is_correct', true)->first();
            $userAnswer = $question->answers()->find($userAnswerId);
            
            $isCorrect = $correctAnswer && $userAnswerId == $correctAnswer->id;
            
            if ($isCorrect) {
                $correctAnswers++;
            }

            $detailedResults[] = [
                'question_id' => $question->id,
                'question_text' => $question->question_text,
                'user_answer_id' => $userAnswerId,
                'user_answer_text' => $userAnswer ? $userAnswer->answer_text : null,
                'correct_answer_id' => $correctAnswer ? $correctAnswer->id : null,
                'correct_answer_text' => $correctAnswer ? $correctAnswer->answer_text : null,
                'is_correct' => $isCorrect
            ];
        }

        $score = $totalQuestions > 0 ? round(($correctAnswers / $totalQuestions) * 100) : 0;
        $passed = $score >= $passingScore;

        $quizResult = QuizResult::create([
            'user_id' => $user->id,
            'quiz_id' => $quizId,
            'score' => $score,
            'total_questions' => $totalQuestions,
            'correct_answers' => $correctAnswers,
            'passed' => $passed,
            'time_taken' => $request->input('time_taken', 0),
            'answers' => $answers,
            'detailed_results' => $detailedResults,
            'is_mock_exam' => true
        ]);

        DB::commit();

        // Rediriger vers la page de résultats au lieu de l'index
        return redirect()->route('examens.results', $quizResult->id)
            ->with('success', 'Examen terminé avec succès !');

    } catch (\Exception $e) {
        DB::rollBack();
        Log::error('Erreur lors de la soumission de l\'examen blanc: ' . $e->getMessage());
        
        return redirect()->back()
            ->withInput()
            ->with('error', 'Une erreur est survenue lors de la validation. Veuillez réessayer.');
    }
}

}