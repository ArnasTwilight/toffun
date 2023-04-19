@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Character Create</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Character Create</li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.character.index') }}">Characters</a>
                            </li>
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
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add New Character</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('admin.character.store') }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    {{--Name--}}
                                    <div class="form-group">
                                        <label for="title">Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="Enter name"
                                               value="{{ old('title') }}">
                                        @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    {{--Name end--}}

                                    {{--Image--}}
                                    <div class="form-group">
                                        <label for="InputImage">Image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="image">
                                                <label class="custom-file-label" for="InputImage">Choose
                                                    avatar</label>
                                            </div>
                                        </div>
                                        @error('image')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    {{--Image end--}}

                                    {{--Rarity, Spec, Weapon, Matrix--}}
                                    <div class="row p-0">
                                        <div class="form-group col-xl-3 col-md-6">
                                            <label>Rarity</label>
                                            <select name="rarity_id" class="form-control">
                                                @foreach($rarityList as $rarity)
                                                    <option value="{{ $rarity->id }}"
                                                        {{ $rarity->id == old('rarity_id') ? ' selected' : '' }}
                                                    >{{ $rarity->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-xl-3 col-md-6">
                                            <label>Spec</label>
                                            <select name="spec_id" class="form-control">
                                                @foreach($specList as $spec)
                                                    <option value="{{ $spec->id }}"
                                                        {{ $spec->id == old('spec_id') ? ' selected' : '' }}
                                                    >{{ $spec->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-xl-3 col-md-6">
                                            <label>Weapon</label>
                                            <select name="weapon_id" class="form-control">
                                                @foreach($weapons as $weapon)
                                                    <option value="{{ $weapon->id }}"
                                                        {{ $weapon->id == old('weapon_id') ? ' selected' : '' }}
                                                    >{{ $weapon->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-xl-3 col-md-6">
                                            <label>Matrix</label>
                                            <select name="matrix_id" class="form-control">
                                                @foreach($matrices as $matrix)
                                                    <option value="{{ $matrix->id }}"
                                                        {{ $matrix->id == old('matrix_id') ? ' selected' : '' }}
                                                    >{{ $matrix->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{--Rarity, Spec, Weapon, Matrix end--}}

                                    {{--Effects--}}
                                    <div class="row p-0">
                                        <div class="form-group col-lg-6">
                                            <label>Effect</label>
                                            <input type="text" class="form-control mb-1" name="title_effect[0]"
                                                   placeholder="Enter title effect"
                                                   value="{{ old('title_effect[0]') }}">
                                            @error('title_effect')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            <textarea class="form-control" name="effect[0]" rows="2"
                                                      placeholder="Enter effect ...">{{ old('effect[0]') }}</textarea>
                                            @error('effect')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Effect</label>
                                            <input type="text" class="form-control mb-1" name="title_effect[1]"
                                                   placeholder="Enter title effect"
                                                   value="{{ old('title_effect[1]') }}">
                                            @error('title_effect')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            <textarea class="form-control" name="effect[1]" rows="2"
                                                      placeholder="Enter effect ...">{{ old('effect[1]') }}</textarea>
                                            @error('effect')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    {{--Effects end--}}

                                    {{--Rewards--}}
                                    <div class="row p-0">
                                        <div class="form-group col-12 mb-0">
                                            <label>Recollection Rewards</label>
                                        </div>

                                        @for($i = 1; $i != 7; $i++)
                                            <div class="form-group col-xl-4 col-lg-6">
                                                <input class="form-control mb-1" type="number" name="points[]"
                                                       placeholder="{{$i}} Required points">
                                                <textarea
                                                    class="form-control"
                                                    name="reward[]" rows="2"
                                                    placeholder="Enter reward..."></textarea>
                                            </div>
                                        @endfor

                                    </div>
                                    {{--Rewards end--}}

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
