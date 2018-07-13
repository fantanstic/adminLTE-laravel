<?php
/**
 * Created by PhpStorm.
 * User: vital
 * Date: 2017/8/24
 * Time: 17:27
 */

namespace App\InsLog\Repository\GetFreeCoin;


use App\InsLog\Eloquent\BaseRepository;
use App\Models\Failed\GetFreeCoinFailedCount;

class GetFreeCoinFailedRepository extends BaseRepository
{

    function model()
    {
        return GetFreeCoinFailedCount::class;
    }
}