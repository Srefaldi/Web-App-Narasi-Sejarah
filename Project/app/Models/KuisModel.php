<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KuisModel extends Model
{
    use HasFactory;
    protected $fillable = [

        'soal',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
        'Jawaban'
    ];
}
