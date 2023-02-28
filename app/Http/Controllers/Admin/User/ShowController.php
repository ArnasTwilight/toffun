<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;

class ShowController extends BaseController
{
    public function __invoke(User $user)
    {
        $roles = User::getRoles();
        $role = $roles[$user->role];
        return view('admin.user.show', compact('user', 'role'));
    }
}
