<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{

    use SoftDeletes;
    protected $dates=['deleted_at'];

    public function answers()
    {
        return $this->hasMany('App\Answer');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'object');
    }
}
