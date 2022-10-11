@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Post: {{ $post->title }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">{{ $post->title }}</li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">Posts</a></li>
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
                    <div class="col-12 mt-2">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover">
                                    <tbody>
                                    <tr>
                                        <td>ID</td>
                                        <td>{{ $post->id }}</td>
                                    </tr>
                                    <tr>
                                        <td>Name</td>
                                        <td>{{ $post->title }}</td>
                                    </tr>
                                    <tr>
                                        <td>Content</td>
                                        <td>{{ $post->content }}</td>
                                    </tr>
                                    <tr>
                                        <td>Image</td>
                                        <td>
                                            <img src="{{ asset( 'storage/' . $post->image) }}" alt="post image" width="50%">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Category</td>
                                        <td>
                                            @if(isset($post->category->title))
                                                <a class="btn-sm btn-info"
                                                   href="{{ route('admin.category.show', $post->category->id) }}">{{ $post->category->title }}</a>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tags</td>
                                        <td>
                                            @foreach($post->tags as $tag)
                                                <a class="btn-sm btn-info"
                                                   href="{{ route('admin.tag.show', $tag->id) }}">{{ $tag->title }}</a>
                                            @endforeach
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix d-flex">
                                <a href="{{ route('admin.post.edit', $post->id) }}"
                                   class="btn btn-success mr-1">Edit</a>
                                <form action="{{ route('admin.post.delete', $post->id) }}"
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
