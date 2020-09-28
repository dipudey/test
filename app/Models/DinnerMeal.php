<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DinnerMeal extends Model
{
    protected $fillable = [

    ];

    public function food() {
        return $this->belongsTo(Food::class);
    }

    public function student_dinner() {
        return $this->hasMany(StudentDinnerMeal::class,'dinner_meal_id');
    }
}
