<?php
/**
 * Created by PhpStorm.
 * User: vital
 * Date: 2017/9/7
 * Time: 17:13
 */

$router->group(['prefix' => 'total/v8', 'as' => 'v8.total.'], function ($router){
    $router->get('index', 'v8\TotalController@index')->name('index');
});

$router->group(['prefix' => 'remain/v8', 'as' => 'v8.remain.'], function ($router){
    $router->get('index', 'API\ApiController@getVersion8RemainList')->name('index');
});

$router->group(['prefix' => 'member/v8', 'as' => 'v8.member.'], function ($router){
    $router->get('detail', 'v8\MemberController@detail')->name('detail');
    $router->get('index', 'v8\MemberController@index')->name('index');
});
/* 暂停购买配置项功能的路由 */
//$router->group(['prefix' => 'buyconfig/v8', 'as' => 'v8.buyconfig.'], function ($router){
//    $router->get('index', 'v8\BuyConfigController@index')->name('index');
//    $router->get('edit/{id}', 'v8\BuyConfigController@edit')->name('edit')->where('id', '[0-9]+');
//    $router->put('{id}', 'v8\BuyConfigController@update')->name('update')->where('id', '[0-9]+');
//});

$router->group(['prefix' => 'project/v8', 'as' => 'v8.project.'], function ($router){
    $router->get('index', 'v8\ProjectController@index')->name('index');
});

$router->group(['prefix' => 'coins/v8', 'as' => 'v8.coins.'], function ($router){
    $router->get('index', 'v8\CoinsController@index')->name('index');
});

$router->group(['prefix' => 'pay/v8', 'as' => 'v8.pay.'], function ($router){
    $router->get('index', 'v8\PayController@index')->name('index');
});

$router->group(['prefix' => 'order/v8', 'as' => 'v8.order.'], function($router){
    $router->get('index', 'v8\OrderController@index')->name('index');
    $router->get('complete', 'v8\OrderController@completeIndex')->name('complete');
    $router->put('index/{id}', 'v8\OrderController@update')->name('update');
    $router->put('down/{id}', 'v8\OrderController@down')->name('down');
    $router->get('completetoday', 'v8\OrderController@completeIndextoday')->name('completetoday');
});
//统计ip的接口
$router->group(['prefix'=>'ip/v8','as'=>'v8.ip.'],function($router){
    $router->get('index', 'v8\IpcountsController@index')->name('index');
});