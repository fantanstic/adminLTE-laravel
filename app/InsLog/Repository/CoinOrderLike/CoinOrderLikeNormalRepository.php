<?php
/**
 * Created by PhpStorm.
 * User: vital
 * Date: 2017/8/24
 * Time: 16:39
 */

namespace App\InsLog\Repository\CoinOrderLike;


use App\InsLog\Eloquent\BaseRepository;
use App\Models\Normal\CoinOrderLikeNormalCount;

class CoinOrderLikeNormalRepository extends BaseRepository
{

    function model()
    {
        return CoinOrderLikeNormalCount::class;
    }
}