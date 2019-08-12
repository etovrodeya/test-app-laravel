<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Orders;
use App\Clients;
use App\Tariffs;
use App\Address;
use Carbon\Carbon; 

class OrdersController extends Controller{
    public function index(){
        return Orders::all();
    }
    public function show(Orders $orders){
        return $orders;
    }
    public function store(Request $request){
        $order = new Orders();
        $order->fill($request->all());
        $order->status = 'active';
        $order->delivery_day = Carbon::parse($request->delivery_day);
        
        if($order->delivery_day < $now=Carbon::now()->format('d.m.Y')){
            return response()->json(['message'=>'нельзя установить такую дату']);
        }
        if($client = Clients::where('phone', '=', $request->phone)->first()){
            $order->clients_id = $client->id;
        }else{
            $client = new Clients();
            $client->first_name = $request->first_name;
            $client->last_name = $request->last_name;
            $client->phone = $request->phone;
            $client->save();
            $order->clients_id = Clients::where('phone','=',$request->phone)->first()->id;
        }
        
        if($tariffs = Tariffs::where('id', '=', $request->tariffs_id)->first()){
            $order->tariffs_id = $tariffs->id;
            $order->price = $tariffs->price;
        }else{
            return response()->json(['message'=>'такого тарифа нет']);
        }
        if($addresses = Address::where('id', '=', $request->addresses_id)->first()){
            $order->addresses_id = $addresses->id;
        }else{
            return response()->json(['message'=>'такого адреса нет']);
        }
        $curAddress = Address::where('id', '=', $request->addresses_id)->first();
        $curTarrif = Tariffs::where('id', '=', $request->tariffs_id)->first();
        if($curTarrif->city && $curAddress->city != $curTarrif->city){
            return response()->json(['message'=>'адресс недоступен для данного тарифа']);
        }
        $order->save();
        $message = "Заказ успешно создан";
        return response()->json(['message'=>$message], 201);
    }
    public function update(Request $request, Orders $orders){
        $orders->update($request->all());
        return response()->json($orders, 200);
    }
    public function delete(Orders $orders){
        $orders->delete();
        return response()->json(null, 204);
    }
}