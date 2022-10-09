<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    protected $fillable = [
        'division_id',
        'district_name'
    ];

    public function applicentInfo(){
        return $this->hasMany(Applicant::class, 'district_id', 'id');
    }

    public function divisionInfo(){
        return $this->belongsTo(Division::class, 'division_id', 'id');
    }

    public function districtInfo(){
        return $this->hasMany(Upazilla::class, 'district_id', 'id');
    }
}
