<?php

namespace App\Http\Controllers\Admin\Food;

use App\Http\Controllers\Controller;
use App\Service\FoodService;

class BaseController extends Controller
{
    public $service;

    public function __construct(FoodService $service)
    {
        $this->service = $service;
    }
}
