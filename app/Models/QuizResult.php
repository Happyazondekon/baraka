<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'quiz_id',
        'score',
        'total_questions',
        'correct_answers',
        'passed',
        'time_taken',
        'answers'
    ];

    protected $casts = [
        'passed' => 'boolean',
        'answers' => 'json'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function getScorePercentage()
    {
        return $this->total_questions > 0 ? round(($this->correct_answers / $this->total_questions) * 100) : 0;
    }
}
