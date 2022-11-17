@extends('layouts.main')
@section('content')
    <!--    header-->
    @include('includes.header')
    <!--    header end-->

    <!--    main-->
    <div class="row d-flex mb-5">

        <main class="col-xl-12">

            <ul class="character-menu mt-4">
                <li class="character-menu__item active-menu-char">
                    <a href="#">Main</a>
                </li>
                <li class="character-menu__item">
                    <a href="#">Story</a>
                </li>
            </ul>

            <section class="character-container bg-color row p-4">

                <div class="character-container-header p-0 d-flex">
                    <div class="d-flex">
                        <div class="character-image-container">
                            <img src="{{ asset('storage/' . $character->image) }}" alt="character avatar">
                        </div>

                        <div class="line-vertical-white mx-4"></div>

                        <div class="element-title">
                            <h2>{{ $character->name }}</h2>
                            <img src="{{ asset('storage/' . $character->rarity->image) }}" class="rarity-image"
                                 alt="rarity">
                        </div>
                    </div>

                    <div class="weapon-character d-flex">

                        <div class="weapon-image d-flex test">
                            <div class="weapon-image-container">
                                <img src="{{ asset('storage/' . $character->weapon->image) }}" alt="weapon image">
                            </div>

                            <div class="line-vertical-white mx-4"></div>
                        </div>

                        <div class="element-title ">
                            <h2>{{ $character->weapon->title }}</h2>

                            <ul class="weapon-stats-list d-flex">
                                <li class="weapon-stats-list__item">
                                    <p class="weapon-stats-name">Resonance</p>
                                    <div class="d-flex">
                                        <img src="{{ asset('storage/' . $character->spec->image) }}" class="stat-image"
                                             alt="dps">
                                        <p class="weapon-stats-name__item">{{ $character->spec->title }}</p>
                                    </div>
                                </li>
                                <li class="weapon-stats-list__item">
                                    <p class="weapon-stats-name">Element</p>
                                    <div class="d-flex">
                                        <img src="{{ asset('storage/' . $character->weapon->element->image) }}"
                                             class="stat-image" alt="ice">
                                        <p class="weapon-stats-name__item">{{ $character->weapon->element->title }}</p>
                                    </div>
                                </li>
                                <li class="weapon-stats-list__item">
                                    <p class="weapon-stats-name">Shatter</p>
                                    <div class="d-flex">
                                        <p class="weapon-stats-name__item">A {{ $character->weapon->shatter }}</p>
                                    </div>
                                </li>
                                <li class="weapon-stats-list__item">
                                    <p class="weapon-stats-name">Charge</p>
                                    <div class="d-flex">
                                        <p class="weapon-stats-name__item">A {{ $character->weapon->charge }}</p>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>

                <div class="description-main-character p-0 mt-4">
                    <div class="description-single__item">
                        <h2>Weapon Effects</h2>
                        <ul class="description-single__cooldown bg-color-second p-2">
                            @for($i = 0; $i < count($effects); $i++)
                            <li class="bg-color-third p-2">
                                <p class="description-single__text">
                                    {{ $effects[$i]->title_effect }}
                                </p>
                                <p class="description-single__text">
                                    {{ $effects[$i]->effect }}
                                </p>
                            </li>
                            @endfor
                        </ul>
                    </div>

                    <div class="description-single__item mt-4">
                        <h2>Advancements</h2>
                        <div class="description-single__cooldown bg-color-second p-2">
                            <ul>
                                @for($i = 1, $star = 'C' . $i; $i <= 6; $i++, $star = 'C' . $i)
                                    @if(isset($character->stars->$star))
                                        <li class="character-star bg-color-third p-2">
                                            <div class="star-container bg-color-second d-flex p-2">
                                                <img src="{{ asset('assets/image/item/skill_star.png') }}"
                                                     class="star-image" alt="star">
                                                <p class="star-num"> {{ $i }} </p>
                                            </div>
                                            <p class="star-description">
                                                {{ $character->stars->$star }}
                                            </p>
                                        </li>
                                    @endif
                                @endfor
                            </ul>
                        </div>
                    </div>

                    <div class="description-single__item mt-4">
                        <h2>Matrices</h2>
                        <div class="character-matrix-container bg-color-second p-2 d-flex">
                            <div class="character-matrix-image">
                                <img src="{{ asset('storage/' . $character->matrix->image) }}" alt="matrix image">
                            </div>
                            <ul class="">
                                <li class="character-matrix bg-color-third">
                                    <div class="star-container bg-color-second d-flex p-2">
                                        <p class="star-num"> 2x </p>
                                    </div>
                                    <p>
                                        {{ $character->matrix->bonus }}
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="description-single__item mt-4">
                        <h2>Traits</h2>
                        <div class="character-matrix-container bg-color-second p-2 d-flex">
                            <ul>
                                <li class="character-matrix bg-color-third">
                                    <div class="star-container bg-color-second d-flex p-2">
                                        <p class="star-num"> 1200 </p>
                                    </div>
                                    <p>
                                        {{ $character->trait_1 }}
                                    </p>
                                </li>
                                <li class="character-matrix bg-color-third">
                                    <div class="star-container bg-color-second d-flex p-2">
                                        <p class="star-num"> 4000 </p>
                                    </div>
                                    <p>
                                        {{ $character->trait_2 }}
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>

                    {{--                    <div class="weapon-attack mt-4">--}}
                    {{--                        <h2>Weapon Abilities</h2>--}}
                    {{--                        <div class="bg-color-second p-2">--}}
                    {{--                            <div class="bg-color-third p-2">--}}
                    {{--                                <h3>Normal</h3>--}}
                    {{--                                <div class="bg-color p-2 mt-1">--}}
                    {{--                                    <p class="weapon-attack__combo-title">Normal attack</p>--}}
                    {{--                                    <p>Initiate 5 attacks in a row with Balmung when on the ground.</p>--}}
                    {{--                                    <ul class="weapon-attack-list mt-1">--}}
                    {{--                                        <li class="weapon-attack-list__item bg-color-third d-flex">--}}
                    {{--                                            <div class="weapon-attack-list__num bg-color-second d-flex">--}}
                    {{--                                                <p> 1 </p>--}}
                    {{--                                            </div>--}}
                    {{--                                            <p>Deal damage equal to 62.1% of ATK + 3 and cause minor knockback.</p>--}}
                    {{--                                        </li>--}}
                    {{--                                        <li class="weapon-attack-list__item bg-color-third d-flex">--}}
                    {{--                                            <div class="weapon-attack-list__num bg-color-second d-flex">--}}
                    {{--                                                <p> 2 </p>--}}
                    {{--                                            </div>--}}
                    {{--                                            <p>Deal damage equal to 62.1% of ATK + 3 and cause minor knockback.</p>--}}
                    {{--                                        </li>--}}
                    {{--                                        <li class="weapon-attack-list__item bg-color-third d-flex">--}}
                    {{--                                            <div class="weapon-attack-list__num bg-color-second d-flex">--}}
                    {{--                                                <p> 3 </p>--}}
                    {{--                                            </div>--}}
                    {{--                                            <p>Deal damage equal to 62.1% of ATK + 3 and cause minor knockback.</p>--}}
                    {{--                                        </li>--}}
                    {{--                                        <li class="weapon-attack-list__item bg-color-third d-flex">--}}
                    {{--                                            <div class="weapon-attack-list__num bg-color-second d-flex">--}}
                    {{--                                                <p> 4 </p>--}}
                    {{--                                            </div>--}}
                    {{--                                            <p>Deal damage equal to 62.1% of ATK + 3 and cause minor knockback.</p>--}}
                    {{--                                        </li>--}}
                    {{--                                        <li class="weapon-attack-list__item bg-color-third d-flex">--}}
                    {{--                                            <div class="weapon-attack-list__num bg-color-second d-flex">--}}
                    {{--                                                <p> 5 </p>--}}
                    {{--                                            </div>--}}
                    {{--                                            <p>Deal damage equal to 62.1% of ATK + 3 and cause minor knockback.</p>--}}
                    {{--                                        </li>--}}
                    {{--                                    </ul>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                </div>

            </section>

        </main>

    </div>
    <!--    main end-->

    <!--    footer-->
    @include('includes.footer')
    <!--    footer end-->
@endsection
