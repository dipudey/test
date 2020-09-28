<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrackfastMeal extends Model
{
    protected $fillable = [

    ];

    public function food() {
        return $this->belongsTo(Food::class);
    }

    public function student_brackfast() {
        return $this->hasMany(StudentBrackfastMeal::class,'brackfast_meal_id');
    }
}
