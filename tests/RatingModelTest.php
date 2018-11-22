<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class RatingModelTest extends TestCase
{
    public function testFillWithData()
    {
        // init test case
        $rating = \App\Rating::inRandomOrder()->first();
        $newRatingData = factory(\App\Rating::class, 1)->make()->toArray()[0];
        $newRatingData = [
            'user_id' => $newRatingData['user_id'],
            'object_type' => $newRatingData['object_type'],
            'object_id' => $newRatingData['object_id'],
            'rating' => $newRatingData['rating'],
        ];
        $oldRatedObjectRate = $rating->object->total_rating;

        $rating->fillWithData($newRatingData);

        $newRatedObjectRate = $rating->object->total_rating;
        $changedRatingArray = $rating->toArray();

        // check test case

        if($newRatingData['rating'] == 1){

            $this->assertTrue(
                $oldRatedObjectRate + 1 == $newRatedObjectRate
            );
        } else {
            $this->assertTrue(
                $oldRatedObjectRate -1 == $newRatedObjectRate
            );
        }
        foreach($newRatingData as $data){
            $this->assertTrue(in_array($data, $changedRatingArray));
        }
    }

    public function testCreateObject()
    {
        $data = factory(\App\Rating::class, 1)->make()->toArray()[0];
        $rating = \App\Rating::createObject($data);

        $this->assertTrue(isset($rating->id));
    }
}
