<?php
/**
 * Created by PhpStorm.
 * User: vital
 * Date: 2017/9/7
 * Time: 17:13
 */

$router->group(['prefix' => 'total/v4', 'as' => 'v4.total.'], function ($router){
    $router->get('index', 'v4\TotalController@index')->name('index');
});

$router->group(['prefix' => 'remain/v4', 'as' => 'v4.remain.'], function ($router){
    $router->get('index', 'API\ApiController@getVersion4RemainList')->name('index');
});

$router->group(['prefix' => 'member/v4', 'as' => 'v4.member.'], function ($router){
    $router->get('detail', 'v4\MemberController@detail')->name('detail');
    $router->get('index', 'v4\MemberController@index')->name('index');
});
/* 暂停购买配置项功能的路由 */
//$router->group(['prefix' => 'buyconfig/v4', 'as' => 'v4.buyconfig.'], function ($router){
//    $router->get('index', 'v4\BuyConfigController@index')->name('index');
//    $router->get('edit/{id}', 'v4\BuyConfigController@edit')->name('edit')->where('id', '[0-9]+');
//    $router->put('{id}', 'v4\BuyConfigController@update')->name('update')->where('id', '[0-9]+');
//});

$router->group(['prefix' => 'project/v4', 'as' => 'v4.project.'], function ($router){
    $router->get('index', 'v4\ProjectController@index')->name('index');
});

$router->group(['prefix' => 'coins/v4', 'as' => 'v4.coins.'], function ($router){
    $router->get('index', 'v4\CoinsController@index')->name('index');
});

$router->group(['prefix' => 'pay/v4', 'as' => 'v4.pay.'], function ($router){
    $router->get('index', 'v4\PayController@index')->name('index');
});

$router->group(['prefix' => 'order/v4', 'as' => 'v4.order.'], function($router){
    $router->get('index', 'v4\OrderController@index')->name('index');
    $router->get('complete', 'v4\OrderController@completeIndex')->name('complete');
    $router->get('completetoday', 'v4\OrderController@completeIndextoday')->name('completetoday');
    $router->put('index/{id}', 'v4\OrderController@update')->name('update');
    $router->put('down/{id}', 'v4\OrderController@down')->name('down');
});