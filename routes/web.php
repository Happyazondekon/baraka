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
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Routes publiques
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/a-propos', [HomeController::class, 'about'])->name('about');
Route::get('/tarifs', [HomeController::class, 'pricing'])->name('pricing');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [HomeController::class, 'sendContact'])->name('contact.send');

// Routes protégées par authentification
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/profil', [HomeController::class, 'profile'])->name('profile');
    Route::put('/profil', [HomeController::class, 'updateProfile'])->name('profile.update');

    // Routes des modules et cours
    Route::get('/cours', [ModuleController::class, 'index'])->name('modules.index');
    Route::get('/cours/{module}', [ModuleController::class, 'show'])->name('modules.show');
    Route::get('/cours/{module}/{course}', [CourseController::class, 'show'])->name('courses.show');

    // Routes des quiz
    Route::get('/quiz/{module}', [QuizController::class, 'show'])->name('quiz.show');
    Route::post('/quiz/{module}/submit', [QuizController::class, 'submit'])->name('quiz.submit');

    // Routes de paiement
    Route::get('/paiement', [HomeController::class, 'payment'])->name('payment');
    Route::post('/paiement/process', [HomeController::class, 'processPayment'])->name('payment.process');
});

// Routes admin
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('modules', ModuleController::class)->except('show');
    Route::resource('courses', CourseController::class)->except('show');
    Route::resource('quizzes', QuizController::class)->except('show');

    // Route pour quitter question pour quizzes.show
    Route::resource('questions', QuestionController::class);


    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/questions', [AdminController::class, 'payments'])->name('admin.payments');

    // Routes pour les ajoutes de questions
    Route::get('/questions/create', [QuestionController::class, 'create'])->name('questions.create');
    Route::post('/questions', [QuestionController::class, 'store'])->name('questions.store');
    Route::post('/quizzes/{quiz}/questions', [QuestionController::class, 'store'])->name('questions.store');

    // Annuller question
    Route::get('/annule/quizzes/{quiz}', [QuizController::class, 'adminShow'])->name('quizzes.show');

});


require __DIR__.'/auth.php';
