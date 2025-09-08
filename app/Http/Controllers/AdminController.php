<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Module;
use App\Models\Course;
use App\Models\Quiz;
use App\Models\Payment;
use App\Models\QuizResult;
use Illuminate\Http\Request;

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
    public function resultDetails($resultId)
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
}