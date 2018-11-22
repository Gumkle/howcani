<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rating extends Model
{
    private function rateObject(bool $rating){

        $ratedObject = $this->object;
        if ($rating == 1){

            $ratedObject->total_rating = $ratedObject->total_rating + 1;
        } else {

            $ratedObject->total_rating = $ratedObject->total_rating - 1;
        }
        $ratedObject->save();
        return true;
    }

    public function object(){
        return $this->morphTo();
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function fillWithData(Array $data)
    {
        if(isset($data['object_type']))
            $this->object_type = $data['object_type'];

        if(isset($data['object_id']))
            $this->object_id = $data['object_id'];

        if(isset($data['user_id']))
            $this->user_id = $data['user_id'];

        if(isset($data['rating']))
            $this->rating = $data['rating'];

        $this->save();
        $this->rateObject($data['rating']);
        return $this;
    }

    public static function createObject(Array $data)
    {
        $object = new self();
        $object->fillWithData($data);
        return $object;
    }
}
