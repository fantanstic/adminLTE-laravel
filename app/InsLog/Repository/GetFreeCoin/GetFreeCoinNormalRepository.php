<?php
/**
 * Created by PhpStorm.
 * User: vital
 * Date: 2017/8/24
 * Time: 17:26
 */

namespace App\InsLog\Repository\GetFreeCoin;


use App\InsLog\Eloquent\BaseRepository;
use App\Models\Normal\GetFreeCoinNormalCount;

class GetFreeCoinNormalRepository extends BaseRepository
{

    function model()
    {
        return GetFreeCoinNormalCount::class;
    }
}