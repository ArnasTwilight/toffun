@extends('layouts.main')
@section('content')
    <!--    header-->
    @include('includes.header')
    <!--    header end-->

    <div class="row d-flex mb-5">
        <main class="p-0">
            <section class="col-xl-9 m-auto bg-color p-4">
                <h2 class="mb-3">User info</h2>
                <form action="{{ route('personal.edit.changepass', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="user-card-main">

                        <div class="user-card p-3 d-flex">
                            <ul class="user-info">
                                <li>
                                    <label for="password">New password</label>
                                    <input class="edit-info" type="password" value="" name="password">
                                    @error('password')
                                    <p class="text-danger-message">{{ $message }}</p>
                                    @enderror
                                </li>
                                <li>
                                    <label for="password-confirm">Repeat password</label>
                                    <input class="edit-info" id="password-confirm" type="password" name="password_confirmation">
                                </li>
                            </ul>
                        </div>

                    </div>
                    <div class="user-card-footer d-flex bg-color-third p-2">
                        <div>
                            <label class="old-pass" for="password_old">Old password</label>
                            <input class="edit-info" type="password" value="" name="password_old">
                            @error('password_old')
                            <p class="text-danger-message">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="user-edit button">Submit</button>
                    </div>
                </form>
            </section>
        </main>
    </div>

    <!--    footer-->
    @include('includes.footer')
    <!--    footer end-->
@endsection
