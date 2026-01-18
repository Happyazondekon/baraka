<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'order',
        'is_practical',
        'is_active'
    ];

    protected $casts = [
        'is_practical' => 'boolean',
        'is_active' => 'boolean'
    ];

    public function courses()
    {
        return $this->hasMany(Course::class)->orderBy('order');
    }

    public function quiz()
    {
        return $this->hasOne(Quiz::class);
    }

    public function userProgress()
    {
        return $this->hasMany(UserProgress::class);
    }

    public function isCompletedBy($user)
    {
        return $this->userProgress()->where('user_id', $user->id)->where('completed', true)->exists();
    }

    public function getProgressPercentage($user)
    {
        $totalCourses = $this->courses->count();
        if ($totalCourses === 0) return 0;

        $completedCourses = $this->userProgress()
            ->where('user_id', $user->id)
            ->where('completed', true)
            ->count();

        return round(($completedCourses / $totalCourses) * 100);
    }

    /**
     * Récupère le module précédent du même type (théorique ou pratique)
     */
    public function getPreviousModule()
    {
        return self::where('is_practical', $this->is_practical)
            ->where('order', '<', $this->order)
            ->orderByDesc('order')
            ->first();
    }

    /**
     * Vérifie si le module est verrouillé pour un utilisateur
     */
    public function isLockedFor($user)
    {
        // Si l'utilisateur n'a pas accès au cours (pas payant), on ne parle pas de verrouillage
        if (!$user->has_paid) {
            return false;
        }

        // C'est le premier module, il n'est jamais verrouillé
        if (!$this->getPreviousModule()) {
            return false;
        }

        // Récupère la progression du module précédent
        $previousModule = $this->getPreviousModule();
        $previousProgress = $previousModule->getProgressPercentage($user);

        // Le module suivant est verrouillé si le précédent n'a pas atteint 80%
        return $previousProgress < 80;
    }

    /**
     * Obtient le pourcentage de progression d'un module pour un utilisateur
     * (combinant cours et quiz)
     */
    public function getProgressPercentageDetailed($user)
    {
        $totalCourses = $this->courses->count();
        $quiz = $this->quiz;

        if ($totalCourses === 0 && !$quiz) {
            return 0;
        }

        // Progression des cours
        $completedCourses = $this->userProgress()
            ->where('user_id', $user->id)
            ->where('completed', true)
            ->count();

        $courseProgress = $totalCourses > 0 ? ($completedCourses / $totalCourses) : 0;

        // Progression du quiz (on considère qu'il faut 80% au quiz pour que le module soit considéré comme progressé)
        $quizProgress = 0;
        if ($quiz) {
            $quizResult = $quiz->results()
                ->where('user_id', $user->id)
                ->latest()
                ->first();

            if ($quizResult) {
                $quizProgress = ($quizResult->score / 100);
            }
        }

        // Moyenne pondérée : 70% cours + 30% quiz
        $totalProgress = ($courseProgress * 0.7) + ($quizProgress * 0.3);

        return round($totalProgress * 100);
    }

    /**
     * Récupère la raison du verrouillage (pour affichage à l'utilisateur)
     */
    public function getLockReason($user)
    {
        if (!$this->isLockedFor($user)) {
            return null;
        }

        $previousModule = $this->getPreviousModule();
        $previousProgress = $previousModule->getProgressPercentage($user);

        return "Complétez le module \"{$previousModule->title}\" à 80% pour débloquer celui-ci. Progression actuelle: {$previousProgress}%";
    }
}

