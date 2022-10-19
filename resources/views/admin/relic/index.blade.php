@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Relics</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Relics</li>
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
                                <h3 class="card-title">Relics table</h3>
                            </div>

                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Cooldown</th>
                                        <th>Description</th>
                                        <th colspan="3">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($relics as $relic)
                                        <tr>
                                            <td>{{ $relic->id }}</td>
                                            <td>{{ $relic->title }}</td>
                                            <td>
                                                <img src="{{ asset('storage/' . $relic->image) }}" alt="relic image" width="15%">
                                            </td>
                                            <td>{{ $relic->bonus }}</td>
                                            <td>
                                                @if(isset($relic->rarity->title))
                                                    <a class="btn-sm btn-info"
                                                       href="{{ route('admin.rarity.show', $relic->rarity->id) }}">{{ $relic->rarity->title }}</a>
                                                @endif
                                            </td>
                                            <td><a href="{{ route('admin.relic.show', $relic->id) }}"
                                                   class="btn btn-primary">View</a></td>
                                            <td><a href="{{ route('admin.relic.edit', $relic->id) }}"
                                                   class="btn btn-success">Update</a></td>
                                            <td>
                                                <form action="{{ route('admin.relic.delete', $relic->id) }}"
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
                                <a href="{{ route('admin.relic.create') }}" class="btn btn-primary">Add New Relic</a>
                                <div class="pagination-sm m-0 float-right">
                                    {{ $relics->links() }}
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
