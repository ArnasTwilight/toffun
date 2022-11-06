<?php

namespace App\Http\Controllers\Admin\Rarity;

use App\Http\Controllers\Controller;
use App\Service\RarityService;

class BaseController extends Controller
{
    public $service;

    public function __construct(RarityService $service)
    {
        $this->service = $service;
    }
}
