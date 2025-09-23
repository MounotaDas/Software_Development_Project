<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'student_id',
        'course_code',
        'course_name',
        'semester_no',
        'type',
    ];
}
