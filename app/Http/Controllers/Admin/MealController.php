<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MealDate;
use App\Models\Food;
use App\Models\BrackfastMeal;
use App\Models\LunchMeal;
use App\Models\DinnerMeal;
use Carbon\Carbon;

class MealController extends Controller
{
    public function index() {
        return view('admin.meal.index',[
            'dates' => MealDate::orderBy('id','desc')->take(7)->get(),
            'foods' => Food::orderBy('id','desc')->get(),
        ]);
    }


    public function dateStore(Request $request) {
        $data = [];
        foreach($this->getDatesFromRange($request->start_date,$request->end_date) as $date){
            MealDate::insert([
                'meal_date' => $date,
                'created_at' => Carbon::now()
            ]);
        }
        return back()->with('message',"New Meal Date Added");
    }


    public function mealStore(Request $request) {
        $brackfast = [];
        $lunch = [];
        $dinner = [];

        if($request->brackfast) {
            foreach($request->brackfast as $date => $value) {
                foreach($value as $food) {
                    $brackfast[] = [
                        'meal_date_id' => $date,
                        'food_id' => $food,
                        'created_at' => Carbon::now()
                    ];
                }
            }
        }

        if($request->lunch) {
            foreach($request->lunch as $date => $value) {
                foreach($value as $food) {
                    $lunch[] = [
                        'meal_date_id' => $date,
                        'food_id' => $food,
                        'created_at' => Carbon::now()
                    ];
                }
            }
        }

        if($request->dinner) {
            foreach($request->dinner as $date => $value) {
                foreach($value as $food) {
                    $dinner[] = [
                        'meal_date_id' => $date,
                        'food_id' => $food,
                        'created_at' => Carbon::now()
                    ];
                }
            }
        }

        BrackfastMeal::insert($brackfast);
        LunchMeal::insert($lunch);
        DinnerMeal::insert($dinner);

        return back()->with('message',"New Food List Added");
    }

    public function mealSearchByDate() {
        return view('admin.meal.search');
    }

    public function searching(Request $request) {
        $meal_date = MealDate::where('meal_date',$request->meal_search)->first();
        return view('admin.meal.search',[
            'meal_date' => $meal_date
        ]);
        
    }




    /**
     * to get all the dates in given range
     * 86400 sec = 24 hrs = 60*60*24 = 1 day
    */
    private function getDatesFromRange($start,$end, $formate = "Y-m-d") {
        $list = [];

        // convert to the number of seconds
        $starting = strtotime($start); 
        $ending = strtotime($end); 

        // 86400 sec = 24 hrs = 60*60*24 = 1 day
        for($currentDate = $starting; $currentDate <= $ending; $currentDate += (86400)) {
            $store = date('Y-m-d',$currentDate);
            $list[] = $store;
        }

        return $list;

    }
}
