<?php
namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Answer;
use App\Models\QuizResult;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function show(Module $module)
    {
        $quiz = $module->quiz()->with(['questions.answers'])->first();
        
        if (!$quiz) {
            return redirect()->route('modules.show', $module)
                ->with('error', 'Aucun quiz disponible pour ce module.');
        }

        $user = auth()->user();
        $lastResult = $quiz->userResults()->where('user_id', $user->id)->latest()->first();

        return view('quiz.show', compact('module', 'quiz', 'lastResult'));
    }

    public function submit(Request $request, Module $module)
    {
        $quiz = $module->quiz()->with(['questions.answers'])->first();
        
        if (!$quiz) {
            return redirect()->route('modules.show', $module)
                ->with('error', 'Quiz introuvable.');
        }

        $answers = $request->input('answers', []);
        $correctAnswers = 0;
        $totalQuestions = $quiz->questions->count();

        foreach ($quiz->questions as $question) {
            $userAnswerId = $answers[$question->id] ?? null;
            $correctAnswer = $question->correctAnswer;
            
            if ($userAnswerId && $correctAnswer && $userAnswerId == $correctAnswer->id) {
                $correctAnswers++;
            }
        }

        $score = $totalQuestions > 0 ? round(($correctAnswers / $totalQuestions) * 100) : 0;
        $passed = $score >= $quiz->passing_score;

        QuizResult::create([
            'user_id' => auth()->id(),
            'quiz_id' => $quiz->id,
            'score' => $score,
            'total_questions' => $totalQuestions,
            'correct_answers' => $correctAnswers,
            'passed' => $passed,
            'time_taken' => $request->input('time_taken', 0),
            'answers' => $answers
        ]);

        return redirect()->route('modules.show', $module)
            ->with($passed ? 'success' : 'error', 
                $passed ? "Félicitations! Vous avez réussi avec $score%." : "Score: $score%. Réessayez pour améliorer votre score.");
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
        return view('quizzes.create', compact('modules'));
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

        return redirect()->route('quizzes.index')->with('success', 'Quiz créé avec succès!');
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

        return redirect()->route('quizzes.index')->with('success', 'Quiz mis à jour avec succès!');
    }

    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        return redirect()->route('quizzes.index')->with('success', 'Quiz supprimé avec succès!');
    }
}
