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
                        <h1><a href="{{ route('post.show', $post->id) }}" class="post__title">{{ $post->title }}</a>
                        </h1>
                        <img src="{{ asset('storage/' . $post->image) }}" alt="post_img">
                    </div>

                    <div class="post__main-container p-4">
                        <div class="post__category">
                            <h2>
                                <a href="{{ route('category.show', $post->category->id) }}">{{ $post->category->title }}</a>
                            </h2>
                        </div>

                        <div class="line mt-4">
                            <hr>
                        </div>

                        <div class="post__content mt-4">
                            <p>{!! Str::limit($post->content, 512, ' ...') !!}</p>
                        </div>

                        <div class="post__footer mt-4 d-flex">
                            <div class="post__author d-flex">
                                <div class="post__author-img d-flex">
                                    @if($post['user_id'] != null)
                                        <img src="{{ asset('storage/' . $post->user->image) }}" alt="author img">
                                    @else
                                        <img src="{{ asset('storage/images/placeholder/no_user_image.png') }}" alt="author img">
                                    @endif
                                    <div class="line-right"></div>
                                </div>
                                <div class="post__author-info">
                                    <p>
                                        @if($post['user_id'] != null)
                                            {{ $post->user->name }}
                                        @else
                                            User Delete
                                        @endif
                                    </p>
                                    <p class="post__author-item">
                                        {{ $post->created_at->format('d.m.Y H:m') }}
                                    </p>
                                </div>
                            </div>
                            <div class="post__action">
                                <ul class="post__action-list d-flex">
                                    <li class="post__action-list-item">
                                        {{ $post->likes->count() }}
                                    </li>
                                    <li class="post__action-list-item">
                                        <form action="{{ route('post.like.store', $post->id) }}" method="post">
                                            @csrf
                                            @method('POST')
                                            @auth()
                                                @if(auth()->user()->LikedPosts->contains($post->id))
                                                    <button type="submit"
                                                            class="border-0 bg-transparent like-icon like-icon-true action-post">
                                                    </button>
                                                @else
                                                    <button type="submit"
                                                            class="border-0 bg-transparent like-icon action-post">
                                                    </button>
                                                @endif
                                            @else
                                                <div class="like-icon action-post"></div>
                                            @endauth
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach
            <div class="user-card-footer d-flex p-2">
                {{ $posts->links() }}
            </div>
        </main>
    </div>
    <!--    main end-->

    <!--    footer-->
    @include('includes.footer')
    <!--    footer end-->
@endsection
