<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function index() {
        return view('admin.stock.product',[
            'products' => Product::orderBy('id','desc')->get()
        ]);
    }

    public function store(Request $request) {
        Product::insert([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'created_at' => Carbon::now()
        ]);
        return back()->with('message',"New Product Added Successfully");
    }

    public function destroy($id) {
        Product::find($id)->delete();
        return back()->with('message',"Product Deleted Successfully");
    }

    public function productAllJson() {
        return response()->json(Product::all());
    }

    public function productPrice($id) {
        return response()->json(Product::find($id)->price);
    }
}
