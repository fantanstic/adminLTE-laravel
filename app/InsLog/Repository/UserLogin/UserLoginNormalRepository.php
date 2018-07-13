<?php
/**
 * Created by PhpStorm.
 * User: vital
 * Date: 2017/8/24
 * Time: 13:41
 */

namespace App\InsLog\Repository\UserLogin;


use App\InsLog\Eloquent\BaseRepository;
use App\Models\Normal\UserLoginNormalCount;

class UserLoginNormalRepository extends BaseRepository
{

    function model()
    {
        return UserLoginNormalCount::class;
    }
}