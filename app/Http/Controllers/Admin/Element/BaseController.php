<?php

namespace App\Http\Controllers\Admin\Element;

use App\Http\Controllers\Controller;
use App\Service\ElementService;

class BaseController extends Controller
{
    public $service;

    public function __construct(ElementService $service)
    {
        $this->service = $service;
    }
}
