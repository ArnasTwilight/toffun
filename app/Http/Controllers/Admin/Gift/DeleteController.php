<?php

namespace App\Http\Controllers\Admin\Gift;

use App\Models\Gift;

class DeleteController extends BaseController
{
    public function __invoke(Gift $gift)
    {
        $gift->delete();
        return redirect()->route('admin.gift.index');
    }
}
