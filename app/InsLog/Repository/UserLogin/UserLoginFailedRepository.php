<?php
/**
 * Created by PhpStorm.
 * User: vital
 * Date: 2017/8/24
 * Time: 13:40
 */

namespace App\InsLog\Repository\UserLogin;


use App\InsLog\Eloquent\BaseRepository;
use App\Models\Failed\UserLoginFailedCount;

class UserLoginFailedRepository extends BaseRepository
{
    function model()
    {
        return UserLoginFailedCount::class;
    }

}