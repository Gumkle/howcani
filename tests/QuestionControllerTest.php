<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class QuestionControllerTest extends TestCase
{
    private $question_id;

    public function testStore()
    {

        $response = $this->post('/api/question');
    }

    public function testIndex()
    {
        \App\Question::truncate();

        // TODO empty list test

        $response = $this->get('/api/question');
        $response->assertResponseOk();
        $response->assertJsonStructure([
            'message',
            'data'
        ]);
    }

    public function testShow()
    {
        // TODO not found test

        $response = $this->get('/api/question/1');

        $response->assertResponseOk();
        $response->assertJsonStructure([
            'message',
            'data'
        ]);
    }

    public function testUpdate()
    {
        // TODO not found test

        $response = $this->patch('/api/question/1');
    }

    public function testDestroy()
    {
        // TODO not found test
        $response = $this->delete('/api/question/1');
    }
}
