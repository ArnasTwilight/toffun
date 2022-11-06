<?php

namespace App\Http\Controllers\Relic;

use App\Http\Controllers\Controller;
use App\Models\Relic;

class IndexController extends Controller
{
    public function __invoke()
    {
        $relics = Relic::all();
        return view('relic.index', compact('relics'));
    }
}
