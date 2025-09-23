<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultCalculated extends Model
{
    protected $table = 'result_calculated';
    use HasFactory;

    protected $fillable = [
        'theory_part_number_id',
        'lab_part_number_id',
        'theory_part_numbers',
        'lab_part_numbers',
        'final_marks',
        'letter_grade',
        'grade_point',
        'status',
        'is_auto_calculated',
    ];

    // Relationships
    public function theoryPartNumber()
    {
        return $this->belongsTo(TheoryPartNumber::class);
    }

    public function labPartNumber()
    {
        return $this->belongsTo(LabPartNumber::class);
    }
}
