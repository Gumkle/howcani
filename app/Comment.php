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

    public function fillWithData(Array $data)
    {
        if(isset($data['object_type']))
            $this->object_type = $data['object_type'];

        if(isset($data['object_id']))
            $this->object_id = $data['object_id'];

        if(isset($data['user_id']))
            $this->user_id = $data['user_id'];

        if(isset($data['content']))
            $this->content = $data['content'];

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
