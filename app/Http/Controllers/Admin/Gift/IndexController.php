<?php

namespace App\Http\Controllers\Admin\Gift;

use App\Models\Gift;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $gifts = Gift::orderByDesc('updated_at')->paginate(9);

        return view('admin.gift.index', compact('gifts'));
    }
}
