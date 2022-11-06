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
                        <img src="{{ asset('assets/image/item/purple-yam-pie.png') }}" alt="food">
                    </div>
                    <div class="items-list-header__name">
                        <div class="line-left"></div>
                        <h2>Food</h2>
                    </div>
                </div>
            </div>

            <section class="post row mt-4 bg-color p-4">
                <table class="food-table p-0">
                    <tbody class="">
                    <tr class="bg-color-second">
                        <th colspan="2" class="p-3">Recipe</th>
                        <th>Rarity</th>
                        <th>Ingredients</th>
                    </tr>
                    @foreach($food as $recipe)
                        <tr class="bg-color-second">
                            <td class="food-table__image p-4 {{ $recipe->rarity->title }}">
                                <a href="{{ route('food.show', $recipe->id) }}">
                                    <img src="{{ asset('storage/' . $recipe->image) }}" alt="food image">
                                </a>
                            </td>
                            <td class="food-table__recipe">
                                <a href="{{ route('food.show', $recipe->id) }}">
                                    {{ $recipe->title }}
                                </a>
                            </td>
                            <td class="food-table__rarity">
                                <img src="{{ asset('storage/' . $recipe->rarity->image) }}" alt="rarity">
                            </td>
                            <td class="food-table__ingredients">
                                <ul class="ingredient-list">
                                    @foreach($recipe->ingredients as $ingredient)
                                        <li class="ingredient-list__item">
                                            <div class="{{ $ingredient->rarity->title }}">
                                                <img src="{{ asset('storage/' . $ingredient->image) }}"
                                                     alt="ingredient image" class="ingredient-image">
                                            </div>
                                            {{ $ingredient->title }}
                                        </li>
                                    @endforeach
                                </ul>
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
