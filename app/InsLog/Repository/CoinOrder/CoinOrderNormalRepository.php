<?php
/**
 * Created by PhpStorm.
 * User: vital
 * Date: 2017/8/24
 * Time: 17:39
 */

namespace App\InsLog\Repository\CoinOrder;


use App\InsLog\Eloquent\BaseRepository;
use App\Models\Normal\CoinOrderNormalCount;

class CoinOrderNormalRepository extends BaseRepository
{
    function model()
    {
        return CoinOrderNormalCount::class;
    }

}