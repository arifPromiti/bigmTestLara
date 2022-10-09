<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;
    protected $fillable = [
        'applicant_id',
        'exam_id',
        'institute',
        'board_id',
        'result'
    ];

    public function applicentInfo(){
        return $this->belongsTo(Applicant::class, 'applicant_id', 'id');
    }

    public function boardInfo(){
        return $this->belongsTo(Board::class, 'board_id', 'id');
    }

    public function examInfo(){
        return $this->belongsTo(Exam::class, 'exam_id', 'id');
    }
}
