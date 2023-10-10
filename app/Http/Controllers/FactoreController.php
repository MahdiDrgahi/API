<?php

namespace App\Http\Controllers;

use App\Models\Factore;
use Illuminate\Http\Request;

class FactoreController extends Controller
{
    public function factore(Request$request){
        $request->validate([
            'Price_of_invoices'=>'required'
        ]);
        $factore = Factore::create($request->toArray());

        return response()->json([
            'factore' => $factore,
            'status' => 'success'
        ] , 201);
    }
    public function addfactore(Request $request){
        $request->validate([
            'Price_of_invoices'=>'required'
        ]);
        $factore = Factore::create($request->toArray());

        return response()->json([
            'factore' => $factore,
            'status' => 'success'
        ] , 201);
    }
    public function allfactore(){
        $factores=Factore::all();
        return response()->json([
            'factore'=>$factores,
            'status' => 'success'
        ]);
    }
    public function update(Request $request,$id){
        $request->validate([
            'Price_of_invoices'=>'required'
        ]);
        $factore = Factore::find($id);
        $factore->update($request->toArray());
        return response()->json([
            'factore'=>$factore,
            'status' => 'success'
        ]);
    }

    public function deletefactore($id){
        $factore=Factore::find($id);
        $factore->delete();
        return response()->json([
            'factore'=>$factore,
            'status' => 'success'
        ]);
    }
}
