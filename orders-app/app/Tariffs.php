<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tariffs extends Model
{
    protected $fillable = ['title', 'price', 'discription', 'delivery_days', 'city'];    
    
    public function orders(){
        return $this->hasMany('App\Orders');
    }
}
