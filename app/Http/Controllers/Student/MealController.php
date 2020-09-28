<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MealDate;
use App\Models\Food;
use App\Models\StudentBrackfastMeal;
use App\Models\StudentLunchMeal;
use App\Models\StudentDinnerMeal;
use Carbon\Carbon;


class MealController extends Controller
{
    public function index() {
        $dates = MealDate::orderBy('id','desc')->take(7)->get();

        return view('student.meal.index',[
            'dates' => $dates,
        ]);
    }

    public function mealStore(Request $request) {
        $brackfast = [];
        $lunch = [];
        $dinner = [];

        if($request->brackfast) {
            foreach($request->brackfast as $date => $food) {
                $brackfast[] = [
                    'student_id' => $request->student_id,
                    'brackfast_meal_id' => $food,
                ];
            }
        }

        
        if($request->lunch) {
            foreach($request->lunch as $date => $food) {
                $lunch[] = [
                    'student_id' => $request->student_id,
                    'lunch_meal_id' => $food,
                ];
            }
        }

        if($request->dinner) {
            foreach($request->dinner as $date => $food) {
                $dinner[] = [
                    'student_id' => $request->student_id,
                    'dinner_meal_id' => $food,
                    
                ];
            }
        }

        StudentBrackfastMeal::insert($brackfast);
        StudentLunchMeal::insert($lunch);
        StudentDinnerMeal::insert($dinner);

        return back()->with('message',"Meal Added Successfully");
        
    }
}
