@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dish Create</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Dish Create</li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.food.index') }}">Food</a>
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
                                <h3 class="card-title">Add New dish</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('admin.food.store') }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" name="title" placeholder="Enter title" value="{{ old('title') }}">
                                        @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="InputImage">Image</label>
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
                                        <div class="form-group col-xl-6">
                                            <label>Rarity</label>
                                            <select name="rarity_id" class="form-control">
                                                @foreach($rarityList as $rarity)
                                                    <option value="{{ $rarity->id }}"
                                                        {{ $rarity->id == old('rarity_id') ? ' selected' : '' }}
                                                    >{{ $rarity->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-xl-6">
                                            <label>Spec</label>
                                            <select name="spec_id" class="form-control">
                                                @foreach($specList as $spec)
                                                    <option value="{{ $spec->id }}"
                                                        {{ $spec->id == old('spec_id') ? ' selected' : '' }}
                                                    >{{ $spec->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Ingredients</label>
                                        <select name="ingredient_ids[]" class="form-control select2" multiple="multiple"
                                                data-placeholder="Select a ingredients"
                                                style="width: 100%">
                                            @foreach($ingredients as $ingredient)
                                                <option value="{{ $ingredient->id }}"
                                                    {{ is_array(old('ingredient_ids')) && in_array($ingredient->id, old('ingredient_ids')) ? ' selected' : '' }}
                                                >{{ $ingredient->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Bonus</label>
                                        <textarea class="form-control" name="bonus"
                                                  placeholder="Enter bonus" rows="4">{{ old('bonus') }}</textarea>
                                        @error('bonus')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
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
