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
                    <div class="items-list-header__img-container SR">
                        <img src="{{ asset('assets/image/item/purple-yam-pie.png') }}" alt="food">
                    </div>
                    <div class="items-list-header__name">
                        <div class="line-left"></div>
                        <h2><a href="{{ route('food.index') }}">Food</a></h2>
                        <div class="items-list-header__arrow"></div>
                        <h2 class="items-list-header__relic-name">{{ $food->title }}</h2>
                    </div>
                </div>
            </div>

            <section class="post row mt-4 bg-color p-4">
                <div class="p-0 d-flex">

                    <div class="{{ $food->rarity->title }}">
                        <img src="{{ asset('storage/' . $food->image) }}" class="item-image" alt="recipe img">
                    </div>

                    <div class="line-vertical-white mx-4"></div>

                    <div class="element-title">
                        <h2>{{ $food->title }}</h2>
                        <img src="{{ asset('storage/' . $food->rarity->image) }}" class="rarity-image" alt="rarity">
                    </div>

                </div>

                <div class="description-main p-0">
                    <section class="description-single mt-4">
                        <div class="description-single__item">
                            <h2>Bonus</h2>
                            <div class="bg-color-second p-2">
                                <p class="description-single__text">
                                    {{ $food->bonus }}
                                </p>
                            </div>
                        </div>
                    </section>

                    <section class="description-single mt-4">
                        <div class="description-single__item">
                            <h2>Ingredients</h2>
                            <div class="bg-color-second p-3">
                                <ul class="ingredients-list-recipe">
                                    @foreach($food->ingredients as $ingredient)
                                        <li class="ingredients-list-recipe__item bg-color-third">
                                            <div class="ingredients-list-recipe__img-container {{ $ingredient->rarity->title }}">
                                                <img src="{{ asset('storage/' . $ingredient->image) }}" alt="ingredient img">
                                                <div class="ingredients-list-recipe__amount bg-color-second">
                                                    1
                                                </div>
                                            </div>
                                            <p>
                                                {{ $ingredient->title }}
                                            </p>
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
