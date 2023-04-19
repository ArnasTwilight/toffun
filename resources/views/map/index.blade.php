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
                    <h1>Maps</h1>
                </div>
            </section>

            <section class="post row mt-4 bg-color">
                <ul class="map-list p-4">
                    <li class="map-list__item">
                        <h2 class="map-list__item-num">1</h2>
                        <a href="https://tower-of-fantasy-map.appsample.com/">Tower of fantasy map appsample com</a>
                    </li>
                    <li class="map-list__item">
                        <h2 class="map-list__item-num">2</h2>
                        <a href="https://genshin.gg/tof/map/">Genshin.gg tof map</a>
                    </li>
                    <li class="map-list__item">
                        <h2 class="map-list__item-num">3</h2>
                        <a href="https://toweroffantasy.interactivemap.app/?map=1">Tower of fantasy interactive map app</a>
                    </li>
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
