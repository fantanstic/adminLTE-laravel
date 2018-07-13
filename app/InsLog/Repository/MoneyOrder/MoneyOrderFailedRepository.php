<?php
/**
 * Created by PhpStorm.
 * User: vital
 * Date: 2017/8/24
 * Time: 16:12
 */

namespace App\InsLog\Repository\MoneyOrder;


use App\InsLog\Eloquent\BaseRepository;
use App\Models\Failed\MoneyOrderFailedCount;

class MoneyOrderFailedRepository extends BaseRepository
{
    function model()
    {
        return MoneyOrderFailedCount::class;
    }

}