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
                    <div class="items-list-header__img-container N">
                        <img src="{{ asset('assets/image/item/snack-box.png') }}" alt="gifts">
                    </div>
                    <div class="items-list-header__name">
                        <div class="line-left"></div>
                        <h2>Gift</h2>
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
                    @foreach($gifts as $gift)
                        <tr class="bg-color-second">
                            <td class="food-table__image p-4 {{ $gift->rarity->title }}">
                                <img src="{{ asset('storage/' . $gift->image) }}" alt="gift image">
                            </td>
                            <td class="food-table__recipe">
                                <p>
                                    {{ $gift->title }}
                                </p>
                            </td>
                            <td class="food-table__rarity">
                                <img src="{{ asset('storage/' . $gift->rarity->image) }}" alt="rarity">
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
