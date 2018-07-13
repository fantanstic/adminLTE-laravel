<?php

namespace App\Http\Controllers;

use App\InsLog\Repository\MoneyOrder\MoneyOrderFailedRepository;
use App\InsLog\Repository\MoneyOrder\MoneyOrderNormalRepository;
use App\InsLog\Repository\MoneyOrder\MoneyOrderSuccessRepository;
use Illuminate\Http\Request;

class MoneyOrderController extends Controller
{

    /**
     * MoneyOrderController constructor.
     * @param $moneyOrderNormalRepository
     * @param $moneyOrderSuccessRepository
     * @param $moneyOrderFailedRepository
     */
    public function __construct(MoneyOrderNormalRepository $moneyOrderNormalRepository,
                                MoneyOrderSuccessRepository $moneyOrderSuccessRepository,
                                MoneyOrderFailedRepository $moneyOrderFailedRepository)
    {
        $this->normalRepository = $moneyOrderNormalRepository;
        $this->successRepository = $moneyOrderSuccessRepository;
        $this->failedRepository = $moneyOrderFailedRepository;
    }

    public function storeMoneyOrderRequestCount(Request $request)
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
