<?php

namespace App\Http\Controllers;

use App\InsLog\Repository\CoinOrder\CoinOrderFailedRepository;
use App\InsLog\Repository\CoinOrder\CoinOrderNormalRepository;
use App\InsLog\Repository\CoinOrder\CoinOrderSuccessRepository;
use Illuminate\Http\Request;

class CoinOrderController extends Controller
{



    public function __construct(CoinOrderNormalRepository $coinOrderNormalRepository,
                                CoinOrderSuccessRepository $coinOrderSuccessRepository,
                                CoinOrderFailedRepository $coinOrderFailedRepository)
    {
        $this->normalRepository = $coinOrderNormalRepository;
        $this->successRepository = $coinOrderSuccessRepository;
        $this->failedRepository = $coinOrderFailedRepository;
    }

    public function storeCoinOrderRequestCount(Request $request)
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
