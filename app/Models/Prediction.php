<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prediction extends Model
{
    use HasFactory;

        protected $fillable = [
        'user_id',
        'result',
        'visual',
        'auditory',
        'kinesthetic',
        'total_correct',
        'total_wrong',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
