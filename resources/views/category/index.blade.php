@extends('layouts.main')
@section('content')
    <!--    header-->
    @include('includes.header')
    <!--    header end-->

    <!--    main-->
    <div class="row d-flex mb-5">
        <main class="col-xl-9">

            <section class="post row mt-4 bg-color">
                <div class="cat-tag-main col-lg-6 p-0">
                    <h1>Categories</h1>
                </div>
            </section>

            <section class="post row mt-4 bg-color">
                <ul class="category-list d-flex p-4">
                    @foreach($categories as $category)
                        <li><a class="cat-tag-list__item" href="{{ route('category.show', $category->id) }}">{{ $category->title }}</a></li>
                    @endforeach
                </ul>
            </section>

        </main>

        {{--        aside--}}
        @include('includes.aside')
        {{--        aside end--}}
    </div>
    <!--    main end-->

    <!--    footer-->
    @include('includes.footer')
    <!--    footer end-->
@endsection
