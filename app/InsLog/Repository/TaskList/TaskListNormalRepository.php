<?php
/**
 * Created by PhpStorm.
 * User: vital
 * Date: 2017/8/24
 * Time: 14:54
 */

namespace App\InsLog\Repository\TaskList;


use App\InsLog\Eloquent\BaseRepository;
use App\Models\Normal\TaskListNormalCount;

class TaskListNormalRepository extends BaseRepository
{
    function model()
    {
        return TaskListNormalCount::class;
    }

}