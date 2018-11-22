<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class CommentModelTest extends TestCase
{
    public function testFillWithData()
    {
        // init test case
        $comment = \App\Comment::inRandomOrder()->first();
        $newCommentData = factory(\App\Comment::class, 1)->make()->toArray()[0];
        $newCommentData = [
            'object_type' => $newCommentData['object_type'],
            'object_id' => $newCommentData['object_id'],
            'user_id' => $newCommentData['user_id'],
            'content' => $newCommentData['content'],
        ];
        $comment->fillWithData($newCommentData);
        $changedCommentArray = $comment->toArray();

        // check test case
        foreach($newCommentData as $data){
            $this->assertTrue(in_array($data, $changedCommentArray));
        }
    }

    public function testCreateObject()
    {
        $data = factory(\App\Comment::class, 1)->make()->toArray()[0];
        $comment = \App\Comment::createObject($data);

        $this->assertTrue(isset($comment->id));
    }
}
