@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Relic: {{ $relic->title }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">{{ $relic->title }}</li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.relic.index') }}">Relics</a></li>
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
                                        <td>{{ $relic->id }}</td>
                                    </tr>
                                    <tr>
                                        <td>Title</td>
                                        <td>{{ $relic->title }}</td>
                                    </tr>
                                    <tr>
                                        <td>Image</td>
                                        <td>
                                            <img src="{{ asset( 'storage/' . $relic->image) }}" alt="relic image"
                                                 width="128px">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Rarity</td>
                                        <td>
                                            @if(isset($relic->rarity->title))
                                                <a class="btn-sm btn-info"
                                                   href="{{ route('admin.rarity.show', $relic->rarity->id) }}">{{ $relic->rarity->title }}</a>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Cooldown</td>
                                        <td>{{ $relic->cooldown }} sec</td>
                                    </tr>
                                    <tr>
                                        <td>Description</td>
                                        <td>{{ $relic->description }}</td>
                                    </tr>
                                    {{--Stars--}}
                                    <tr>
                                        <td>Stars</td>
                                        <td>
                                            @foreach($relic->stars as $star)
                                                <details open>
                                                    <summary>Star {{ $star->star }}</summary>
                                                    <p>{{ $star->effect }}</p>
                                                </details>
                                            @endforeach
                                        </td>
                                    </tr>
                                    {{--Stars end--}}
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix d-flex">
                                <a href="{{ route('admin.relic.edit', $relic->id) }}"
                                   class="btn btn-success mr-1">Edit</a>
                                <form action="{{ route('admin.relic.delete', $relic->id) }}"
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
