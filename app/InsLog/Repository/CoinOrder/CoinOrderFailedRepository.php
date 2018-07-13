<?php
/**
 * Created by PhpStorm.
 * User: vital
 * Date: 2017/8/24
 * Time: 17:40
 */

namespace App\InsLog\Repository\CoinOrder;


use App\InsLog\Eloquent\BaseRepository;
use App\Models\Failed\CoinOrderFailedCount;

class CoinOrderFailedRepository extends BaseRepository
{

    function model()
    {
        return CoinOrderFailedCount::class;
    }
}