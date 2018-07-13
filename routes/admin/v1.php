<?php
/**
 * Created by PhpStorm.
 * User: vital
 * Date: 2017/8/28
 * Time: 16:04
 */

$router->group(['prefix' => 'total/v1', 'as' => 'v1.total.'], function ($router){
    $router->get('index', 'v1\TotalController@index')->name('index');
});

$router->group(['prefix' => 'remain/v1', 'as' => 'v1.remain.'], function ($router){
    $router->get('index', 'API\ApiController@getVersion1RemainList')->name('index');
});

$router->group(['prefix' => 'member/v1', 'as' => 'v1.member.'], function ($router){
    $router->get('detail', 'v1\MemberController@detail')->name('detail');
    $router->get('index', 'v1\MemberController@index')->name('index');
});


$router->group(['prefix' => 'project/v1', 'as' => 'v1.project.'], function ($router){
    $router->get('index', 'v1\ProjectController@index')->name('index');
});

$router->group(['prefix' => 'coins/v1', 'as' => 'v1.coins.'], function ($router){
    $router->get('index', 'v1\CoinsController@index')->name('index');
});

$router->group(['prefix' => 'pay/v1', 'as' => 'v1.pay.'], function ($router){
    $router->get('index', 'v1\PayController@index')->name('index');
});

$router->group(['prefix' => 'order/v1', 'as' => 'v1.order.'], function($router){
    $router->get('index', 'v1\OrderController@index')->name('index');
    $router->get('complete', 'v1\OrderController@completeIndex')->name('complete');
    $router->get('completetoday', 'v1\OrderController@completeIndextoday')->name('completetoday');
    $router->put('index/{id}', 'v1\OrderController@update')->name('update');
    $router->put('down/{id}', 'v1\OrderController@down')->name('down');
});