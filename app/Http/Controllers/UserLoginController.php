<?php

namespace App\Http\Controllers;

use App\InsLog\Repository\UserLogin\UserLoginFailedRepository;
use App\InsLog\Repository\UserLogin\UserLoginNormalRepository;
use App\InsLog\Repository\UserLogin\UserLoginSuccessRepository;
use Illuminate\Http\Request;

class UserLoginController extends Controller
{
    /**
     * UserLoginController constructor.
     * @param $userLoginNormalRepository
     * @param $userLoginSuccessRepository
     * @param $userLoginFailedRepository
     */
    public function __construct(UserLoginNormalRepository $userLoginNormalRepository,
                                UserLoginSuccessRepository $userLoginSuccessRepository,
                                UserLoginFailedRepository $userLoginFailedRepository)
    {
        $this->normalRepository = $userLoginNormalRepository;
        $this->successRepository = $userLoginSuccessRepository;
        $this->failedRepository = $userLoginFailedRepository;
    }


    /**
     * 保存用户登录接口成功或失败的请求次数
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeUserLoginRequestCount(Request $request)
    {
        //增加统计请求总数
        $this->incrementNormalCount($request);
        $attributes = getRequestParam($request);
        /*
         * 接收并处理用户登录状态请求
         * status => 1 表示为登录成功的请求
         * 反之表示为登录失败的请求
         */
        if ($request->input('status'))
        {
            return $this->successRepository->create($attributes);
        }
        return $this->failedRepository->create($attributes);
    }
}
