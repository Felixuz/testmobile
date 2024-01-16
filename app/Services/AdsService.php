<?php
namespace App\Services;

use App\Models\Ads;

class AdsService extends BaseService
{
    public function __construct(Ads $model)
    {
        $this->model = $model;
    }
}