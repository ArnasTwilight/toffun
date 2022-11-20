<?php

namespace App\Http\Controllers\Admin\Gift;

use App\Models\Gift;

class ShowController extends BaseController
{
    public function __invoke(Gift $gift)
    {
        return view('admin.gift.show', compact('gift'));
    }
}
