<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'is_admin',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'is_admin' => 'boolean',
    ];

    /**
     * Relation avec les résultats de quiz
     */
    public function quizResults()
    {
        return $this->hasMany(QuizResult::class);
    }

    /**
     * Relation avec les paiements
     */
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    /**
     * Vérifier si l'utilisateur est admin
     */
    public function isAdmin()
    {
        return $this->is_admin || $this->role === 'admin';
    }

    /**
     * Vérifier si l'utilisateur est modérateur
     */
    public function isModerator()
    {
        return $this->role === 'moderator';
    }

    /**
     * Obtenir le pourcentage de progression de l'utilisateur
     */
    public function getProgressPercentage()
    {
        $totalModules = Module::where('is_active', true)->count();
        if ($totalModules === 0) {
            return 0;
        }

        $completedModules = $this->quizResults()
            ->where('passed', true)
            ->distinct('quiz_id')
            ->join('quizzes', 'quiz_results.quiz_id', '=', 'quizzes.id')
            ->distinct('quizzes.module_id')
            ->count();

        return round(($completedModules / $totalModules) * 100);
    }

    /**
     * Obtenir le nombre de modules complétés
     */
    public function getCompletedModulesCount()
    {
        return $this->quizResults()
            ->where('passed', true)
            ->distinct('quiz_id')
            ->join('quizzes', 'quiz_results.quiz_id', '=', 'quizzes.id')
            ->distinct('quizzes.module_id')
            ->count();
    }
}