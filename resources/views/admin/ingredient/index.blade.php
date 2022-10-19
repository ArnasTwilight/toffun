@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Ingredients</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Ingredients</li>
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
                                <h3 class="card-title">Ingredient table</h3>
                            </div>

                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Rarity</th>
                                        <th colspan="3">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($ingredients as $ingredient)
                                        <tr>
                                            <td>{{ $ingredient->id }}</td>
                                            <td>{{ $ingredient->title }}</td>
                                            <td>
                                                <img src="{{ asset('storage/' . $ingredient->image) }}" alt="ingredient image" width="15%">
                                            </td>
                                            <td>
                                                @if(isset($ingredient->rarity->title))
                                                    <a class="btn-sm btn-info"
                                                       href="{{ route('admin.rarity.show', $ingredient->rarity->id) }}">{{ $ingredient->rarity->title }}</a>
                                                @endif
                                            </td>
                                            <td><a href="{{ route('admin.ingredient.show', $ingredient->id) }}"
                                                   class="btn btn-primary">View</a></td>
                                            <td><a href="{{ route('admin.ingredient.edit', $ingredient->id) }}"
                                                   class="btn btn-success">Update</a></td>
                                            <td>
                                                <form action="{{ route('admin.ingredient.delete', $ingredient->id) }}"
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
                                <a href="{{ route('admin.ingredient.create') }}" class="btn btn-primary">Add New Ingredient</a>
                                <div class="pagination-sm m-0 float-right">
                                    {{ $ingredients->links() }}
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
