<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TheoryPartNumber extends Model
{
    use HasFactory;

    protected $fillable = [
        'theory_attendance',
        'theory_ct',
        'theory_midterm',
        'theory_assignment',
        'theory_final',
        'theory_total',
    ];
}
