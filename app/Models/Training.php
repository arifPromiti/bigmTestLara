<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;
    protected $fillable = [
        'applicant_id',
        'trainingName',
        'trainingDetails'
    ];

    public function applicentInfo(){
        return $this->belongsTo(Applicant::class, 'applicant_id', 'id');
    }
}
