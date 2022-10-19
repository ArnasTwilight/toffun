@extends('layouts.main')
@section('content')
    <!--    header-->
    @include('includes.header')
    <!--    header end-->

    <!--    main-->
    <div class="row d-flex mb-5">

        <main class="col-xl-9">

            <section class="post row mt-4 bg-color p-4">
                <div class="character-list-header bg-color-second p-1">
                    <ul class="character-list-header__item d-flex">
                        <li>
                            <h3 class="character-list-header__text R">R</h3>
                        </li>
                        <li>
                            <h3 class="character-list-header__text SR">SR</h3>
                        </li>
                        <li>
                            <h3 class="character-list-header__text SSR">SSR</h3>
                        </li>
                    </ul>
                    <div class="line-vertical"></div>
                    <ul class="character-list-header__item d-flex">
                        <li>
                            <img src="images/icon/fire.png" alt="Flame">
                        </li>
                        <li>
                            <img src="images/icon/ice.png" alt="Frost">
                        </li>
                        <li>
                            <img src="images/icon/physical.png" alt="Physical">
                        </li>
                        <li>
                            <img src="images/icon/volt.png" alt="Volt">
                        </li>
                    </ul>
                    <div class="line-vertical"></div>
                    <ul class="character-list-header__item d-flex">
                        <li>
                            <img src="images/icon/dps.png" alt="DPS">
                        </li>
                        <li>
                            <img src="images/icon/defense.png" alt="Defense">
                        </li>
                        <li>
                            <img src="images/icon/support.png" alt="Support">
                        </li>
                    </ul>
                </div>

                <div class="character-list p-0">

                    @foreach($characters as $character)
                        <div class="character-list__character bg-color-second p-3">
                            <div class="character-list__avatar">
                                <img src="{{ asset('storage/' . $character->image) }}" alt="character avatar">

                                <div class="character-list__spec-element spec">
                                    <img src="images/icon/dps.png" alt="spec">
                                </div>
                                <div class="character-list__spec-element element">
                                    <img src="images/icon/ice.png" alt="element">
                                </div>
                                <div class="line">
                                    <hr>
                                </div>
                            </div>
                            <div class="character-name mt-2">
                                <a href="#">{{ $character->name }}</a>
                            </div>
                            <div class="character-weapon d-flex">
                                <div class="character-weapon__name">
                                    <a href="#">{{ $character->weapon->title }}</a>
                                </div>
                                <div class="character-weapon__img">
                                    <img src="{{ asset('storage/' . $character->weapon->image) }}" alt="weapon image">
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
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
