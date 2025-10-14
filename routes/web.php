<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AdminController;
use Illuminate\Http\Request; 
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Ici sont enregistrées les routes web de l'application Auto-Permis.
| Elles sont chargées par le RouteServiceProvider et attribuées au groupe "web".
|
*/

// =======================================================================
// PAGES PUBLIQUES (Accessibles à tous)
// =======================================================================

// Page d'accueil publique
Route::get('/', [HomeController::class, 'index'])->name('home');

// Pages publiques
Route::get('/a-propos', [HomeController::class, 'about'])->name('about');
Route::get('/tarifs', [HomeController::class, 'pricing'])->name('pricing');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [HomeController::class, 'sendContact'])->name('contact.send');

// =======================================================================
// GROUPE 1 : Authentifié et Email Vérifié (FREE-TO-VIEW / ACCÈS GRATUIT)
// Contient les routes qui ne nécessitent pas de paiement.
// =======================================================================
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Pages Utilisateur de Base
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/profil', [HomeController::class, 'profile'])->name('profile');
    Route::put('/profil', [HomeController::class, 'updateProfile'])->name('profile.update');
    Route::get('/progression', [HomeController::class, 'progression'])->name('progression');
    
    // Page et Processus de Paiement (L'utilisateur doit pouvoir y accéder pour payer)
    Route::get('/paiement', [HomeController::class, 'payment'])->name('payment');
    Route::post('/paiement/process', [HomeController::class, 'processPayment'])->name('payment.process');

    // Route pour nettoyer l'URL de redirection stockée dans la session (utilisée par FedaPay script)
    Route::post('/payment/clear-intended', function (Request $request) {
        session()->forget('intended_url');
        return response()->json(['status' => 'success']);
    })->name('payment.clear_intended');

     Route::get('/examens/results/{result}/download', [QuizController::class, 'downloadSummary'])->name('examens.results.download');
     Route::get('/examens/results/{resultId}/download', [QuizController::class, 'downloadSummary'])->name('examens.results.download');

    // AFFICHAGE DE LA LISTE DES COURS (FREE-TO-VIEW)
    // Permet de voir la liste des modules sans avoir payé.
    Route::get('/cours', [ModuleController::class, 'index'])->name('modules.index');
// EXAMENS BLANCS (FREE-TO-VIEW)
    Route::get('/examens', [QuizController::class, 'examIndex'])->name('examens.index');
    
Route::post('/examens/submit', [QuizController::class, 'submitExam'])->name('examens.submit');
Route::post('/examens/submit/{exam}', [QuizController::class, 'submitExam'])->name('examens.submit.specific');

    // =======================================================================
    // GROUPE 2 : Routes Protégées par Paiement (PAY-TO-START / CONTENU DE DÉTAIL)
    // Le middleware 'payment.required' bloque l'accès aux ressources détaillées.
    // =======================================================================
    Route::middleware('payment.required')->group(function () {
        
        // DÉTAIL D'UN MODULE
        Route::get('/cours/{module}', [ModuleController::class, 'show'])->name('modules.show');
        
        // DÉTAIL D'UNE LEÇON/COURS
        Route::get('/cours/{module}/{course}', [CourseController::class, 'show'])->name('courses.show');
        
        // QUIZ LIÉ À UN MODULE
        Route::get('/cours/{module}/quiz', [QuizController::class, 'show'])->name('modules.quiz.show');
        Route::post('/cours/{module}/quiz/submit', [QuizController::class, 'submit'])->name('modules.quiz.submit');

        // QUIZ DIRECT (Si c'est du contenu payant)
        Route::get('/quiz/{quiz}', [QuizController::class, 'showByQuiz'])->name('quizzes.show');
    });

    Route::get('/examens/start', [QuizController::class, 'startExam'])->name('examens.start');
    Route::get('/examens/start/{exam}', [QuizController::class, 'startExam'])->name('examens.start.specific');
    Route::get('/examens/results/{result}', [QuizController::class, 'showResults'])->name('examens.results');

});

// =======================================================================
// ROUTES D'AUTHENTIFICATION, PROFIL & VÉRIFICATION (Breeze/Jetstream)
// =======================================================================

