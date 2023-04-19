@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Weapon: {{ $weapon->name }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Weapon Edit</li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.weapon.index') }}">Weapons</a>
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
                                <h3 class="card-title">Update Weapon</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('admin.weapon.update', $weapon->id) }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" name="title" placeholder="Enter title"
                                               value="{{ $weapon->title }}"
                                        >
                                        @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="InputImage">Image</label>
                                        <div>
                                            <img src="{{ asset('storage/' . $weapon->image) }}" alt="weapon image"
                                                 width="10%">
                                            <p class="text-gray">{{ asset('storage/' . $weapon->image) }}</p>
                                        </div>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="image">
                                                <label class="custom-file-label" for="InputImage">Choose
                                                    image</label>
                                            </div>
                                        </div>

                                        @error('image')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="row p-0">
                                        <div class="form-group col-xl-3 col-md-6">
                                            <label for="title">Shatter</label>
                                            <input type="text" class="form-control" name="shatter"
                                                   placeholder="Enter title"
                                                   value="{{ $weapon->shatter }}"
                                            >
                                            @error('shatter')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-xl-3 col-md-6">
                                            <label for="title">Charge</label>
                                            <input type="text" class="form-control" name="charge"
                                                   placeholder="Enter charge"
                                                   value="{{ $weapon->charge }}"
                                            >
                                            @error('charge')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-xl-3 col-md-6">
                                            <label>Element</label>
                                            <select name="element_id" class="form-control">
                                                @foreach($elements as $element)
                                                    <option value="{{ $element->id }}"
                                                        {{ $element->id == $weapon->element_id ? ' selected' : '' }}
                                                    >{{ $element->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-xl-3 col-md-6">
                                            <label>Rarity</label>
                                            <select name="rarity_id" class="form-control">
                                                @foreach($rarityList as $rarity)
                                                    <option value="{{ $rarity->id }}"
                                                        {{ $rarity->id == $weapon->rarity_id ? ' selected' : '' }}
                                                    >{{ $rarity->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    {{--Attacks--}}
                                    <div id="weapon_attacks" class="row p-0">
                                        <div class="form-group col-12 mb-1">
                                            <label>Attacks</label>
                                            <input class="btn btn-primary" type="button" value="+"
                                                   onclick="weaponAttacks();">
                                        </div>
                                        @foreach($weapon->weaponAttacks as $attack)
                                            <div class="form-group col-xl-4 col-lg-6">
                                                <div class="d-flex">
                                                    <select class="form-control mb-1" name="type[]">
                                                        <option value="1" {{ $attack->type == 1 ? ' selected' : '' }}>
                                                            Normal
                                                        </option>
                                                        <option value="2" {{ $attack->type == 2 ? ' selected' : '' }}>
                                                            Dodge
                                                        </option>
                                                        <option value="3" {{ $attack->type == 3 ? ' selected' : '' }}>
                                                            Skill
                                                        </option>
                                                        <option value="4" {{ $attack->type == 4 ? ' selected' : '' }}>
                                                            Discharge
                                                        </option>
                                                    </select>
                                                    <input class="btn btn-danger ml-1 mb-1" type="button" value="x"
                                                           onclick="delElement(this);">
                                                </div>
                                                <input class="form-control mb-1" type="text" placeholder="Name attack"
                                                       name="title_attacks[]" value="{{ $attack->title }}">
                                                <textarea class="form-control" name="description[]" rows="3"
                                                          placeholder="Description attack">{{ $attack->description }}</textarea>
                                                <input type="hidden" value="{{ $attack->id }}" name="id_attacks[]">
                                            </div>
                                        @endforeach
                                    </div>
                                    {{--Attacks end--}}
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
