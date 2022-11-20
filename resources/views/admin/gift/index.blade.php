@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Gifts</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Gifts</li>
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
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Gifts table</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px">ID</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Rarity</th>
                                        <th colspan="3">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($gifts as $gift)
                                    <tr>
                                        <td>{{ $gift->id }}</td>
                                        <td>{{ $gift->title }}</td>
                                        <td><img src="{{ asset('storage/' . $gift->image) }}" alt="gift image"></td>
                                        <td><img src="{{ asset('storage/' . $gift->rarity->image) }}" alt="rarity image"></td>
                                        <td><a href="{{ route('admin.gift.show', $gift->id) }}"
                                               class="btn btn-primary">View</a></td>
                                        <td><a href="{{ route('admin.gift.edit', $gift->id) }}"
                                               class="btn btn-success">Update</a></td>
                                        <td>
                                            <form action="{{ route('admin.gift.delete', $gift->id) }}"
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
                            <div class="card-footer clearfix">
                                <a href="{{ route('admin.gift.create') }}" class="btn btn-primary">Add New Gift</a>
                                <div class="pagination-sm m-0 float-right">
                                    {{ $gifts->links() }}
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
