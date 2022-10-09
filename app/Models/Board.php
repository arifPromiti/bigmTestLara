<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    protected $fillable = [
        'board_name'
    ];

    public function educationInfo(){
        return $this->hasMany(Education::class, 'board_id', 'id');
    }
}
