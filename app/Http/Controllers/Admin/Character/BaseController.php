<?php

namespace App\Http\Controllers\Admin\Character;

use App\Http\Controllers\Controller;
use App\Service\CharacterService;

class BaseController extends Controller
{
    public $service;

    public function __construct(CharacterService $service)
    {
        $this->service = $service;
    }
}
