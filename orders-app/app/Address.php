<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['city', 'address'];
    
    public function orders(){
        return $this->hasMany('App\Orders');
    }
}
