<?php
/**
 * Created by PhpStorm.
 * User: vital
 * Date: 2017/9/7
 * Time: 17:13
 */

$router->group(['prefix' => 'total/v5', 'as' => 'v5.total.'], function ($router){
    $router->get('index', 'v5\TotalController@index')->name('index');
});

$router->group(['prefix' => 'remain/v5', 'as' => 'v5.remain.'], function ($router){
    $router->get('index', 'API\ApiController@getVersion5RemainList')->name('index');
});

$router->group(['prefix' => 'member/v5', 'as' => 'v5.member.'], function ($router){
    $router->get('detail', 'v5\MemberController@detail')->name('detail');
    $router->get('index', 'v5\MemberController@index')->name('index');
});
/* 暂停购买配置项功能的路由 */
//$router->group(['prefix' => 'buyconfig/v5', 'as' => 'v5.buyconfig.'], function ($router){
//    $router->get('index', 'v5\BuyConfigController@index')->name('index');
//    $router->get('edit/{id}', 'v5\BuyConfigController@edit')->name('edit')->where('id', '[0-9]+');
//    $router->put('{id}', 'v5\BuyConfigController@update')->name('update')->where('id', '[0-9]+');
//});

$router->group(['prefix' => 'project/v5', 'as' => 'v5.project.'], function ($router){
    $router->get('index', 'v5\ProjectController@index')->name('index');
});

$router->group(['prefix' => 'coins/v5', 'as' => 'v5.coins.'], function ($router){
    $router->get('index', 'v5\CoinsController@index')->name('index');
});

$router->group(['prefix' => 'pay/v5', 'as' => 'v5.pay.'], function ($router){
    $router->get('index', 'v5\PayController@index')->name('index');
});

$router->group(['prefix' => 'order/v5', 'as' => 'v5.order.'], function($router){
    $router->get('index', 'v5\OrderController@index')->name('index');
    $router->get('complete', 'v5\OrderController@completeIndex')->name('complete');
    $router->get('completetoday', 'v5\OrderController@completeIndextoday')->name('completetoday');
    $router->put('index/{id}', 'v5\OrderController@update')->name('update');
    $router->put('down/{id}', 'v5\OrderController@down')->name('down');
});