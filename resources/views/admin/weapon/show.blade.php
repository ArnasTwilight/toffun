@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Weapon: {{ $weapon->title }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">{{ $weapon->title }}</li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.weapon.index') }}">Weapons</a></li>
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
                                        <td>{{ $weapon->id }}</td>
                                    </tr>
                                    <tr>
                                        <td>Name</td>
                                        <td>{{ $weapon->title }}</td>
                                    </tr>
                                    <tr>
                                        <td>Image</td>
                                        <td>
                                            <img src="{{ asset( 'storage/' . $weapon->image) }}" alt="weapon image"
                                                 width="25%">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Shatter</td>
                                        <td>
                                            <img src="{{ asset('storage/' . $weapon->shatter_img) }}"
                                                 alt="shatter image" width="32px">
                                            {{ $weapon->shatter }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Charge</td>
                                        <td>
                                            <img src="{{ asset('storage/' . $weapon->charge_img) }}" alt="charge image"
                                                 width="32px">
                                            {{ $weapon->charge }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Weapon Attacks:</td>
                                        <td>
                                            @if(isset($weaponAttacks['normal']))
                                                <details>
                                                    <summary>Normal</summary>
                                                    @foreach($weaponAttacks['normal'] as $item)
                                                        <h5>{{ $item->title }}</h5>
                                                        <p>{{ $item->description }}</p>
                                                    @endforeach
                                                </details>
                                            @endif
                                            @if(isset($weaponAttacks['dodge']))
                                                <details>
                                                    <summary>Dodge</summary>
                                                    @foreach($weaponAttacks['dodge'] as $item)
                                                        <h5>{{ $item->title }}</h5>
                                                        <p>{{ $item->description }}</p>
                                                    @endforeach
                                                </details>
                                            @endif
                                            @if(isset($weaponAttacks['skill']))
                                                <details>
                                                    <summary>Skill</summary>
                                                    @foreach($weaponAttacks['skill'] as $item)
                                                        <h5>{{ $item->title }}</h5>
                                                        <p>{{ $item->description }}</p>
                                                    @endforeach
                                                </details>
                                            @endif
                                            @if(isset($weaponAttacks['discharge']))
                                                <details>
                                                    <summary>Discharge</summary>
                                                    @foreach($weaponAttacks['discharge'] as $item)
                                                        <h5>{{ $item->title }}</h5>
                                                        <p>{{ $item->description }}</p>
                                                    @endforeach
                                                </details>
                                            @endif
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix d-flex">
                                <a href="{{ route('admin.weapon.edit', $weapon->id) }}"
                                   class="btn btn-success mr-1">Edit</a>
                                <form action="{{ route('admin.weapon.delete', $weapon->id) }}"
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
