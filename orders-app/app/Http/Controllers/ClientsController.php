<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Clients;


class ClientsController extends Controller{
    public function index(){
        return Clients::all();
    }
    public function show(Clients $clients){
        return $clients;
    }
    public function store(Request $request){
        $validate = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required|max:20',
        ]);
        if ($validate->fails())
        {
            return response()->json($validate->errors());
        }
        if(Clients::where('phone','=',$request->phone)->exists()){
            return response()->json(['message'=>'номер занят']);            
        }else{
            $clients = Clients::create($request->all());
            return response()->json($clients, 201);
        }
    }
    public function update(Request $request, Clients $clients){
        $clients->update($request->all());
        return response()->json($clients, 200);
    }
    public function delete(Clients $clients){
        $clients->delete();
        return response()->json(null, 204);
    }
}