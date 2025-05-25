<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
        'currency',
        'payment_method',
        'transaction_id',
        'status',
        'payment_data'
    ];

    protected $casts = [
        'payment_data' => 'json'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}