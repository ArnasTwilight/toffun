@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Relic Create</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Relic Create</li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.relic.index') }}">Relics</a>
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
                                <h3 class="card-title">Add New Relic</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('admin.relic.store') }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" name="title" placeholder="Enter title"
                                               value="{{ old('title') }}">
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
                                            <label for="title">Cooldown</label>
                                            <input type="number" class="form-control" name="cooldown"
                                                   placeholder="Enter cooldown" value="{{ old('title') }}">
                                            @error('title')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" name="description"
                                                  placeholder="Enter description" rows="3">{{ old('bonus') }}</textarea>
                                        @error('bonus')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{--Advancements--}}
                                    <div id="relic_stars"  class="row p-0">
                                        <div class="form-group col-12 mb-1">
                                            <label>Advancements</label>
                                            <input class="btn btn-primary" type="button" value="+"
                                                   onclick="relicStars();">
                                        </div>
                                    </div>
                                    {{--Advancements end--}}
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
