<?php

namespace App\Http\Controllers\Admin\Spec;

use App\Http\Controllers\Controller;
use App\Service\SpecService;

class BaseController extends Controller
{
    public $service;

    public function __construct(SpecService $service)
    {
        $this->service = $service;
    }
}
