<?php
/**
 * Created by PhpStorm.
 * User: vital
 * Date: 2017/8/28
 * Time: 9:49
 */

$router->group(['prefix' => 'total/v2', 'as' => 'v2.total.'], function ($router){
    $router->get('index', 'v2\TotalController@index')->name('index');
});

$router->group(['prefix' => 'remain/v2', 'as' => 'v2.remain.'], function ($router){
    $router->get('index', 'API\ApiController@getVersion2RemainList')->name('index');
});

$router->group(['prefix' => 'member/v2', 'as' => 'v2.member.'], function ($router){
    $router->get('detail', 'v2\MemberController@detail')->name('detail');
    $router->get('index', 'v2\MemberController@index')->name('index');
});
/* 暂停购买配置项功能的路由 */
//$router->group(['prefix' => 'buyconfig/v2', 'as' => 'v2.buyconfig.'], function ($router){
//    $router->get('index', 'v2\BuyConfigController@index')->name('index');
//    $router->get('edit/{id}', 'v2\BuyConfigController@edit')->name('edit')->where('id', '[0-9]+');
//    $router->put('{id}', 'v2\BuyConfigController@update')->name('update')->where('id', '[0-9]+');
//});

$router->group(['prefix' => 'project/v2', 'as' => 'v2.project.'], function ($router){
    $router->get('index', 'v2\ProjectController@index')->name('index');
});

$router->group(['prefix' => 'coins/v2', 'as' => 'v2.coins.'], function ($router){
    $router->get('index', 'v2\CoinsController@index')->name('index');
});

$router->group(['prefix' => 'pay/v2', 'as' => 'v2.pay.'], function ($router){
    $router->get('index', 'v2\PayController@index')->name('index');
});

$router->group(['prefix' => 'order/v2', 'as' => 'v2.order.'], function($router){
    $router->get('index', 'v2\OrderController@index')->name('index');
    $router->get('complete', 'v2\OrderController@completeIndex')->name('complete');
    $router->get('completetoday', 'v2\OrderController@completeIndextoday')->name('completetoday');
    $router->put('index/{id}', 'v2\OrderController@update')->name('update');
    $router->put('down/{id}', 'v2\OrderController@down')->name('down');
});