<?php

namespace App\Http\Controllers\Admin\Weapon;

use App\Http\Controllers\Controller;
use App\Service\WeaponService;

class BaseController extends Controller
{
    public $service;

    public function __construct(WeaponService $service)
    {
        $this->service = $service;
    }
}
