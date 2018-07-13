<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $normalRepository;
    protected $successRepository;
    protected $failedRepository;

    protected function incrementNormalCount($request)
    {
        $date = date('Y-m-d');
        $version = $request->input('version');
        $model = $this->normalRepository->firstOrCreate(['date' => $date]);
        if ($version == 1)
        {
            $model->version1_count += 1;
        }else
        {
            $model->version2_count += 1;
        }
        $model->updated_at = date('Y-m-d H:i:s');
        $model->save();
    }
}
