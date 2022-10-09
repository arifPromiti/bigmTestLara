<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upazilla extends Model
{
    use HasFactory;
    protected $fillable = [
        'district_id',
        'upazilla_name'
    ];

    public function applicentInfo(){
        return $this->hasMany(Applicant::class, 'upazila_id', 'id');
    }

    public function districtInfo(){
        return $this->belongsTo(District::class, 'district_id', 'id');
    }
}
