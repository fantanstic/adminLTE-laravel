<?php
/**
 * Created by PhpStorm.
 * User: vital
 * Date: 2017/8/24
 * Time: 16:51
 */

namespace App\InsLog\Repository\CoinOrderLike;


use App\InsLog\Eloquent\BaseRepository;
use App\Models\Failed\CoinOrderLikeFailedCount;

class CoinOrderLikeFailedRepository extends BaseRepository
{

    function model()
    {
        return CoinOrderLikeFailedCount::class;
    }
}