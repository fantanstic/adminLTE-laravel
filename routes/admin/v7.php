<?php
/**
 * Created by PhpStorm.
 * User: vital
 * Date: 2017/9/7
 * Time: 17:13
 */

$router->group(['prefix' => 'total/v7', 'as' => 'v7.total.'], function ($router){
    $router->get('index', 'v7\TotalController@index')->name('index');
});

$router->group(['prefix' => 'remain/v7', 'as' => 'v7.remain.'], function ($router){
    $router->get('index', 'API\ApiController@getVersion7RemainList')->name('index');
});

$router->group(['prefix' => 'member/v7', 'as' => 'v7.member.'], function ($router){
    $router->get('detail', 'v7\MemberController@detail')->name('detail');
    $router->get('index', 'v7\MemberController@index')->name('index');
});
/* 暂停购买配置项功能的路由 */
//$router->group(['prefix' => 'buyconfig/v7', 'as' => 'v7.buyconfig.'], function ($router){
//    $router->get('index', 'v7\BuyConfigController@index')->name('index');
//    $router->get('edit/{id}', 'v7\BuyConfigController@edit')->name('edit')->where('id', '[0-9]+');
//    $router->put('{id}', 'v7\BuyConfigController@update')->name('update')->where('id', '[0-9]+');
//});

$router->group(['prefix' => 'project/v7', 'as' => 'v7.project.'], function ($router){
    $router->get('index', 'v7\ProjectController@index')->name('index');
});

$router->group(['prefix' => 'coins/v7', 'as' => 'v7.coins.'], function ($router){
    $router->get('index', 'v7\CoinsController@index')->name('index');
});

$router->group(['prefix' => 'pay/v7', 'as' => 'v7.pay.'], function ($router){
    $router->get('index', 'v7\PayController@index')->name('index');
});

$router->group(['prefix' => 'order/v7', 'as' => 'v7.order.'], function($router){
    $router->get('index', 'v7\OrderController@index')->name('index');
    $router->get('complete', 'v7\OrderController@completeIndex')->name('complete');
    $router->put('index/{id}', 'v7\OrderController@update')->name('update');
    $router->put('down/{id}', 'v7\OrderController@down')->name('down');
    $router->get('completetoday', 'v7\OrderController@completeIndextoday')->name('completetoday');
});
//统计ip的接口
$router->group(['prefix'=>'ip/v7','as'=>'v7.ip.'],function($router){
    $router->get('index', 'v7\IpcountsController@index')->name('index');
});