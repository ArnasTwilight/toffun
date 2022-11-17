@extends('layouts.main')
@section('content')
    <!--    header-->
    @include('includes.header')
    <!--    header end-->

    <!--    main-->
    <div class="row d-flex mb-5">
        <main class="col-xl-9">
            <div class="row mt-4">
                <div class="items-list-header bg-color-second p-0">
                    <div class="items-list-header__img-container SR">
                        <img src="{{ asset('assets/image/item/cybernetic-arm.png') }}" alt="relic">
                    </div>
                    <div class="items-list-header__name">
                        <div class="line-left"></div>
                        <h2>Relics</h2>
                    </div>
                    <ul class="items-list-header__item">
                        <li>
                            <h3 class="items-list-header__text blue">R</h3>
                        </li>
                        <li>
                            <h3 class="items-list-header__text violet">SR</h3>
                        </li>
                        <li>
                            <h3 class="items-list-header__text gold">SSR</h3>
                        </li>
                    </ul>
                </div>
            </div>
            <section class="post row mt-4 bg-color p-4">

                <div class="items-list p-0">
                    @foreach($relics as $relic)
                    <div class="items-list__item bg-color-second p-3">
                        <div class="items-list__img">
                            <a href="{{ route('relic.show', $relic->id) }}"><img src="{{ asset('storage/' . $relic->image) }}" alt="relic image"></a>

                            <div class="items-list__rarity">
                                <img src="{{ asset('storage/' . $relic->rarity->image) }}" alt="rarity">
                            </div>

                            <div class="line">
                                <hr>
                            </div>
                        </div>
                        <div class="character-name mt-2">
                            <a href="{{ route('relic.show', $relic->id) }}">{{ $relic->title }}</a>
                        </div>
                    </div>
                    @endforeach
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
