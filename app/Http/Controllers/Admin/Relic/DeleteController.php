<?php

namespace App\Http\Controllers\Admin\Relic;

use App\Models\Relic;

class DeleteController extends BaseController
{
    public function __invoke(Relic $relic)
    {
        $relic->delete();
        return redirect()->route('admin.relic.index');
    }
}
