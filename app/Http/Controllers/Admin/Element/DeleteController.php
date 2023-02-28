<?php

namespace App\Http\Controllers\Admin\Element;

use App\Models\Element;
use Illuminate\Support\Facades\Storage;

class DeleteController extends BaseController
{
    public function __invoke(Element $element)
    {
        if ($element['image'] != 'images/placeholder/no_element_image.png'){
            Storage::disk('public')->delete($element['image']);
        }

        $element->delete();
        return redirect()->route('admin.element.index');
    }
}
