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
                    <div class="items-list-header__img-container SSR">
                        <img src="{{ asset('assets/image/item/frigg.png') }}" alt="matrices">
                    </div>
                    <div class="items-list-header__name">
                        <div class="line-left"></div>
                        <h2>Matrix</h2>
                    </div>
                </div>
            </div>

            <section class="post row mt-4 bg-color p-4">
                <table class="food-table p-0">
                    <tbody class="">
                    <tr class="bg-color-second">
                        <th class="p-3">Image</th>
                        <th>Name</th>
                        <th>Rarity</th>
                    </tr>
                    @foreach($matrices as $matrix)
                        <tr class="bg-color-second">
                            <td class="food-table__image p-2 {{ $matrix->rarity->title }}">
                                <a href="{{ route('matrix.show', $matrix->id) }}">
                                    <img src="{{ asset('storage/' . $matrix->image) }}" alt="matrix image">
                                </a>
                            </td>
                            <td class="food-table__recipe">
                                <a href="{{ route('matrix.show', $matrix->id) }}">
                                    {{ $matrix->title }}
                                </a>
                            </td>
                            <td class="food-table__rarity">
                                <img src="{{ asset('storage/' . $matrix->rarity->image) }}" alt="rarity">
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </section>
        </main>

        @include('includes.aside')
    </div>
    <!--    main end-->

    <!--    footer-->
    @include('includes.footer')
    <!--    footer end-->
@endsection
