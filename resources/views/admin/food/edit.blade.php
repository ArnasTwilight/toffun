@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dish: {{ $food->title }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Dish Edit</li>
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
                                <h3 class="card-title">Update Dish</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('admin.food.update', $food->id) }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" name="title" placeholder="Enter title" value="{{ $food->title }}">
                                        @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="InputImage">Image</label>
                                        <div class="mb-1">
                                            <img src="{{ asset('storage/' . $food->image) }}" alt="food image"
                                                 width="10%">
                                            <p class="text-gray">{{ asset('storage/' . $food->image) }}</p>
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
                                    <div class="form-group">
                                        <label>Bonus</label>
                                        <textarea class="form-control" name="bonus"
                                                  placeholder="Enter bonus" rows="2">{{ $food->bonus }}</textarea>
                                        @error('bonus')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Rarity</label>
                                        <select name="rarity_id" class="form-control">
                                            @foreach($rarityList as $rarity)
                                                <option value="{{ $rarity->id }}"
                                                    {{ $rarity->id == $food->element_id ? ' selected' : '' }}
                                                >{{ $rarity->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Rarity</label>
                                        <select name="rarity_id" class="form-control">
                                            @foreach($specList as $spec)
                                                <option value="{{ $spec->id }}"
                                                    {{ $spec->id == $food->spec_id ? ' selected' : '' }}
                                                >{{ $spec->title }}</option>
                                            @endforeach
                                        </select>
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
