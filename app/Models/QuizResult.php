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
        'is_mock_exam',
        'time_taken',
        'answers'
    ];

    protected $casts = [
    'passed' => 'boolean',
    'is_mock_exam' => 'boolean',
    'answers' => 'array',
    'detailed_results' => 'array', // Ajoutez cette ligne
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
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
