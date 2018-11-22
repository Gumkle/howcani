<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class QuestionModelTest extends TestCase
{
    public function testFillWithData()
    {
        // init test case
        $question = \App\Question::inRandomOrder()->first();
        $newQuestionData = factory(\App\Question::class, 1)->make()->toArray()[0];
        $newQuestionData = [
            'user_id' => $newQuestionData['user_id'],
            'title' => $newQuestionData['title'],
            'description' => $newQuestionData['description'],
        ];
        $question->fillWithData($newQuestionData);
        $changedQuestionArray = $question->toArray();

        // check test case
        foreach($newQuestionData as $data){
            $this->assertTrue(in_array($data, $changedQuestionArray));
        }
    }

    public function testCreateObject()
    {
        $data = factory(\App\Question::class, 1)->make()->toArray()[0];
        $question = \App\Question::createObject($data);

        $this->assertTrue(isset($question->id));
    }
}
