@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Weapons</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Weapons</li>
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
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Weapons table</h3>
                            </div>

                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Shatter</th>
                                        <th>Charge</th>
                                        <th colspan="3">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($weapons as $weapon)
                                        <tr>
                                            <td>{{ $weapon->id }}</td>
                                            <td>{{ $weapon->title }}</td>
                                            <td>
                                                <img src="{{ asset('storage/' . $weapon->image) }}" alt="weapon image" width="96px">
                                            </td>
                                            <td>
                                                <img src="{{ asset('storage/' . $weapon->shatter_img) }}" alt="shatter image" width="32px">
                                                {{ $weapon->shatter }}
                                            </td>
                                            <td>
                                                <img src="{{ asset('storage/' . $weapon->charge_img) }}" alt="charge image" width="32px">
                                                {{ $weapon->charge }}
                                            </td>
                                            <td><a href="{{ route('admin.weapon.show', $weapon->id) }}"
                                                   class="btn btn-primary">View</a></td>
                                            <td><a href="{{ route('admin.weapon.edit', $weapon->id) }}"
                                                   class="btn btn-success">Update</a></td>
                                            <td>
                                                <form action="{{ route('admin.weapon.delete', $weapon->id) }}"
                                                      method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <a href="{{ route('admin.weapon.create') }}" class="btn btn-primary">Add New Weapon</a>
                                <div class="pagination-sm m-0 float-right">
                                    {{ $weapons->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
