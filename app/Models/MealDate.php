<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MealDate extends Model
{
    protected $fillable = [

    ];

    public function brackfast() {
        return $this->hasMany(BrackfastMeal::class,'meal_date_id');
    }
    
    public function lunch() {
        return $this->hasMany(LunchMeal::class,'meal_date_id');
    }
    
    public function dinner() {
        return $this->hasMany(DinnerMeal::class,'meal_date_id');
    }
    
    
}
