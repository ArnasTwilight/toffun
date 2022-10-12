@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Character: {{ $character->name }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">{{ $character->name }}</li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.character.index') }}">Characters</a></li>
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
                                        <td>{{ $character->id }}</td>
                                    </tr>
                                    <tr>
                                        <td>Name</td>
                                        <td>{{ $character->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Avatar</td>
                                        <td>
                                            <img src="{{ asset( 'storage/' . $character->image) }}" alt="character avatar" width="25%">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-nowrap">Main Image</td>
                                        <td>
                                            <img src="{{ asset( 'storage/' . $character->main_image) }}" alt="main image" width="50%">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Skills</td>
                                        <td>{{ $character->skills }}</td>
                                    </tr>
                                    <tr>
                                        <td>Trait</td>
                                        <td>{{ $character->trait }}</td>
                                    </tr>
                                    <tr>
                                        <td>Advancement</td>
                                        <td>{{ $character->advancement }}</td>
                                    </tr>
                                    <tr>
                                        <td>Spec</td>
                                        <td>
                                            @if(isset($character->spec->title))
                                                <a class="btn-sm btn-info"
                                                   href="{{ route('admin.spec.show', $character->spec->id) }}">{{ $character->spec->title }}</a>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Rarity</td>
                                        <td>
                                            @if(isset($character->rarity->title))
                                                <a class="btn-sm btn-info"
                                                   href="{{ route('admin.rarity.show', $character->rarity->id) }}">{{ $character->rarity->title }}</a>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Weapon</td>
                                        <td>
                                            @if(isset($character->weapon->title))
                                                <a class="btn-sm btn-info"
                                                   href="{{ route('admin.weapon.show', $character->weapon->id) }}">{{ $character->weapon->title }}</a>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Matrix</td>
                                        <td>
                                            @if(isset($character->matrix->title))
                                                <a class="btn-sm btn-info"
                                                   href="{{ route('admin.matrix.show', $character->matrix->id) }}">{{ $character->matrix->title }}</a>
                                            @endif
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix d-flex">
                                <a href="{{ route('admin.character.edit', $character->id) }}"
                                   class="btn btn-success mr-1">Edit</a>
                                <form action="{{ route('admin.character.delete', $character->id) }}"
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
