<?php

namespace App\Http\Controllers;

use App\InsLog\Repository\CoinOrderLike\CoinOrderLikeFailedRepository;
use App\InsLog\Repository\CoinOrderLike\CoinOrderLikeNormalRepository;
use App\InsLog\Repository\CoinOrderLike\CoinOrderLikeSuccessRepository;
use Illuminate\Http\Request;

class CoinOrderLikeController extends Controller
{

    /**
     * CoinOrderLikeController constructor.
     * @param $coinOrderLikeNormalRepository
     * @param $coinOrderLikeSuccessRepository
     * @param $coinOrderLikeFailedRepository
     */
    public function __construct(CoinOrderLikeNormalRepository $coinOrderLikeNormalRepository,
                                CoinOrderLikeSuccessRepository $coinOrderLikeSuccessRepository,
                                CoinOrderLikeFailedRepository $coinOrderLikeFailedRepository)
    {
        $this->normalRepository = $coinOrderLikeNormalRepository;
        $this->successRepository = $coinOrderLikeSuccessRepository;
        $this->failedRepository = $coinOrderLikeFailedRepository;
    }

    public function storeCoinOrderLikeRequestCount(Request $request)
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
