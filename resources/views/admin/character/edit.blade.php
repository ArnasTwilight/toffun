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
                                    <div class="form-group">
                                        <label for="title">Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="Enter name"
                                               value="{{ $character->name }}"
                                        >
                                        @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="InputImage">Avatar</label>
                                        <div class="mb-1">
                                            <img src="{{ asset('storage/' . $character->image) }}" alt="character avatar"
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
                                    <div class="form-group">
                                        <label for="InputMainImage">Main Image</label>
                                        <div class="w-50 mb-1">
                                            <img src="{{ url('storage/' . $character->main_image) }}" alt="main_image"
                                                 class="w-50">
                                            <p class="text-gray">{{ asset('storage/' . $character->main_image) }}</p>
                                        </div>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="main_image" value="{{ asset('storage/' . $character->main_image) }}">
                                                <label class="custom-file-label" for="InputMainImage">Choose
                                                    main image</label>
                                            </div>
                                        </div>
                                        @error('main_image')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Rarity</label>
                                        <select name="rarity_id" class="form-control">
                                            @foreach($rarityList as $rarity)
                                                <option value="{{ $rarity->id }}"
                                                    {{ $rarity->id == $character->rarity_id ? ' selected' : '' }}
                                                >{{ $rarity->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Spec</label>
                                        <select name="spec_id" class="form-control">
                                            @foreach($specList as $spec)
                                                <option value="{{ $spec->id }}"
                                                    {{ $spec->id == $character->spec_id ? ' selected' : '' }}
                                                >{{ $spec->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Weapon</label>
                                        <select name="weapon_id" class="form-control">
                                            @foreach($weapons as $weapon)
                                                <option value="{{ $weapon->id }}"
                                                    {{ $weapon->id == old('weapon_id') ? ' selected' : '' }}
                                                >{{ $weapon->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Matrix</label>
                                        <select name="matrix_id" class="form-control">
                                            @foreach($matrices as $matrix)
                                                <option value="{{ $matrix->id }}"
                                                    {{ $matrix->id == old('matrix_id') ? ' selected' : '' }}
                                                >{{ $matrix->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Skills</label>
                                        <textarea class="form-control" name="skills" rows="2"
                                                  placeholder="Enter skills ...">{{ $character->skills }}</textarea>
                                        @error('skills')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Trait</label>
                                        <textarea class="form-control" name="trait" rows="2"
                                                  placeholder="Enter trait ...">{{ $character->trait }}</textarea>
                                        @error('trait')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Stars</label>
                                        <div class="d-flex">
                                            @for($i = 0, $star = 'C' . $i; $i <= 6; $i++, $star = 'C' . $i)
                                                <textarea class="mr-1 form-control" name="{{ $star }}" rows="4"
                                                          placeholder="Enter Star {{ $star }} ...">{{ $stars->$star }}</textarea>
                                                @error($star)
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            @endfor
                                        </div>
                                    </div>
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
