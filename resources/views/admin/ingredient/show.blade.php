@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Ingredient: {{ $ingredient->title }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">{{ $ingredient->title }}</li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.ingredient.index') }}">Ingredients</a></li>
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
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-6 mt-2">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover">
                                    <tbody>
                                    <tr>
                                        <td>ID</td>
                                        <td>{{ $ingredient->id }}</td>
                                    </tr>
                                    <tr>
                                        <td>Title</td>
                                        <td>{{ $ingredient->title }}</td>
                                    </tr>
                                    <tr>
                                        <td>Image</td>
                                        <td>
                                            <img src="{{ asset( 'storage/' . $ingredient->image) }}" alt="ingredient image" width="25%">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Rarity</td>
                                        <td>
                                            @if(isset($ingredient->rarity->title))
                                                <a class="btn-sm btn-info"
                                                   href="{{ route('admin.rarity.show', $ingredient->rarity->id) }}">{{ $ingredient->rarity->title }}</a>
                                            @endif
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix d-flex">
                                <a href="{{ route('admin.ingredient.edit', $ingredient->id) }}"
                                   class="btn btn-success mr-1">Edit</a>
                                <form action="{{ route('admin.ingredient.delete', $ingredient->id) }}"
                                      method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
