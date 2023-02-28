@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">User: {{ $user->name }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">User Edit</li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Users</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Main</a></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary w-50">
                            <div class="card-header">
                                <h3 class="card-title">User Edit</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('admin.user.update', $user->id) }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" name="name"
                                               placeholder="Enter name"
                                               value="{{ $user->name }}"
                                        >
                                        @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">E-mail</label>
                                        <input type="text" class="form-control" name="email"
                                               placeholder="Enter name"
                                               value="{{ $user->email }}"
                                        >
                                        @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
{{--                                    <div class="form-group">--}}
{{--                                        <label for="InputFile">Image</label>--}}
{{--                                        <div class="input-group">--}}
{{--                                            <div class="custom-file">--}}
{{--                                                <input type="file" class="custom-file-input" name="image">--}}
{{--                                                <label class="custom-file-label" for="InputFile">Choose image</label>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <img src="{{ asset('storage/' . $user->image) }}" alt="Post image" width="50%"--}}
{{--                                             class="mt-2">--}}
{{--                                        <p class="text-gray">{{ asset('storage/' . $user->image) }}</p>--}}
{{--                                        @error('image')--}}
{{--                                        <div class="text-danger">{{ $message }}</div>--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}
                                    <div class="form-group">
                                        <label>Select Role</label>
                                        <select name="role" class="form-control">
                                            @foreach($roles as $id => $role)
                                                <option value="{{ $id }}"
                                                    {{ $id == $user->role ? ' selected' : '' }}
                                                >{{ $role }}</option>
                                            @endforeach
                                        </select>

                                        @error('role')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
