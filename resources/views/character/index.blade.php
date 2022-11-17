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
                            <h3 class="character-list-header__text blue">R</h3>
                        </li>
                        <li>
                            <h3 class="character-list-header__text violet">SR</h3>
                        </li>
                        <li>
                            <h3 class="character-list-header__text gold">SSR</h3>
                        </li>
                    </ul>
                    <div class="line-vertical"></div>
                    <ul class="character-list-header__item d-flex">
                        @foreach($elements as $element)
                        <li>
                            <img src="{{ asset('storage/' . $element->image) }}" class="character-list-header__image" alt="{{ $element->title }}">
                        </li>
                        @endforeach
                    </ul>
                    <div class="line-vertical"></div>
                    <ul class="character-list-header__item d-flex">
                        @foreach($specList as $spec)
                        <li>
                            <img src="{{ asset('storage/' . $spec->image) }}" class="character-list-header__image" alt="{{ $spec->title }}">
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="character-list p-0">

                    @foreach($characters as $character)
                        <div class="character-list__character bg-color-second p-3">
                            <div class="character-list__avatar">

                                <a href="{{ route('character.show', $character->id) }}">
                                    <img src="{{ asset('storage/' . $character->image) }}" alt="character avatar">
                                </a>

                                <div class="character-list__spec-element spec">
                                    <img src="{{ asset('storage/' . $character->spec->image) }}" alt="spec">
                                </div>
                                <div class="character-list__spec-element element">
                                    <img src="{{ asset('storage/' . $character->weapon->element->image) }}" alt="element">
                                </div>
                                <div class="line"><hr></div>
                            </div>
                            <div class="character-name mt-2">
                                <a href="{{ route('character.show', $character->id) }}">{{ $character->name }}</a>
                            </div>
                            <div class="character-weapon d-flex">
                                <div class="character-weapon__name">
                                    <a href="#">{{ $character->weapon->title }}</a>
                                </div>
                                <div class="character-weapon__img">
                                    <a href="#">
                                        <img src="{{ asset('storage/' . $character->weapon->image) }}" alt="weapon image">
                                    </a>
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
