@extends('layouts.main')
@section('content')
    <!--    header-->
    @include('includes.header')
    <!--    header end-->

    <!--    main-->
    <div class="row d-flex mb-5">
        <main class="col-xl-12">
            <article class="post row mt-4 bg-color">
                <div class="post__img-container p-0">
                    <h1 class="post__title">{{ $post->title }}</h1>
                    <img src="{{ asset('storage/' . $post->image) }}" alt="post_img">
                </div>

                <div class="post__main-container p-4">
                    <div class="post__category">
                        <h2><a href="{{ route('category.show', $post->category->id) }}">{{ $post->category->title }}</a></h2>
                    </div>

                    <div class="post__tags mt-3">
                        @foreach($post->tags as $tag)
                            <a href="{{ route('tag.show', $tag->id) }}">#{{ $tag->title }}</a>
                        @endforeach
                    </div>

                    <div class="line mt-4">
                        <hr>
                    </div>

                    <div class="post__content mt-4">
                        <p>{{ $post->content }}</p>
                    </div>

                    <div class="post__footer mt-4 d-flex">
                        <div class="post__author d-flex">
                            <div class="d-flex post__author-img">
                                <img src="{{ asset('assets/image/user/avatar-1.png') }}" alt="author img">
                                <div class="line-right"></div>
                            </div>
                            <div class="post__author-info">
                                <p>
                                    Author
                                </p>
                                <p class="post__author-item">
                                    02.02.2022
                                </p>
                            </div>
                        </div>
                        <div class="post__action">
                            <ul class="post__action-list d-flex">
                                <li class="post__action-list-item">
                                    0
                                </li>
                                <li class="post__action-list-item">
                                    <a href="#">
                                        <div class="like-icon"></div>
                                    </a>
                                </li>
                                <li class="post__action-list-item">
                                    <a href="#">
                                        <div class="fav-icon"></div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </article>

            <div class="form-comment-container row mt-5 p-4 bg-color">
                <form action="#" class="form-comment p-0">
                    <textarea class="form-comment__field mb-1" placeholder="Write a comment..."></textarea>
                    <button class="form-comment__button">Submit</button>
                </form>
            </div>

            <div class="comments-container row mt-4">
                <div class="comment mt-4 p-4 bg-color d-flex">
                    <div class="comment__author">
                        <img src="{{ asset('assets/image/user/avatar-1.png') }}" alt="author comment img">

                        <div class="line-bottom"></div>

                        <div class="comment__author-info d-flex">
                            <p class="comment__user-name">Frigg</p>
                            <p class="comment__date mt-2">02.02.2022</p>
                        </div>
                    </div>

                    <div class="comment__field d-flex">
                        <div class="comment__content">
                            <p>
                                Ut congue mollis diam vitae feugiat. Integer dictum ante sapien, in ullamcorper lorem
                                laoreet eget. Proin vehicula lacus fermentum, imperdiet ligula a, tempus lacus.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="comment mt-4 p-4 bg-color d-flex">
                    <div class="comment__author">
                        <img src="{{ asset('assets/image/user/avatar-2.png') }}" alt="author comment img">

                        <div class="line-bottom"></div>

                        <div class="comment__author-info d-flex">
                            <p class="comment__user-name">Cocoriter</p>
                            <p class="comment__date mt-2">01.01.2022</p>
                        </div>
                    </div>

                    <div class="comment__field d-flex">
                        <div class="comment__content">
                            <p>
                                Nullam purus nibh, luctus vitae mauris finibus, accumsan tincidunt mi.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <!--    main end-->

    <!--    footer-->
    @include('includes.footer')
    <!--    footer end-->
@endsection
