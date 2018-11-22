<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class AnswerModelTest extends TestCase
{

    public function testFillWithData()
    {
        // init test case
        $answer = \App\Answer::inRandomOrder()->first();
        $newAnswerData = factory(\App\Answer::class, 1)->make()->toArray()[0];
        $newAnswerData = [
            'content' => $newAnswerData['content'],
            'user_id' => $newAnswerData['user_id'],
            'question_id' => $newAnswerData['question_id']
        ];
        $answer->fillWithData($newAnswerData);
        $changedAnswerArray = $answer->toArray();

        // check test case
        foreach($newAnswerData as $data){
            $this->assertTrue(in_array($data, $changedAnswerArray));
        }
    }

    public function testAnswerCreating()
    {
        $data = factory(\App\Answer::class, 1)->make()->toArray()[0];
        $answer = \App\Answer::createObject($data);

        $this->assertTrue(isset($answer->id));
    }

    public function testCreateObject()
    {
        $question = factory(\App\Question::class)->create();
        $answers = factory(\App\Answer::class, 5)->create()->each(function ($answer) use ($question) {
            $answer->question_id = $question->id;
        });
        try{
            $answerOne = $answers->get(1);
            $answerOne->makeBest();
            $answerTwo = $answers->get(2);
            $answerTwo->makeBest();
        } catch(Exception $e){}

        $this->assertTrue(
            $answerOne->is_best == 1
        );

        $this->assertFalse(
            $answerTwo->is_best == 1
        );
    }
}
