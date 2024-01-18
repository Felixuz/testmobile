<?php

namespace App\Http\Controllers;


use App\Services\AdsService;
use Illuminate\Http\Request;


class AdsController extends Controller
{
    public function __construct(protected AdsService $adsService)
    {
    }

    public function getAll(){
        return $this->adsService->getList();
    }

    /**
     * @param Request $request
     * @response array{"title":"fitnes","description":"fitnes","location":"New York City,Street Orlando"}
     */

    public function save(Request $request)
    {
        return $this->adsService->create($request->all());
    }
}
