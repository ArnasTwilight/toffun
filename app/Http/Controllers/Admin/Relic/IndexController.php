<?php

namespace App\Http\Controllers\Admin\Relic;

use App\Models\Relic;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $relics = Relic::orderByDesc('updated_at')->paginate(9);

        return view('admin.relic.index', compact('relics'));
    }
}
