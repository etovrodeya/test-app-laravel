<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $fillable = ['clients_id', 'tariffs_id', 'addresses_id', 'price', 'status', 'count', 'delivery_day'];

    public function client(){
        return $this->belongsTo('App\Clients');
    }
    public function tariffs(){
        return $this->belongsTo('App\Tariffs');
    }
    public function address(){
        return $this->belongsTo('App\Address');
    }
}