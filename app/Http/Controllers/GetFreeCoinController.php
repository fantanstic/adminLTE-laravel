<?php

namespace App\Http\Controllers;

use App\InsLog\Repository\GetFreeCoin\GetFreeCoinFailedRepository;
use App\InsLog\Repository\GetFreeCoin\GetFreeCoinNormalRepository;
use App\InsLog\Repository\GetFreeCoin\GetFreeCoinSuccessRepository;
use Illuminate\Http\Request;

class GetFreeCoinController extends Controller
{


    /**
     * GetFreeCoinController constructor.
     * @param GetFreeCoinNormalRepository $getFreeCoinNormalRepository
     * @param GetFreeCoinSuccessRepository $getFreeCoinSuccessRepository
     * @param GetFreeCoinFailedRepository $getFreeCoinFailedRepository
     */
    public function __construct(GetFreeCoinNormalRepository $getFreeCoinNormalRepository,
                                GetFreeCoinSuccessRepository $getFreeCoinSuccessRepository,
                                GetFreeCoinFailedRepository $getFreeCoinFailedRepository)
    {
        $this->normalRepository = $getFreeCoinNormalRepository;
        $this->successRepository = $getFreeCoinSuccessRepository;
        $this->failedRepository = $getFreeCoinFailedRepository;
    }

    public function storeGetFreeCoinRequestCount(Request $request)
    {
        $this->incrementNormalCount($request);
        $attributes = getRequestParam($request);

        if ($request->input('status'))
        {
            return $this->successRepository->create($attributes);
        }
        return $this->failedRepository->create($attributes);
    }
}
