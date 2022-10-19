<?php

namespace App\Http\Controllers\Admin\Relic;

use App\Models\Relic;

class ShowController extends BaseController
{
    public function __invoke(Relic $relic)
    {
        return view('admin.relic.show', compact('relic'));
    }
}
