<?php
/**
 * Created by PhpStorm.
 * User: vital
 * Date: 2017/8/24
 * Time: 14:56
 */

namespace App\InsLog\Repository\TaskList;


use App\InsLog\Eloquent\BaseRepository;
use App\Models\Failed\TaskListFailedCount;

class TaskListFailedRepository extends BaseRepository
{
    function model()
    {
        return TaskListFailedCount::class;
    }

}