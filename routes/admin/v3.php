<?php
/**
 * Created by PhpStorm.
 * User: vital
 * Date: 2017/9/7
 * Time: 17:13
 */

$router->group(['prefix' => 'total/v3', 'as' => 'v3.total.'], function ($router){
    $router->get('index', 'v3\TotalController@index')->name('index');
});

$router->group(['prefix' => 'remain/v3', 'as' => 'v3.remain.'], function ($router){
    $router->get('index', 'API\ApiController@getVersion3RemainList')->name('index');
});

$router->group(['prefix' => 'member/v3', 'as' => 'v3.member.'], function ($router){
    $router->get('detail', 'v3\MemberController@detail')->name('detail');
    $router->get('index', 'v3\MemberController@index')->name('index');
});
/* 暂停购买配置项功能的路由 */
//$router->group(['prefix' => 'buyconfig/v3', 'as' => 'v3.buyconfig.'], function ($router){
//    $router->get('index', 'v3\BuyConfigController@index')->name('index');
//    $router->get('edit/{id}', 'v3\BuyConfigController@edit')->name('edit')->where('id', '[0-9]+');
//    $router->put('{id}', 'v3\BuyConfigController@update')->name('update')->where('id', '[0-9]+');
//});

$router->group(['prefix' => 'project/v3', 'as' => 'v3.project.'], function ($router){
    $router->get('index', 'v3\ProjectController@index')->name('index');
});

$router->group(['prefix' => 'coins/v3', 'as' => 'v3.coins.'], function ($router){
    $router->get('index', 'v3\CoinsController@index')->name('index');
});

$router->group(['prefix' => 'pay/v3', 'as' => 'v3.pay.'], function ($router){
    $router->get('index', 'v3\PayController@index')->name('index');
});

$router->group(['prefix' => 'order/v3', 'as' => 'v3.order.'], function($router){
    $router->get('index', 'v3\OrderController@index')->name('index');
    $router->get('complete', 'v3\OrderController@completeIndex')->name('complete');
    $router->put('index/{id}', 'v3\OrderController@update')->name('update');
    $router->put('down/{id}', 'v3\OrderController@down')->name('down');
    $router->get('completetoday', 'v3\OrderController@completeIndextoday')->name('completetoday');
});
//统计ip的接口
$router->group(['prefix'=>'ip/v3','as'=>'v3.ip.'],function($router){
    $router->get('index', 'v3\IpcountsController@index')->name('index');
});