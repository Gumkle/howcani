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

$router->group(['prefix' => 'api'], function () use ($router) {

    $router->group(['prefix' => 'question'], function() use ($router) {
        $router->get('/', 'QuestionController@index');
        $router->get('/{question}', 'QuestionController@show');
        $router->post('/', 'QuestionController@store');
        $router->patch('/{question}', 'QuestionController@update');
        $router->delete('/{question}', 'QuestionController@destroy');
    });

    $router->group(['prefix' => 'answer'], function() use ($router) {
        $router->post('/', 'AnswerController@store');
        $router->patch('/{answer}', 'AnswerController@update');
        $router->delete('/{answer}', 'AnswerController@destroy');
    });

    $router->group(['prefix' => 'comment'], function() use ($router) {
        $router->post('/', 'CommentController@store');
        $router->patch('/{comment}', 'CommentController@update');
        $router->delete('/{comment}', 'CommentController@destroy');
    });

    $router->group(['prefix' => 'rating'], function() use ($router) {
        $router->post('/', 'RatingController@store');
        $router->delete('/{rating}', 'RatingController@destroy');
    });

    $router->group(['prefix' => 'user'], function() use ($router) {
        $router->post('/', 'UserController@store');
        $router->get('/{user}', 'UserController@show');
        $router->patch('/{user}', 'UserController@update');
        $router->delete('/{user}', 'UserController@destroy');
    });
});
