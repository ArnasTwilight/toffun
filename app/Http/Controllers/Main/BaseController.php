<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Service\MainService;

class BaseController extends Controller
{
    public $service;

    public function __construct(MainService $service)
    {
        $this->service = $service;
    }
}
