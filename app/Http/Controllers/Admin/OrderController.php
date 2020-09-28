<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
    public function index() {
        return view('admin.stock.index',[
            'orders' => Order::orderBy('id','desc')->get()
        ]);
    }
    
    public function create() {
        return view('admin.stock.create',[
            'products' => Product::orderBy('id','desc')->get()
        ]);
    }


    public function store(Request $request) {
        $orderItem = [];

        $order_id =  Order::insertGetId([
            'name' => $request->name,
            'amount' => $request->total_amount,
            'order_date' => date('Y-m-d')
        ]);

        foreach($request->product_id as $key => $vlaue) {
            $orderItem[] = [
                'order_id' => $order_id,
                'product_id' => $vlaue,
                'quantity' => $request->quantity[$key],
            ];
        }

        OrderItem::insert($orderItem);

        return back()->with('message',"Order Successfully Done");
        
    }


    public function orderItemList($id) {
        return response()->json(OrderItem::with('product')->where('order_id',$id)->get());
    }
}
