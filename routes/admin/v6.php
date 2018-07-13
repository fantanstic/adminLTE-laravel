<?php
/**
 * Created by PhpStorm.
 * User: vital
 * Date: 2017/9/7
 * Time: 17:13
 */

$router->group(['prefix' => 'total/v6', 'as' => 'v6.total.'], function ($router){
    $router->get('index', 'v6\TotalController@index')->name('index');
});

$router->group(['prefix' => 'remain/v6', 'as' => 'v6.remain.'], function ($router){
    $router->get('index', 'API\ApiController@getVersion6RemainList')->name('index');
});

$router->group(['prefix' => 'member/v6', 'as' => 'v6.member.'], function ($router){
    $router->get('detail', 'v6\MemberController@detail')->name('detail');
    $router->get('index', 'v6\MemberController@index')->name('index');
});
/* 暂停购买配置项功能的路由 */
//$router->group(['prefix' => 'buyconfig/v6', 'as' => 'v6.buyconfig.'], function ($router){
//    $router->get('index', 'v6\BuyConfigController@index')->name('index');
//    $router->get('edit/{id}', 'v6\BuyConfigController@edit')->name('edit')->where('id', '[0-9]+');
//    $router->put('{id}', 'v6\BuyConfigController@update')->name('update')->where('id', '[0-9]+');
//});

$router->group(['prefix' => 'project/v6', 'as' => 'v6.project.'], function ($router){
    $router->get('index', 'v6\ProjectController@index')->name('index');
});

$router->group(['prefix' => 'coins/v6', 'as' => 'v6.coins.'], function ($router){
    $router->get('index', 'v6\CoinsController@index')->name('index');
});

$router->group(['prefix' => 'pay/v6', 'as' => 'v6.pay.'], function ($router){
    $router->get('index', 'v6\PayController@index')->name('index');
});

$router->group(['prefix' => 'order/v6', 'as' => 'v6.order.'], function($router){
    $router->get('index', 'v6\OrderController@index')->name('index');
    $router->get('complete', 'v6\OrderController@completeIndex')->name('complete');
    $router->put('index/{id}', 'v6\OrderController@update')->name('update');
    $router->put('down/{id}', 'v6\OrderController@down')->name('down');
    $router->get('completetoday', 'v6\OrderController@completeIndextoday')->name('completetoday');
});
//统计ip的接口
$router->group(['prefix'=>'ip/v6','as'=>'v6.ip.'],function($router){
    $router->get('index', 'v6\IpcountsController@index')->name('index');
});