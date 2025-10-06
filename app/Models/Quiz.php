<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'module_id',
        'title',
        'description',
        'time_limit',
        'passing_score',
        'is_active',
        'is_mock_exam'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_mock_exam' => 'boolean'
    ];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function userResults()
    {
        return $this->hasMany(QuizResult::class);
    }

    public function answers()
    {
        return $this->hasManyThrough(Answer::class, Question::class);
    }

    // Méthode pour vérifier si c'est un examen blanc
    public function isMockExam()
    {
        return $this->is_mock_exam || $this->module_id === null;
    }

    // Scope pour les examens blancs
    public function scopeMockExams($query)
    {
        return $query->where('is_mock_exam', true)->orWhereNull('module_id');
    }

    // Scope pour les quiz normaux
    public function scopeRegularQuizzes($query)
    {
        return $query->where('is_mock_exam', false)->whereNotNull('module_id');
    }
}