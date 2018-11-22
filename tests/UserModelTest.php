<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class UserModelTest extends TestCase
{
    public function testFillWithData()
    {
        // init test case
        $user = \App\User::inRandomOrder()->first();
        $newUserData = factory(\App\User::class, 1)->make()->toArray()[0];
        $newUserData = [
            'email' => $newUserData['email'],
            'password' => app('hash')->make('changed'),
            'is_admin' => $newUserData['is_admin'],
        ];
        $user->fillWithData($newUserData);
        $changedUserArray = $user->toArray();
        // check test case
        foreach($newUserData as $key => $data){
            if ($key == "password"){
                continue;
            }
            $this->assertTrue(in_array($data, $changedUserArray));
        }
    }

    public function testCreateObject()
    {
        $data = factory(\App\User::class, 1)->make()->toArray()[0];
        $data['password'] = "secret";
        $user = \App\User::createObject($data);
        $this->assertTrue(isset($user->id));
    }
}
