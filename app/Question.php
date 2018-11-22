<?php

namespace App;


use function Couchbase\defaultDecoder;
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

    public function ratings()
    {
        return $this->morphMany('App\Rating', 'object');
    }

    public function fillWithData(Array $data)
    {

        if(isset($data['user_id']))
            $this->user_id = $data['user_id'];

        if(isset($data['title']))
            $this->title = $data['title'];

        if(isset($data['description']))
            $this->description = $data['description'];

        $this->save();

        return $this;
    }

    public static function createObject(Array $data)
    {
        $object = new self();
        $object->fillWithData($data);
        return $object;
    }
}
