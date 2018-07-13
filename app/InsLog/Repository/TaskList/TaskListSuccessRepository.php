<?php
/**
 * Created by PhpStorm.
 * User: vital
 * Date: 2017/8/24
 * Time: 14:55
 */

namespace App\InsLog\Repository\TaskList;


use App\InsLog\Eloquent\BaseRepository;
use App\Models\Success\TaskListSuccessCount;

class TaskListSuccessRepository extends BaseRepository
{

    function model()
    {
        return TaskListSuccessCount::class;
    }
}