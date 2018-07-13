<?php
$router->group(['prefix'=>'getIns','namespace'=>'GetInstaFollow'],function ($router){
    $router->get('user','UserController@userList')->name('web.ins.user');
    $router->get('like','OrderController@like')->name('web.ins.like');
    $router->get('follow','OrderController@follow')->name('web.ins.follow');
    $router->get('orderDetail','OrderController@orderDetail')->name('web.ins.orderDetail');
    $router->get('orderList','OrderController@orderList')->name('web.ins.orderList');
    $router->get('message','UserController@message')->name('web.ins.message');
    $router->get('from','UserController@from')->name('web.ins.from');
    $router->get('sendEmail','OrderController@sendEmail')->name('web.ins.sendEmail');
    $router->get('index', 'OrderController@index')->name('web.ins.index');
    $router->get('complete', 'OrderController@completeIndex')->name('web.ins.complete');
    $router->get('completetoday', 'OrderController@completeIndextoday')->name('web.ins.completetoday');
    $router->put('index/{id}', 'OrderController@update')->name('web.ins.update');
    $router->put('down/{id}', 'OrderController@down')->name('web.ins.down');
//    $router->get('completetoday', 'v7\OrderController@completeIndextoday')->name('completetoday');
    //手动增加订单
    $router->get('addOrderByAdmin', 'OrderController@addOrderByAdmin')->name('web.ins.addOrder');
});