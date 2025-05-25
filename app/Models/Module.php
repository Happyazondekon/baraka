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
}

