@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Relic: {{ $relic->title }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Relic Edit</li>
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
                                <h3 class="card-title">Update Relic</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('admin.relic.update', $relic->id) }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" name="title" placeholder="Enter title"
                                               value="{{ $relic->title }}">
                                        @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="InputImage">Image</label>
                                        <div class="mb-1">
                                            <img src="{{ asset('storage/' . $relic->image) }}" alt="relic image"
                                                 width="128px">
                                            <p class="text-gray">{{ asset('storage/' . $relic->image) }}</p>
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
                                        <div class="form-group col-xl-6">
                                            <label>Rarity</label>
                                            <select name="rarity_id" class="form-control">
                                                @foreach($rarityList as $rarity)
                                                    <option value="{{ $rarity->id }}"
                                                        {{ $rarity->id == $relic->rarity_id ? ' selected' : '' }}
                                                    >{{ $rarity->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-xl-6">
                                            <label for="title">Cooldown</label>
                                            <input type="number" class="form-control" name="cooldown"
                                                   placeholder="Enter cooldown" value="{{ old('cooldown') }}">
                                            @error('title')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" name="description"
                                                  placeholder="Enter description"
                                                  rows="3">{{ $relic->description }}</textarea>
                                        @error('bonus')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    {{--Advancements--}}
                                    <div id="relic_stars" class="row p-0">
                                        <div class="form-group col-12 mb-1">
                                            <label>Advancements</label>
                                            <input class="btn btn-primary" type="button" value="+"
                                                   onclick="relicStars();">
                                        </div>

                                        @foreach($relic->stars as $star)
                                            <div class="form-group col-xl-4 col-lg-6">
                                                <div class="d-flex">
                                                    <input class="form-control" type="number" name="star[]"
                                                           value="{{ $star->star }}" placeholder="Star">
                                                    <input class="btn btn-danger ml-1 mb-1" type="button" value="x"
                                                           onclick="delElement(this);">
                                                </div>
                                                <textarea class="form-control" name="effect[]" rows="3"
                                                          placeholder="Enter effect...">{{ $star->effect }}</textarea>
                                                <input type="hidden" value="{{ $star->id }}" name="id_star[]">
                                            </div>
                                        @endforeach
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
