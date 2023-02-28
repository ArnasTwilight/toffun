@extends('layouts.main')
@section('content')
    <!--    header-->
    @include('includes.header')
    <!--    header end-->

    <div class="row d-flex mb-5">
        <main class="p-0">
            <section class="col-xl-9 m-auto bg-color p-4">
                <h2 class="mb-3">User info</h2>
                <form action="{{ route('personal.edit.update', $user->id) }}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="user-card-main">
                        <div class="user-card p-3 d-flex">
                            <div class="user-avatar">
                                <img class="user-avatar__image" src="{{ asset( 'storage/' . $user->image) }}"
                                     alt="User avatar">
                            </div>

                            <div class="mx-4"></div>

                            <ul class="user-info">
                                <li>
                                    <label>Name</label>
                                    <input class="edit-info" type="text" value="{{ $user->name }}" name="name">
                                    @error('name')
                                    <p class="text-danger-message">{{ $message }}</p>
                                    @enderror
                                </li>
                                <li>
                                    <label>Mail</label>
                                    <input class="edit-info" type="email" value="{{ $user->email }}" name="email">
                                    @error('email')
                                    <p class="text-danger-message">{{ $message }}</p>
                                    @enderror
                                </li>
                                <li>
                                    <label>Image</label>
                                    <input type="file" name="image">
                                    @error('image')
                                    <p class="text-danger-message">{{ $message }}</p>
                                    @enderror
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="user-card-footer d-flex bg-color-third p-2">
                        <button type="submit" class="user-edit button">Edit info</button>
                        <a href="{{ route('personal.edit.edit') }}" class="user-edit button">Change password</a>
                    </div>
                </form>

                <h2 class="my-3">Latest liked post</h2>
                <div class="user-card">
                    <div class="user-card__liked p-3">
                        <div class="user-card__liked-container">
                            @foreach($posts as $post)
                                <article class="aside-post mx-2">
                                    <div class="aside-post-container">
                                        <h3><a href="{{ route('post.show', $post->id) }}" class="aside-post__title">{{ $post->title }}</a></h3>
                                        <img src="{{ asset('storage/' . $post->image) }}" alt="aside_recent_post">
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="user-card-footer d-flex bg-color-third p-2">
                    <a class="button" href="{{ route('personal.liked.index') }}">See all...</a>
                </div>

                <h2 class="my-3">Latest comment</h2>
                <div class="user-card">
                    <div class="user-card__comment p-3">
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
                                <div class="comment__content ww-break">
                                    {{ $comment->message }}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="user-card-footer d-flex bg-color-third p-2">
                    <a class="button" href="{{ route('personal.comment.index') }}">See all...</a>
                </div>

            </section>


        </main>
    </div>

    <!--    footer-->
    @include('includes.footer')
    <!--    footer end-->
@endsection
