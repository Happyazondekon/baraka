<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Ici sont enregistrées les routes web de l'application Baraka.
| Elles sont chargées par le RouteServiceProvider et attribuées au groupe "web".
|
*/

// Page d'accueil publique
Route::get('/', [HomeController::class, 'index'])->name('home');

// Pages publiques
Route::get('/a-propos', [HomeController::class, 'about'])->name('about');
Route::get('/tarifs', [HomeController::class, 'pricing'])->name('pricing');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [HomeController::class, 'sendContact'])->name('contact.send');

// Groupe routes utilisateur authentifié
Route::middleware(['auth'])->group(function () {
    // Accueil utilisateur connecté
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    // Profil utilisateur
    Route::get('/profil', [HomeController::class, 'profile'])->name('profile');
    Route::put('/profil', [HomeController::class, 'updateProfile'])->name('profile.update');

    // Cours (Module)
    Route::get('/cours', [ModuleController::class, 'index'])->name('modules.index');
    Route::get('/cours/{module}', [ModuleController::class, 'show'])->name('modules.show');

    // Détail d'un cours
    Route::get('/cours/{module}/{course}', [CourseController::class, 'show'])->name('courses.show');

    // Progression utilisateur
    Route::get('/progression', [HomeController::class, 'progression'])->name('progression');

    // Quiz
    Route::get('/quiz/{module}', [QuizController::class, 'show'])->name('quiz.show');
    Route::post('/quiz/{module}/submit', [QuizController::class, 'submit'])->name('quiz.submit');

    // Paiement
    Route::get('/paiement', [HomeController::class, 'payment'])->name('payment');
    Route::post('/paiement/process', [HomeController::class, 'processPayment'])->name('payment.process');
});

// Profil - routes Laravel Breeze ou Jetstream
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Groupe routes Admin (prefixed 'admin', noms de routes préfixés 'admin.')
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

    // Modules, Cours, Quiz - routes admin (noms préfixés)
    Route::resource('modules', ModuleController::class, ['as' => 'admin'])->except('show');
    Route::resource('courses', CourseController::class, ['as' => 'admin'])->except('show');
    Route::resource('quizzes', QuizController::class, ['as' => 'admin'])->except('show');
    Route::resource('questions', QuestionController::class, ['as' => 'admin']);

    // Gestion utilisateurs
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    Route::post('/users/{user}/verify', [AdminController::class, 'verifyUser'])->name('admin.users.verify');
    Route::delete('/users/{user}', [AdminController::class, 'destroyUser'])->name('admin.users.destroy');
    Route::post('/users/{user}/toggle-status', [AdminController::class, 'toggleUserStatus'])->name('admin.users.toggle-status');
    Route::get('/users/{user}/details', [AdminController::class, 'getUserDetails'])->name('admin.users.details');

    // Paiements
    Route::get('/payments', [AdminController::class, 'payments'])->name('admin.payments');

    // Ajout de questions (admin)
    Route::get('/questions/create', [QuestionController::class, 'create'])->name('admin.questions.create');
    Route::post('/questions', [QuestionController::class, 'store'])->name('admin.questions.store');
    Route::post('/quizzes/{quiz}/questions', [QuestionController::class, 'store'])->name('admin.questions.store');

    // Voir un quiz en admin
    Route::get('/annule/quizzes/{quiz}', [QuizController::class, 'adminShow'])->name('admin.quizzes.show');
});


// Auth routes Laravel Breeze ou Jetstream
require __DIR__.'/auth.php';