<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    // TODO password changing tests
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function answers()
    {
        return $this->hasMany('App\Answer');
    }

    public function questions()
    {
        return $this->hasMany('App\Question');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function ratings()
    {
        return $this->hasMany('App\Rating');
    }

    public function fillWithData(Array $data)
    {
        if(isset($data['email']))
            $this->email = $data['email'];

        if(isset($data['password']))
            $this->password = app('hash')->make($data['password']);

        if(isset($data['is_admin']))
            $this->is_admin = $data['is_admin'];

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
