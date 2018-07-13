<?php
/**
 * Created by PhpStorm.
 * User: vital
 * Date: 2017/9/7
 * Time: 17:13
 */

$router->group(['prefix' => 'total/v10', 'as' => 'v10.total.'], function ($router){
    $router->get('index', 'v10\TotalController@index')->name('index');
});

$router->group(['prefix' => 'remain/v10', 'as' => 'v10.remain.'], function ($router){
    $router->get('index', 'API\ApiController@getVersion4RemainList')->name('index');
});

$router->group(['prefix' => 'member/v10', 'as' => 'v10.member.'], function ($router){
    $router->get('detail', 'v10\MemberController@detail')->name('detail');
    $router->get('index', 'v10\MemberController@index')->name('index');
});
/* 暂停购买配置项功能的路由 */
//$router->group(['prefix' => 'buyconfig/v10', 'as' => 'v10.buyconfig.'], function ($router){
//    $router->get('index', 'v10\BuyConfigController@index')->name('index');
//    $router->get('edit/{id}', 'v10\BuyConfigController@edit')->name('edit')->where('id', '[0-9]+');
//    $router->put('{id}', 'v10\BuyConfigController@update')->name('update')->where('id', '[0-9]+');
//});

$router->group(['prefix' => 'project/v10', 'as' => 'v10.project.'], function ($router){
    $router->get('index', 'v10\ProjectController@index')->name('index');
});

$router->group(['prefix' => 'coins/v10', 'as' => 'v10.coins.'], function ($router){
    $router->get('index', 'v10\CoinsController@index')->name('index');
});

$router->group(['prefix' => 'pay/v10', 'as' => 'v10.pay.'], function ($router){
    $router->get('index', 'v10\PayController@index')->name('index');
});

$router->group(['prefix' => 'order/v10', 'as' => 'v10.order.'], function($router){
    $router->get('index', 'v10\OrderController@index')->name('index');
    $router->get('complete', 'v10\OrderController@completeIndex')->name('complete');
    $router->get('completetoday', 'v10\OrderController@completeIndextoday')->name('completetoday');
    $router->put('index/{id}', 'v10\OrderController@update')->name('update');
    $router->put('down/{id}', 'v10\OrderController@down')->name('down');
});