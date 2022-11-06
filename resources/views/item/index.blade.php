@extends('layouts.main')
@section('content')
    <!--    header-->
    @include('includes.header')
    <!--    header end-->

    <!--    main-->
    <div class="row d-flex mb-5">
        <main class="p-0">
            <section class="col-xl-12 bg-color p-4">

                <div class="row">
                    <section class="col-xl-6">
                        <article class="item-main  p-0">
                            <div class="item-main__bg SR">
                                <img src="{{ asset('assets/image/item/purple-yam-pie.png') }}" alt="item img">
                            </div>

                            <div class="item-main__name d-flex">
                                <div class="line-left"></div>
                                <h2><a class="item-main__title" href="{{ route('food.index') }}">Food</a></h2>
                            </div>
                        </article>
                    </section>

                    <section class="col-xl-6">
                        <article class="item-main  p-0">
                            <div class="item-main__bg SSR">
                                <img src="{{ asset('assets/image/item/colossus-arms.png') }}" alt="item img">
                            </div>

                            <div class="item-main__name d-flex">
                                <div class="line-left"></div>
                                <h2><a class="item-main__title" href="{{ route('relic.index') }}">Relic</a></h2>
                            </div>
                        </article>
                    </section>
                </div>

            </section>
        </main>
    </div>
    <!--    main end-->

    <!--    footer-->
    @include('includes.footer')
    <!--    footer end-->
@endsection
