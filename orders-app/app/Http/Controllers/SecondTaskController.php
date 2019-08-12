<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Orders;
use App\Clients;

class SecondTaskController extends Controller{
    public function getBigCheck(){
        $clients = Clients::has('orders')->with(['orders' => function($q){
            $q->where([
                ['price', '<', 1000],
                ['count', '>', 1000]
                ]);
        }])->get();
        return response()->json($clients, 200);
    }
    public function getOrderOffset3(){
        $clients = Clients::all();
        $orders =[];
        foreach($clients as $client){
            $orders[]=$client->orders()->skip(2)->first();
        }
        return response()->json([['clients'=>$clients],['orders'=>$orders]], 200);
    }
    public function getOrderOffset3After1000(){
        $clients = Clients::all();
        $orders =[];
        foreach($clients as $client){
            $q= $client->orders()
                ->where('price','>',1000)
                ->first();
            $orders[] = $client->orders()
                        ->where('id','>=',$q->id)
                        ->skip(2)
                        ->first();
        }
        return response()->json([['clients'=>$clients],['orders'=>$orders]], 200);
    }
}