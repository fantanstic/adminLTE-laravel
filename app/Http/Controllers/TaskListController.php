<?php

namespace App\Http\Controllers;

use App\InsLog\Repository\TaskList\TaskListFailedRepository;
use App\InsLog\Repository\TaskList\TaskListNormalRepository;
use App\InsLog\Repository\TaskList\TaskListSuccessRepository;
use Illuminate\Http\Request;

class TaskListController extends Controller
{
    /**
     * TaskListController constructor.
     * @param $taskListNormalRepository
     * @param $taskListSuccessRepository
     * @param $taskListFailedRepository
     */
    public function __construct(TaskListNormalRepository $taskListNormalRepository,
                                TaskListSuccessRepository $taskListSuccessRepository,
                                TaskListFailedRepository $taskListFailedRepository)
    {
        $this->normalRepository = $taskListNormalRepository;
        $this->successRepository = $taskListSuccessRepository;
        $this->failedRepository = $taskListFailedRepository;
    }

    public function storeTaskListRequestCount(Request $request)
    {
        $this->incrementNormalCount($request);
        $attributes = getRequestParam($request);
        if ($request->input('status'))
        {
            return $this->successRepository->create($attributes);
        }
        return $this->failedRepository->create($attributes);
    }

    protected function incrementTaskListNormalCount()
    {
        $date = date('Y-m-d');
        $model = $this->normalRepository->firstOrCreate(['date' => $date]);
        $model->count += 1;
        $model->updated_at = date('Y-m-d H:i:s');
        $model->save();
    }
}
