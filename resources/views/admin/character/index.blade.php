@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Characters</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Characters</li>
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
                                <h3 class="card-title">Characters table</h3>
                            </div>

                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Weapon</th>
                                        <th>Spec</th>
                                        <th>Rarity</th>
                                        <th colspan="3">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($characters as $character)
                                        <tr>
                                            <td>{{ $character->id }}</td>
                                            <td>{{ $character->name }}</td>
                                            <td>
                                                <img src="{{ asset('storage/' . $character->image) }}" alt="Character avatar" width="15%">
                                            </td>
                                            <td>
                                                @if(isset($character->weapon->title))
                                                    <a class="btn-sm btn-info"
                                                       href="{{ route('admin.weapon.show', $character->weapon->id) }}">{{ $character->weapon->title }}</a>
                                                @endif
                                            </td>
                                            <td>
                                                @if(isset($character->spec->title))
                                                    <a class="btn-sm btn-info"
                                                       href="{{ route('admin.spec.show', $character->spec->id) }}">{{ $character->spec->title }}</a>
                                                @endif
                                            </td>
                                            <td>
                                                @if(isset($character->rarity->title))
                                                    <a class="btn-sm btn-info"
                                                       href="{{ route('admin.rarity.show', $character->rarity->id) }}">{{ $character->rarity->title }}</a>
                                                @endif
                                            </td>
                                            <td><a href="{{ route('admin.character.show', $character->id) }}"
                                                   class="btn btn-primary">View</a></td>
                                            <td><a href="{{ route('admin.character.edit', $character->id) }}"
                                                   class="btn btn-success">Update</a></td>
                                            <td>
                                                <form action="{{ route('admin.character.delete', $character->id) }}"
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
                                <a href="{{ route('admin.character.create') }}" class="btn btn-primary">Add New Character</a>
                                <div class="pagination-sm m-0 float-right">
                                    {{ $characters->links() }}
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
