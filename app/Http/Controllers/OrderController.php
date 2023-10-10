<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
class OrderController extends Controller
{
    public function order(Request $request){
        $request->validate([
            'price'=>'required',
            'Description'=>'required',
            'user_id'=>'required',
        ]);

        $order = Order::create($request->toArray());

        return response()->json([
            'order' => $order,
            'status' => 'success'
        ] , 201);

    }
    public function addorder(Request $request){
        $request->validate([
            'price'=>'required',
            'Description'=>'required',
            'user_id'=>'required',
        ]);

        $order = Order::create($request->toArray());

        return response()->json([
            'order' => $order,
            'status' => 'success'
        ] , 201);

    }

    public function allorder(){
        $order=Order::all();
        return response()->json([
            'order'=>$order,
            'status' => 'success'
        ]);


    }

    public function update(Request $request,$id){
        $request->validate([
            'price'=>'required',
            'Description'=>'required',
            'user_id'=>'required',
        ]);
        $order=Order::finde($id);
        $order->update($request->toArray());
        return response()->json([
            'order'=>$order,
            'status'=>'success'
        ]);

    }

    public function deleteorder($id){
        $order=Order::find($id);
        $order->delete();
        return response()->json([
            'order'=>$order,
            'status'=>'success'
        ]);

    }
}

