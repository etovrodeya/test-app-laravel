<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    protected $fillable = ['first_name', 'last_name', 'phone'];

    public function orders(){
        return $this->hasMany('App\Orders');
    }
}
