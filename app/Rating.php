<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rating extends Model
{

    public function object(){
        return $this->morphTo();
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
