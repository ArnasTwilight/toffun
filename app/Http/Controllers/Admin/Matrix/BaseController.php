<?php

namespace App\Http\Controllers\Admin\Matrix;

use App\Http\Controllers\Controller;
use App\Service\MatrixService;

class BaseController extends Controller
{
    public $service;

    public function __construct(MatrixService $service)
    {
        $this->service = $service;
    }
}
