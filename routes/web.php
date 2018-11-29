<?php

/*
|--------------------------------------------------------------------------
| routerlication Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an routerlication.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/


$app->group(['prefix' => 'question'], function() use ($app) {
    $app->get('/', 'QuestionController@index');
    $app->get('/{question}', 'QuestionController@show');
    $app->post('/', 'QuestionController@store');
    $app->patch('/{question}', 'QuestionController@update');
    $app->delete('/{question}', 'QuestionController@destroy');
});

$app->group(['prefix' => 'answer'], function() use ($app) {
    $app->post('/', 'AnswerController@store');
    $app->patch('/{answer}', 'AnswerController@update');
    $app->delete('/{answer}', 'AnswerController@destroy');
});

$app->group(['prefix' => 'comment'], function() use ($app) {
    $app->post('/', 'CommentController@store');
    $app->patch('/{comment}', 'CommentController@update');
    $app->delete('/{comment}', 'CommentController@destroy');
});

$app->group(['prefix' => 'rating'], function() use ($app) {
    $app->post('/', 'RatingController@store');
    $app->delete('/{rating}', 'RatingController@destroy');
});

$app->group(['prefix' => 'user'], function() use ($app) {
    $app->post('/', 'UserController@store');
    $app->get('/{user}', 'UserController@show');
    $app->patch('/{user}', 'UserController@update');
    $app->delete('/{user}', 'UserController@destroy');
});
