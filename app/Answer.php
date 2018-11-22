<?php

namespace App;


use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use phpDocumentor\Reflection\Types\Self_;

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

    public function fillWithData(Array $data)
    {
        if(isset($data['user_id']))
            $this->user_id = $data['user_id'];

        if(isset($data['question_id']))
            $this->question_id = $data['question_id'];

        if(isset($data['content']))
            $this->content = $data['content'];

        $this->save();

        return $this;
    }

    public function makeBest()
    {

        $question = $this->question;
        if($question->has_best_answer == 1){
            throw new Exception(__('The question already has the best answer'));
        }
        $question->has_best_answer = 1;
        $question->save();
        $this->is_best = 1;
        $this->save();

        return true;
    }

    public static function createObject(Array $data)
    {
        $object = new self();
        $object->fillWithData($data);
        return $object;
    }
}
