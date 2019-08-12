<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Tariffs;
use App\Address;
use Carbon\Carbon; 

class TariffsController extends Controller{
    public function index(){
        return Tariffs::all();
    }
    public function show(Tariffs $tariff){
        return $tariff;
    }
    public function store(Request $request){
        $tariffs = Tariffs::create($request->all());
        return response()->json($tariffs, 201);
    }
    public function getDeliveryDays(string $id){
        $tariff = Tariffs::where('id', '=', $id)->first();
        $deliveryDaysTariff = explode(' ', $tariff->delivery_days);
        $start_at = Carbon::now();
        $end_at = Carbon::now()->addMonths(1);
        $deliveryDays = [];
        while($start_at < $end_at){
            foreach($deliveryDaysTariff as $day){
                if($start_at->dayOfWeek == $day){
                    $deliveryDays[] = $start_at->format('d.m.Y');
                }
            }
            $start_at->addDays(1);
        }
        return response()->json($deliveryDays, 200);
    }
    public function update(Request $request, Tariffs $tariffs){
        $tariffs->update($request->all());
        return response()->json($tariffs, 200);
    }
    public function delete(Tariffs $tariffs){
        $tariffs->delete();
        return response()->json(null, 204);
    }
}