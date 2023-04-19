@extends('layouts.main')
@section('content')
    <!--    header-->
    @include('includes.header')
    <!--    header end-->

    <!--    main-->
    <div class="row d-flex mb-5">
        <main class="col-xl-9">

            <div class="row mt-4">
                <div class="items-list-header bg-color-second d-flex p-0">
                    <div class="items-list-header__img-container SSR">
                        <img src="{{ asset('assets/image/item/frigg.png') }}" alt="matrix">
                    </div>
                    <div class="items-list-header__name">
                        <div class="line-left"></div>
                        <h2><a href="{{ route('matrix.index') }}">Matrix</a></h2>
                        <div class="items-list-header__arrow"></div>
                        <h2 class="items-list-header__relic-name">{{ $matrix->title }}</h2>
                    </div>
                </div>
            </div>

            <section class="post row mt-4 bg-color p-4">
                <div class="p-0 d-flex">
                    <div class="{{ $matrix->rarity->title }}">
                        <img src="{{ asset('storage/' . $matrix->image) }}" class="item-image" alt="matrix img">
                    </div>

                    <div class="line-vertical-white mx-4"></div>

                    <div class="element-title">
                        <h2>{{ $matrix->title }}</h2>
                        <img src="{{ asset('storage/' . $matrix->rarity->image) }}" class="rarity-image" alt="rarity">
                    </div>
                </div>

                <div class="description-main p-0">
                    <section class="description-single mt-4">
                        <div class="description-single__item">
                            <h2>Bonus</h2>
                            <div class="bg-color-second p-2">
                                <ul class="">
                                    @foreach($matrixBonus as $bonus)
                                        <li class="character-matrix bg-color-third">
                                            <div class="star-container bg-color-second d-flex p-2">
                                                <p class="star-num"> {{$bonus->quantity}}x </p>
                                            </div>
                                            <p>{{$bonus->bonus}}</p>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </section>
                </div>
            </section>

        </main>

        @include('includes.aside')
    </div>
    <!--    main end-->

    <!--    footer-->
    @include('includes.footer')
    <!--    footer end-->
@endsection
