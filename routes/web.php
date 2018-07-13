<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function (){
    //return view('welcome');
});
Route::group(['prefix' => 'member'], function ($router){
    /* 用户登录接口请求次数统计 */
    $router->get('userLogin', 'UserLoginController@storeUserLoginRequestCount');
    /* 获取免费金币接口请求次数统计 */
    $router->get('getFreeCoin', 'GetFreeCoinController@storeGetFreeCoinRequestCount');
});

Route::group(['prefix' => 'task'], function ($router){
    /* 任务列表接口请求次数统计 */
    $router->get('taskList', 'TaskListController@storeTaskListRequestCount');
});

Route::group(['prefix' => 'order', 'middleware' => 'throttle:1000,1'], function ($router){
    /* 用钱发任务接口请求次数统计 */
    $router->get('moneyOrder', 'MoneyOrderController@storeMoneyOrderRequestCount');
    /* 用金币买Like接口请求次数统计 */
    $router->get('coinOrderLike', 'CoinOrderLikeController@storeCoinOrderLikeRequestCount');
    /* 用金币发任务接口请求次数统计 */
    $router->get('coinOrder', 'CoinOrderController@storeCoinOrderRequestCount');
});


Route::get('admin/login', 'AdminController@login');
Route::post('admin/login', 'AdminController@dealLogin')->name('dealLogin');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth.admin'], function ($router){
    $router->get('/', 'AdminController@index')->name('index');
    require __DIR__ .'/admin/v1.php';
    require __DIR__ .'/admin/v2.php';
    require __DIR__ .'/admin/v3.php';
    require __DIR__ .'/admin/v4.php';
    require __DIR__ .'/admin/v5.php';
    require __DIR__ .'/admin/getInstaFollow.php';
    require __DIR__ .'/admin/v7.php';
    require __DIR__ .'/admin/v6.php';
    require __DIR__ .'/admin/v10.php';
    require __DIR__ .'/admin/v8.php';
    require __DIR__ .'/admin/v9.php';
});


Route::get('test', function (){
   $caches = \Illuminate\Support\Facades\Cache::tags('remain_v2')->get('userLogin');
   dd($caches);
});