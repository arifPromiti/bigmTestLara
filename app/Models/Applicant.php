<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'division_id',
        'district_id',
        'upazila_id',
        'address',
        'bangla',
        'english',
        'french',
        'photo',
        'cv',
        'training'
    ];

    public function divisionInfo(){
        return $this->belongsTo(Division::class, 'division_id', 'id');
    }

    public function districtInfo(){
        return $this->belongsTo(District::class, 'district_id', 'id');
    }

    public function upazilaInfo(){
        return $this->belongsTo(Upazilla::class, 'upazila_id', 'id');
    }

    public function educationInfo(){
        return $this->hasMany(Education::class, 'applicant_id', 'id');
    }

    public function traningInfo(){
        return $this->hasMany(Training::class, 'applicant_id', 'id');
    }
}
