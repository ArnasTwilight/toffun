<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Requests\Admin\User\StoreRequest;
use App\Mail\User\PasswordMail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $password = Str::random(10);
        $data['password'] = Hash::make($password);
        $data['image'] = 'images/user/no_user_image.jpg';
        $user = User::firstOrCreate(['email' => $data['email']], $data);
        Mail::to($data['email'])->send(new PasswordMail($password, $data['name'], $data['email']));
        event(new Registered($user));
//        $this->service->store($data);

        return redirect()->route('admin.user.index');
    }
}
