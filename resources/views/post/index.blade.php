@extends('layouts.main')
@section('content')
    <!--    header-->
    @include('includes.header')
    <!--    header end-->

    <!--    main-->
    <div class="row d-flex mb-5">
        <main class="col-xl-12">
            @foreach($posts as $post)
                <article class="post row mt-4 bg-color">
                    <div class="post__img-container p-0">
                        <h1><a href="{{ route('post.show', $post->id) }}" class="post__title">{{ $post->title }}</a></h1>
                        <img src="{{ asset('assets/image/post/post-img-1.png') }}" alt="post_img">
                    </div>

                    <div class="post__main-container p-4">
                        <div class="post__category">
                            <h2><a href="{{ route('category.show', $post->category->id) }}">{{ $post->category->title }}</a></h2>
                        </div>

                        <div class="line mt-4">
                            <hr>
                        </div>

                        <div class="post__content mt-4">
                            <p>{{ $post->content }}</p>
                        </div>

                        <div class="post__footer mt-4 d-flex">
                            <div class="post__author d-flex">
                                <div class="post__author-img d-flex">
                                    <img src="{{ asset('assets/image/user/avatar-1.png') }}" alt="author img">
                                    <div class="line-right"></div>
                                </div>
                                <div class="post__author-info">
                                    <p>
                                        Author
                                    </p>
                                    <p class="post__author-item">
                                        {{ $post->created_at }}
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
            @endforeach
        </main>
    </div>
    <!--    main end-->

    <!--    footer-->
    @include('includes.footer')
    <!--    footer end-->
@endsection
