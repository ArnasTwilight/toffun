<?php

namespace App\Http\Controllers\Admin\Gift;

use App\Http\Controllers\Controller;
use App\Service\GiftService;

class BaseController extends Controller
{
    public $service;

    public function __construct(GiftService $service)
    {
        $this->service = $service;
    }
}
