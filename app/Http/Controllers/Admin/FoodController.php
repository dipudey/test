<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Food;

class FoodController extends Controller
{
    public function index() {
        return view('admin.food.index',[
            'foods' => Food::orderBy('id','desc')->get()
        ]);
    }

    public function store(Request $request) {
        Food::insert([
            'food_name' => $request->food_name,
        ]);
        return back()->with('message',"New Food Item Added");
    }

    public function destroy($id) {
        Food::find($id)->delete();
        return back()->with('message',"Food Item Deleted Successfully");
    }

    public function student_meal_brackfast() {
        return $this->hasMany(StudentBrackfastMeal::class,'food_id');
    }
}
