<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;
    protected $fillable = [
        'division_name'
    ];

    public function applicentInfo(){
        return $this->hasMany(Applicant::class, 'division_id', 'id');
    }

    public function districtInfo(){
        return $this->hasMany(District::class, 'division_id', 'id');
    }
}
