<?php

namespace App\Http\Controllers\Relic;

use App\Http\Controllers\Controller;
use App\Models\Relic;

class ShowController extends Controller
{
    public function __invoke(Relic $relic)
    {
        return view('relic.show', compact('relic'));
    }
}
