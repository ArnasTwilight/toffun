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
                        <img src="{{ asset('assets/image/item/cybernetic-arm.png') }}" alt="relic">
                    </div>
                    <div class="items-list-header__name">
                        <div class="line-left"></div>
                        <h2><a href="{{ route('relic.index') }}">Relic</a></h2>
                        <div class="items-list-header__arrow"></div>
                        <h2 class="items-list-header__relic-name">{{ $relic->title }}</h2>
                    </div>
                </div>
            </div>

            <section class="post row mt-4 bg-color p-4">
                <div class="p-0 d-flex">

                    <div class="{{ $relic->rarity->title }}">
                        <img src="{{ asset('storage/' . $relic->image) }}" class="item-image" alt="relic img">
                    </div>

                    <div class="line-vertical-white mx-4"></div>

                    <div class="element-title">
                        <h2>{{ $relic->title }}</h2>
                        <img src="{{ asset('storage/' . $relic->rarity->image) }}" class="rarity-image" alt="rarity">
                    </div>

                </div>

                <div class="description-main p-0">
                    <section class="description-single mt-4">
                        <div class="description-single__item">
                            <h2>Cooldown</h2>
                            <div class="description-single__cooldown bg-color-second p-2">
                                <p class="description-single__text">
                                    {{ $relic->cooldown }}
                                </p>
                            </div>
                        </div>

                        <div class="description-single__item mt-4">
                            <h2>Description</h2>
                            <div class="bg-color-second p-2">
                                <p class="description-single__text">
                                    {{ $relic->description }}
                                </p>
                            </div>
                        </div>
                    </section>

                    <section class="description-single mt-4">
                        <div class="description-single__item">
                            <h2>Advancements</h2>
                            <div class="bg-color-second p-2">
                                <ul class="advancements-list">
                                    @foreach($relic->stars as $star)
                                        <li class="bg-color-third p-2 d-flex">
                                            <div class="advancements-item__star-container bg-color-second d-flex">
                                                <img src="{{ asset('assets/image/item/skill_star.png') }}"
                                                     alt="star">
                                                <p>{{ $star->star }}</p>
                                            </div>
                                            <p class="description-single__text">
                                                {{ $star->effect }}
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
