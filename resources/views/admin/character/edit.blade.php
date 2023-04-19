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
                            <li class="breadcrumb-item active">Character Edit</li>
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
                                <h3 class="card-title">Update Character</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('admin.character.update', $character->id) }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="card-body">
                                    {{--Name--}}
                                    <div class="form-group">
                                        <label for="title">Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="Enter name"
                                               value="{{ $character->name }}"
                                        >
                                        @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    {{--Name end--}}

                                    {{--Image--}}
                                    <div class="form-group">
                                        <label for="InputImage">Avatar</label>
                                        <div class="mb-1">
                                            <img src="{{ asset('storage/' . $character->image) }}"
                                                 alt="character avatar"
                                                 width="10%">
                                            <p class="text-gray">{{ asset('storage/' . $character->image) }}</p>
                                        </div>
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
                                    <div class="row col-xl-12 p-0">
                                        <div class="form-group col-xl-3 col-md-6">
                                            <label>Rarity</label>
                                            <select name="rarity_id" class="form-control">
                                                @foreach($rarityList as $rarity)
                                                    <option value="{{ $rarity->id }}"
                                                        {{ $rarity->id == $character->rarity_id ? ' selected' : '' }}
                                                    >{{ $rarity->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-xl-3 col-md-6">
                                            <label>Spec</label>
                                            <select name="spec_id" class="form-control">
                                                @foreach($specList as $spec)
                                                    <option value="{{ $spec->id }}"
                                                        {{ $spec->id == $character->spec_id ? ' selected' : '' }}
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
                                    <div class="row col-xl-12 p-0">
                                        @for($i = 0; $i < count($effects); $i++)
                                            <div class="form-group col-lg-6">
                                                <label>Effect</label>
                                                <input type="text" class="form-control mb-1"
                                                       name="title_effect[{{ $i }}]" placeholder="Enter title effect"
                                                       value="{{ $effects[$i]->title_effect }}">
                                                @error('title_effect')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                                <textarea class="form-control" name="effect[{{ $i }}]" rows="2"
                                                          placeholder="Enter effect ...">{{ $effects[$i]->effect }}</textarea>
                                                <input type="hidden" name="id_effect[{{ $i }}]"
                                                       value="{{ $effects[$i]->id }}">
                                                @error('effect')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        @endfor
                                        <div class="form-group col-lg-6">
                                            <label>Effect</label>
                                            <input type="text" class="form-control mb-1"
                                                   name="title_effect[{{ $i == 0 ? $i = 0 : $i }}]"
                                                   placeholder="Enter title effect"
                                                   value="{{ old('title_effect[' . $i . ']') }}">
                                            @error('title_effect')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            <textarea class="form-control" name="effect[{{ $i }}]" rows="2"
                                                      placeholder="Enter effect ...">{{ old('effect[' . $i . ']') }}</textarea>
                                            @error('effect')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Skills</label>
                                            <textarea class="form-control" name="skills" rows="2"
                                                      placeholder="Enter skills ...">{{ $character->skills }}</textarea>
                                            @error('skills')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    {{--Effects end--}}

                                    {{--Traits--}}
                                    <div class="row col-xl-12 p-0">
                                        <div class="form-group col-12 mb-0">
                                            <label>Traits</label>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <textarea
                                                class="form-control"
                                                name="trait_1" rows="2"
                                                placeholder="Enter trait 1200 Awakening...">{{ $character->trait_1 }}</textarea>
                                            @error('trait_1')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <textarea
                                                class="form-control" name="trait_2" rows="2"
                                                placeholder="Enter trait 4000 Awakening...">{{ $character->trait_2 }}</textarea>
                                            @error('trait_2')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    {{--Traits end--}}

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
