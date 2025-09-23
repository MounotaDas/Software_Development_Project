<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabPartNumber extends Model
{
    use HasFactory;

    protected $fillable = [
        'lab_attendance',
        'lab_performance',
        'lab_report',
        'lab_viva',
        'lab_project',
        'lab_total',
    ];
}
