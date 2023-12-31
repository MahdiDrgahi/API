<?php

namespace App\Http\Controllers;

use App\Models\Factore;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product(Request $request){
        $request->validate([
            'product_name'=>'required',
            'Description'=>'required',
            'Category'=>'required',
            'Price'=>'required',
            'inventory'=>'required',

        ]);

        $product = Product::create($request->toArray());

        return response()->json([
            'product' => $product,
            'status' => 'success'
        ] , 201);

    }
    public function addproduct(Request $request){
        $request->validate([
            'product_name'=>'required',
            'Description'=>'required',
            'Category'=>'required',
            'Price'=>'required',
            'inventory'=>'required',

        ]);

        $product = Product::create($request->toArray());

        return response()->json([
            'product' => $product,
            'status' => 'success'
        ] , 201);
    }
    public function allproduct(){
        $products=Product::all();
        return response()->json([
            'product' => $products,
            'status' => 'success'
        ]);
    }

    public function update(Request $request,$id){
        $request->validate([
            'product_name'=>'required',
            'Description'=>'required',
            'Category'=>'required',
            'Price'=>'required',
            'inventory'=>'required',

        ]);
        $product=Product::find($id);
        $product->update($request->toArray());
        return response()->json([
            'product' => $product,
            'status' => 'success'
        ]);


    }

    public function delete($id){
        $product=Product::find($id);
        $product->delete();
        return response()->json([
            'product' => $product,
            'status' => 'success'
        ]);


    }

  public function userfind($id){
        $product = User::find($id)->product_id;
        return response()->json([
            $product
        ]);
  }

    public function factorefind($id){
        $product = Factore::find($id)->product_id;
        return response()->json([
            $product
        ]);
    }


    public function findorder($id){
        $product = Order::find($id)->product_id;
        return response()->json([
            $product
        ]);
    }


}
