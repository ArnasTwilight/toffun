@extends('layouts.main')
@section('content')
    <!--    header-->
    @include('includes.header')
    <!--    header end-->

    <div class="row d-flex mb-5">
        <main class="p-0">
            <section class="col-xl-9 m-auto bg-color p-4">

                <h2 class="my-3">Liked post ({{ $count }})</h2>
                <div class="user-card p-3">

                    <table class="liked-table">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Content</th>
                            <th colspan="2">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td><img class="liked-table-img"
                                        src="{{ asset('storage/' . $post->image) }}"
                                        alt="Post image" width="200px"></td>
                                <td>{!! Str::limit($post->content, 125, ' ...') !!}</td>
                                <td>
                                    <a href="{{ route('post.show', $post->id) }}" class="button liked-action">View</a>
                                </td>
                                <td>
                                    <form action="{{ route('personal.liked.delete', $post->id) }}"
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
                    {{ $posts->links() }}
                </div>
            </section>


        </main>
    </div>

    <!--    footer-->
    @include('includes.footer')
    <!--    footer end-->
@endsection
