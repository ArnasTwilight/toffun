<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use Illuminate\Support\Facades\Storage;

class DeleteController extends BaseController
{
    public function __invoke(User $user)
    {
        if (auth()->user()->id == $user->id) {
            return redirect()->route('admin.user.index');
        }

        if ($user['image'] != 'images/placeholder/no_user_image.png') {
            Storage::disk('public')->delete($user['image']);
        }

        $user->delete();
        return redirect()->route('admin.user.index');
    }
}
