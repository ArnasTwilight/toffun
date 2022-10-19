<?php

namespace App\Http\Controllers\Admin\Relic;

use App\Models\Relic;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $relics = Relic::paginate(9);
        return view('admin.relic.index', compact('relics'));
    }
}
