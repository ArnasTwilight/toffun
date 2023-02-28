@extends('layouts.main')
@section('content')
    <!--    header-->
    @include('includes.header')
    <!--    header end-->

    <div class="row d-flex mb-5">
        <main class="p-0">
            <section class="col-xl-9 m-auto bg-color p-4">

                <h2 class="my-3">Comment ({{ $count }})</h2>
                <div class="user-card p-3">

                    <table class="liked-table">
                        <thead>
                        <tr>
                            <th>Message</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th>Post</th>
                            <th colspan="2">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($comments as $comment)
                            <tr>
                                <td class="ww-anywhere">{{ Str::limit($comment->message, 50, ' ...') }}</td>
                                <td>{{ $comment->created_at->format('d.m.y H:i:s') }}</td>
                                <td>{{ $comment->updated_at->format('d.m.y H:i:s') }}</td>
                                <td class="ww-break">
                                    <a href="{{ route('post.show', $comment->post->id) }}">{{ $comment->post->title }}</a>
                                </td>
                                <td>
                                    <a href="{{ route('personal.comment.edit', $comment->id) }}"
                                       class="button liked-action">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('personal.comment.delete', $comment->id) }}"
                                          method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="button">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                </div>
                <div class="user-card-footer d-flex bg-color-third p-2">
                    {{ $comments->links() }}
                    <a href="{{ route('personal.main.index') }}" class="button">Cabinet</a>
                </div>
            </section>


        </main>
    </div>

    <!--    footer-->
    @include('includes.footer')
    <!--    footer end-->
@endsection
