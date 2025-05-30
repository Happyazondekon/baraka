<?php
namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Answer;
use App\Models\QuizResult;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function create(Request $request)
    {
        $quiz = Quiz::findOrFail($request->query('quiz_id'));
        return view('admin.questions.create', compact('quiz'));
    }

    public function store(Request $request)
    {
        // Validation des champs
        $validated = $request->validate([
            'quiz_id' => 'required|exists:quizzes,id',
            'question' => 'required|string',
            'options' => 'required|array|min:1|max:4',
            'options.*.text' => 'required|string',
            'correct_option' => 'required|integer|min:0|max:3',
            'explanation' => 'nullable|string',
            'points' => 'required|integer|min:1',
            'order' => 'required|integer|min:1',
            // 'image' => 'required|string',
        ]);

        // Enregistrement de la question
        $question = Question::create([
            'quiz_id' => $validated['quiz_id'],
            'question_text' => $validated['question'],
            'type' => 'multiple_choice',
            'order' => $validated['order'],
            'image' => null, 
            'explanation' => $validated['explanation'] ?? null,
            'points' => $validated['points'],
        ]);

        // Création des réponses
        foreach ($validated['options'] as $index => $option) {
            $question->answers()->create([
                'answer_text' => $option['text'],
                'is_correct' => $index == $validated['correct_option'],
            ]);
        }

        if ($request->has('add_another')) 
        {
            // Rediriger vers le formulaire pour ajouter une autre question
            return redirect()
                ->route('questions.create', ['quiz_id' => $validated['quiz_id']])
                ->with('success', 'Question ajoutée ! Vous pouvez en ajouter une autre.');
        }

        return redirect()
            ->route('quizzes.index')
            ->with('success', 'Question et réponses ajoutées avec succès !');
    }

    public function edit(Question $question)
    {
        $question->load('quiz.module', 'answers');

        // Transformer les réponses en tableau d'options
        $options = $question->answers->map(function ($answer) {
            return [
                'text' => $answer->answer_text,
                'is_correct' => $answer->is_correct,
            ];
        })->toArray();

        return view('admin.questions.edit', compact('question', 'options'));
    }


    public function update(Request $request, Question $question)
    {
        $validated = $request->validate([
            'question' => 'required|string',
            'options' => 'required|array|min:1|max:4',
            'options.*.text' => 'required|string',
            'correct_option' => 'required|integer|min:0|max:3',
            'explanation' => 'nullable|string',
            'points' => 'required|integer|min:1',
            'order' => 'required|integer|min:1',
            // 'image' => 'nullable|string',
        ]);

        // Mise à jour des données de la question
        $question->update([
            'question_text' => $validated['question'],
            'order' => $validated['order'],
            'explanation' => $validated['explanation'] ?? null,
            'points' => $validated['points'],
            // 'image' => $validated['image'] ?? $question->image,
        ]);

        // Mettre à jour les réponses :
        // Suppression des anciennes réponses (simple et propre)
        $question->answers()->delete();

        // Création des nouvelles réponses
        foreach ($validated['options'] as $index => $option) {
            $question->answers()->create([
                'answer_text' => $option['text'],
                'is_correct' => $index == $validated['correct_option'],
            ]);
        }

        return redirect()
            ->route('quizzes.edit', $question->quiz_id)
            ->with('success', 'Question mise à jour avec succès !');
    }


    public function destroy(Question $question)
    {
        // Suppression des réponses liées
        $question->answers()->delete();

        // Suppression de la question
        $question->delete();

        return redirect()
            ->route('quizzes.edit', $question->quiz_id)
            ->with('success', 'Question supprimée avec succès !');
    }


}
