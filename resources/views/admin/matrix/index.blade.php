@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Matrices</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Matrices</li>
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
                                <h3 class="card-title">Matrices table</h3>
                            </div>

                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Bonus</th>
                                        <th>Rarity</th>
                                        <th colspan="3">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($matrices as $matrix)
                                        <tr>
                                            <td>{{ $matrix->id }}</td>
                                            <td>{{ $matrix->title }}</td>
                                            <td>
                                                <img src="{{ asset('storage/' . $matrix->image) }}" alt="matrix image" width="15%">
                                            </td>
                                            <td>{{ $matrix->bonus }}</td>
                                            <td>
                                                @if(isset($matrix->rarity->title))
                                                    <a class="btn-sm btn-info"
                                                       href="{{ route('admin.rarity.show', $matrix->rarity->id) }}">{{ $matrix->rarity->title }}</a>
                                                @endif
                                            </td>
                                            <td><a href="{{ route('admin.matrix.show', $matrix->id) }}"
                                                   class="btn btn-primary">View</a></td>
                                            <td><a href="{{ route('admin.matrix.edit', $matrix->id) }}"
                                                   class="btn btn-success">Update</a></td>
                                            <td>
                                                <form action="{{ route('admin.matrix.delete', $matrix->id) }}"
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
                                <a href="{{ route('admin.matrix.create') }}" class="btn btn-primary">Add New Matrix</a>
                                <div class="pagination-sm m-0 float-right">
                                    {{ $matrices->links() }}
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
