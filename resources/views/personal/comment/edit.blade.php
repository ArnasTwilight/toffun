@extends('layouts.main')
@section('content')
    <!--    header-->
    @include('includes.header')
    <!--    header end-->

    <div class="row d-flex mb-5">
        <main class="p-0">
            <section class="col-xl-9 m-auto bg-color p-4">

                <h2 class="my-3">Edit Comment</h2>
                <div class="user-card p-3">

                    <div class="user-card__comment p-2">
                        <div class="comment p-4 bg-color d-flex">
                            <div class="comment__author">
                                <img src="{{ asset('storage/' . $comment->user->image) }}" alt="author comment img">

                                <div class="line-bottom"></div>

                                <div class="comment__author-info d-flex">
                                    <p class="comment__user-name">{{ $comment->user->name }}</p>
                                    <p class="comment__date mt-2">{{ $comment->created_at->format('d.m.Y') }}</p>
                                </div>
                            </div>

                            <form action="{{ route('personal.comment.update', $comment->id) }}" class="comment__field"
                                  method="POST">
                                @csrf
                                @method('PATCH')
                                <textarea class="form-comment__field mb-1"
                                          placeholder="Write a comment..."
                                          name="message">{{ $comment->message }}</textarea>
                                <button class="form-comment__button">Submit</button>
                                @error('message')
                                <p class="text-danger-message mt-2">{{ $message }}</p>
                                @enderror
                            </form>
                        </div>

                    </div>
                </div>
                <div class="user-card-footer d-flex bg-color-third p-2">
                    <a href="{{ route('personal.comment.index') }}" class="button">Comment list</a>
                </div>
            </section>


        </main>
    </div>

    <!--    footer-->
    @include('includes.footer')
    <!--    footer end-->
@endsection
