<?php

namespace App\Http\Controllers\Admin\Relic;

use App\Http\Controllers\Controller;
use App\Service\RelicService;

class BaseController extends Controller
{
    public $service;

    public function __construct(RelicService $service)
    {
        $this->service = $service;
    }
}
