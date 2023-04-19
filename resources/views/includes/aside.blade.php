<div class="col-xl-3 col-lg-12">
    <div class="row pl-4-aside">
        <aside class="aside mt-4 p-3 bg-color">
            <h2 class="mb-4">Popular</h2>
            <div class="line">
                <hr>
            </div>

            <div class="aside-article-container">
                <div>
                    @foreach($popularPosts as $post)
                        <article class="aside-post">
                            <div class="aside-post-container">
                                <h3><a href="{{ route('post.show', $post->id) }}" class="aside-post__title">{{ $post->title }}</a></h3>
                                <img src="{{ asset('storage/' . $post->image) }}" alt="aside_recent_post">
                            </div>
                        </article>
                    @endforeach
                </div>

                <iframe class="discord" src="https://discord.com/widget?id=772884627320864839&theme=dark" width="100%" allowtransparency="true" frameborder="0" sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"></iframe>
            </div>

        </aside>
    </div>
</div>
