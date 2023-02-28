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
                        <h2><a href="{{ route('category.show', $post->category->id) }}">{{ $post->category->title }}</a>
                        </h2>
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
                        {!! $post->content !!}
                    </div>

                    <div class="post__footer mt-4 d-flex">
                        <div class="post__author d-flex">
                            <div class="post__author-img d-flex">
                                @if($post['user_id'] != null)
                                    <img src="{{ asset('storage/' . $post->user->image) }}" alt="author img">
                                @else
                                    <img src="#" alt="author img">
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
                                            <button type="submit"
                                                    class="border-0 bg-transparent like-icon @if(auth()->user()->LikedPosts->contains($post->id)) like-icon-true @endif action-post">
                                            </button>
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

            @auth()
                <div class="form-comment-container row mt-5 p-4 bg-color">
                    <form action="{{ route('post.comment.store', $post->id) }}" class="form-comment p-0"
                          method="POST">
                        @csrf
                        @method('POST')
                        <textarea class="form-comment__field mb-1"
                                  placeholder="Write a comment..."
                                  name="message"></textarea>
                        <div class="button-pos">
                            <button class="form-comment__button">Submit</button>
                        </div>
                        @error('message')
                        <p class="text-danger-message mt-2">{{ $message }}</p>
                        @enderror
                    </form>
                </div>
            @endauth

            <div class="comments-container row mt-4">

                @foreach($comments as $comment)
                    <div class="comment mt-4 p-4 bg-color d-flex">
                        <div class="comment__author">
                            <img src="{{ asset('storage/' . $comment->user->image) }}" alt="author comment img">

                            <div class="line-bottom"></div>

                            <div class="comment__author-info d-flex">
                                <p class="comment__user-name">{{ $comment->user->name }}</p>
                                <p class="comment__date mt-2">{{ $comment->created_at->format('d.m.Y') }}</p>
                            </div>
                        </div>

                        <div class="comment__field d-flex">
                            <div class="comment__content">
                                <p>
                                    {{ $comment->message }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
                    <div class="user-card-footer comment mt-4 p-4 bg-color d-flex">
                        {{ $comments->links() }}
                    </div>
            </div>
        </main>
    </div>
    <!--    main end-->

    <!--    footer-->
    @include('includes.footer')
    <!--    footer end-->
@endsection
