<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Answer extends Model
{

    use SoftDeletes;
    protected $dates=['deleted_at'];

    public function question()
    {
        return $this->belongsTo('App\Question');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'object');
    }

    public function ratings()
    {
        return $this->morphMany('App\Rating', 'object');
    }
}
