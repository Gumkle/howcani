<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;
    protected $dates=['deleted_at'];

    public function object(){
        return $this->morphTo();
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function ratings()
    {
        return $this->morphMany('App\Rating', 'object');
    }
}
