<?php

namespace App\Http\Controllers\Admin\Ingredient;

use App\Http\Controllers\Controller;
use App\Service\IngredientService;

class BaseController extends Controller
{
    public $service;

    public function __construct(IngredientService $service)
    {
        $this->service = $service;
    }
}
