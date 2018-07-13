<?php
/**
 * Created by PhpStorm.
 * User: vital
 * Date: 2017/8/24
 * Time: 16:11
 */

namespace App\InsLog\Repository\MoneyOrder;


use App\InsLog\Eloquent\BaseRepository;
use App\Models\Success\MoneyOrderSuccessCount;

class MoneyOrderSuccessRepository extends BaseRepository
{

    function model()
    {
        return MoneyOrderSuccessCount::class;
    }
}