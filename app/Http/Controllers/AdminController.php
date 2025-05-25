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

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $users = $query->paginate(20);
        return view('admin.users.index', compact('users'));
    }

    public function payments(Request $request)
    {
        $query = Payment::with('user');

        if ($request->has('status')) {
            $query->where('status', $request->input('status'));
        }

        $payments = $query->orderBy('created_at', 'desc')->paginate(20);
        return view('admin.payments.index', compact('payments'));
    }
}
