<?php
/**
 * Created by PhpStorm.
 * User: vital
 * Date: 2017/8/24
 * Time: 16:10
 */

namespace App\InsLog\Repository\MoneyOrder;


use App\InsLog\Eloquent\BaseRepository;
use App\Models\Normal\MoneyOrderNormalCount;

class MoneyOrderNormalRepository extends BaseRepository
{

    function model()
    {
        return MoneyOrderNormalCount::class;
    }
}