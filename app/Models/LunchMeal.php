<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LunchMeal extends Model
{
    protected $fillable = [

    ];

    public function food() {
        return $this->belongsTo(Food::class);
    }

    public function student_lunch() {
        return $this->hasMany(StudentLunchMeal::class,'lunch_meal_id');
    }
}
