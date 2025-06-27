<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'material_id',
        'question',
        'answer',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
    ];

    public function material()
    {
        return $this->belongsTo(Material::class);
    }
}
