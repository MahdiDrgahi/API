<?php

namespace App\Http\Controllers;

use App\Models\Factore;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use SoapClient;
class UserController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'city' => 'required',
            'country' => 'required',
            'gender' => 'required',
            'age' => 'required',
            'education' => 'required',
            'National_Code' => 'required',
            'password' => 'required',
            'email' => 'required'
        ]);

        $user = User::create($request->toArray());

        $user->assignRole('customer');


        $client = new SoapClient("http://ippanel.com/class/sms/wsdlservice/server.php?wsdl");
        $user1 = "Mah-di";
        $pass = "M@AHDII1380";
        $fromNum = "+9810004223";
        $toNum = [$request->phone_number];
        $pattern_code = "c0tlh5pzo9dy6ot";
        $input_data = [ "first_name" => $request->first_name];

        echo $client->sendPatternSms($fromNum,$toNum,$user1,$pass,$pattern_code,$input_data);




        return response()->json([
            'user' => $user,
            'status' => 'success'
        ], 201);
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => 'error'
            ]);

        }
        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => $user
        ]);

    }


    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json([
            'status' => 'success'

        ]);
    }


    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'city' => 'required',
            'country' => 'required',
            'gender' => 'required',
            'age' => 'required',
            'education' => 'required',
            'National_Code' => 'required',
            'password' => 'required',
            'email' => 'required'

        ]);

        $user->update($request->toArray());

        return response()->json([
            'user' => $user,
            'status' => 'success'
        ]);
    }


    public function adduser(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'city' => 'required',
            'country' => 'required',
            'gender' => 'required',
            'age' => 'required',
            'education' => 'required',
            'National_Code' => 'required',
            'password' => 'required',
            'email' => 'required'

        ]);

        $user = User::create($request->all());
        $user->assignRole('customer');
        return response()->json([
            'user' => $user,
            'status' => 'success'
        ]);
    }


    public function alluser()
    {
        $users = User::all();
        return response()->json([
            'user' => $users,
            'status' => 'success'
        ]);


    }


    public function deleteuser($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json([
            'user' => $user,
            'status' => 'success'
        ]);
    }


    public function orderfind($id){
        $user = Order::find($id)->user_id;
        return response()->json([
            $user
        ]);
    }

    public function FactoreFind($id)
    {
        $user = Factore::find($id)->user_id;
        return response()->json([
            $user
        ]);
    }


}










