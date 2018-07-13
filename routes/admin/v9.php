<?php
/**
 * Created by PhpStorm.
 * User: vital
 * Date: 2017/9/7
 * Time: 17:13
 */

$router->group(['prefix' => 'total/v9', 'as' => 'v9.total.'], function ($router){
    $router->get('index', 'v9\TotalController@index')->name('index');
});

$router->group(['prefix' => 'remain/v9', 'as' => 'v9.remain.'], function ($router){
    $router->get('index', 'API\ApiController@getVersion9RemainList')->name('index');
});

$router->group(['prefix' => 'member/v9', 'as' => 'v9.member.'], function ($router){
    $router->get('detail', 'v9\MemberController@detail')->name('detail');
    $router->get('index', 'v9\MemberController@index')->name('index');
});
/* 暂停购买配置项功能的路由 */
//$router->group(['prefix' => 'buyconfig/v9', 'as' => 'v9.buyconfig.'], function ($router){
//    $router->get('index', 'v9\BuyConfigController@index')->name('index');
//    $router->get('edit/{id}', 'v9\BuyConfigController@edit')->name('edit')->where('id', '[0-9]+');
//    $router->put('{id}', 'v9\BuyConfigController@update')->name('update')->where('id', '[0-9]+');
//});

$router->group(['prefix' => 'project/v9', 'as' => 'v9.project.'], function ($router){
    $router->get('index', 'v9\ProjectController@index')->name('index');
});

$router->group(['prefix' => 'coins/v9', 'as' => 'v9.coins.'], function ($router){
    $router->get('index', 'v9\CoinsController@index')->name('index');
});

$router->group(['prefix' => 'pay/v9', 'as' => 'v9.pay.'], function ($router){
    $router->get('index', 'v9\PayController@index')->name('index');
});

$router->group(['prefix' => 'order/v9', 'as' => 'v9.order.'], function($router){
    $router->get('index', 'v9\OrderController@index')->name('index');
    $router->get('complete', 'v9\OrderController@completeIndex')->name('complete');
    $router->put('index/{id}', 'v9\OrderController@update')->name('update');
    $router->put('down/{id}', 'v9\OrderController@down')->name('down');
    $router->get('completetoday', 'v9\OrderController@completeIndextoday')->name('completetoday');
});
//统计ip的接口
$router->group(['prefix'=>'ip/v9','as'=>'v9.ip.'],function($router){
    $router->get('index', 'v9\IpcountsController@index')->name('index');
});

//展示paypalstrip的内容
$router->group(['prefix'=>'paypalstrip/v9','as'=>'v9.paypalstrip.'],function($router){
    $router->get('index','v9\PaypalStripController@index')->name('index');
});