// Profil utilisateur standard (référence à ProfileController)
Route::middleware('auth')->group(function () {
    // Note : /profil a été défini ci-dessus avec HomeController. Mettez ces routes à jour si nécessaire.
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Routes de vérification d'email
Route::get('/verify-email', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/verify-email/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('status', 'verification-link-sent');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


// =======================================================================
// GROUPE ADMIN
// =======================================================================

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

    // Modules, Cours, Quiz
    Route::resource('modules', ModuleController::class, ['as' => 'admin'])->except('show');
    Route::resource('courses', CourseController::class, ['as' => 'admin'])->except('show');
    Route::resource('quizzes', QuizController::class, ['as' => 'admin'])->except('show');
    Route::resource('questions', QuestionController::class, ['as' => 'admin']);
    // Gestion des examens blancs
    Route::get('/mock-exams', [AdminController::class, 'mockExams'])->name('admin.mock-exams.index');
    Route::get('/mock-exams/create', [AdminController::class, 'createMockExam'])->name('admin.mock-exams.create');
    Route::post('/mock-exams', [AdminController::class, 'storeMockExam'])->name('admin.mock-exams.store');
    Route::get('/mock-exams/{quiz}/edit', [AdminController::class, 'editMockExam'])->name('admin.mock-exams.edit');
    Route::put('/mock-exams/{quiz}', [AdminController::class, 'updateMockExam'])->name('admin.mock-exams.update');
    Route::delete('/mock-exams/{quiz}', [AdminController::class, 'destroyMockExam'])->name('admin.mock-exams.destroy');
    


    

    

    // Paiements
    Route::get('/payments', [AdminController::class, 'payments'])->name('admin.payments');

    // Questions
    Route::get('/questions/create', [QuestionController::class, 'create'])->name('admin.questions.create');
    Route::post('/questions', [QuestionController::class, 'store'])->name('admin.questions.store');
    Route::post('/quizzes/{quiz}/questions', [QuestionController::class, 'store'])->name('admin.questions.store');

    // Voir un quiz en admin
    Route::get('/quizzes/{quiz}', [QuizController::class, 'adminShow'])->name('admin.quizzes.show');
    // Gestion des Utilisateurs
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::post('/users/{user}/verify', [AdminController::class, 'verifyUser'])->name('users.verify');
    Route::delete('/users/{user}', [AdminController::class, 'destroyUser'])->name('users.destroy');
    Route::post('/users/{user}/toggle-status', [AdminController::class, 'toggleUserStatus'])->name('users.toggle-status');
    Route::get('/users/{user}/details', [AdminController::class, 'getUserDetails'])->name('users.details');
    Route::get('/users/{user}/results', [AdminController::class, 'userResults'])->name('users.results');
    Route::get('/results/{result}/details', [AdminController::class, 'resultDetails'])->name('users.result-details');
    Route::get('/api/users/{user}/quiz-results', [AdminController::class, 'getUserQuizResults'])->name('api.user.quiz-results');
});
    
// Gestion utilisateurs
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    Route::post('/users/{user}/verify', [AdminController::class, 'verifyUser'])->name('admin.users.verify');
    Route::delete('/users/{user}', [AdminController::class, 'destroyUser'])->name('admin.users.destroy');
    Route::post('/users/{user}/toggle-status', [AdminController::class, 'toggleUserStatus'])->name('admin.users.toggle-status');
    Route::get('/users/{user}/details', [AdminController::class, 'getUserDetails'])->name('admin.users.details');
    Route::get('/users/{user}/results', [AdminController::class, 'userResults'])->name('admin.users.results');
    Route::get('/results/{result}/details', [AdminController::class, 'resultDetails'])->name('admin.users.result-details');
    Route::get('/api/users/{user}/quiz-results', [AdminController::class, 'getUserQuizResults'])->name('admin.api.user.quiz-results');

    // Gestion des Paiements
    Route::get('/payments', [AdminController::class, 'payments'])->name('payments');
    Route::post('/cours/{course}/complete', [CourseController::class, 'complete'])->name('courses.complete');


// Auth routes Laravel Breeze ou Jetstream
require __DIR__.'/auth.php';