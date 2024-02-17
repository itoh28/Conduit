<x-common>
    <div class="home-page">
        <div class="banner">
            <div class="container">
                <h1 class="logo-font">conduit</h1>
                <p>A place to share your knowledge.</p>
            </div>
        </div>

        <div class="container page">
            <div class="row">
                <div class="col-md-9">
                    <div class="feed-toggle">
                        <ul class="nav nav-pills outline-active">
                            <li class="nav-item">
                                <a class="nav-link active" href="">Global Feed</a>
                            </li>
                        </ul>
                    </div>

                    @foreach ($posts as $post)
                    <div class="article-preview">
                        <div class="article-meta">
                            <a href="/profile/eric-simons"><img src="http://i.imgur.com/Qr71crq.jpg" /></a>
                            <div class="info">
                                <a href="/profile/eric-simons" class="author">{{ $post->user->name }}</a>
                                <span class="date">{{ $post->created_at->format('F j, Y') }}</span>
                            </div>
                            <button class="btn btn-outline-primary btn-sm pull-xs-right">
                                <i class="ion-heart"></i> 29
                            </button>
                        </div>
                        <a href="{{route('post.show', $post)}}" class="preview-link">
                            <h1>{{ $post->title }}</h1>
                            <p>{{ $post->summary }}</p>
                            <span>Read more...</span>
                            <ul class="tag-list">
                                @foreach ($post->tags as $tag)
                                <li class="tag-default tag-pill tag-outline">{{ $tag->name }}</li>
                                @endforeach
                            </ul>
                        </a>
                    </div>
                    @endforeach

                    <ul class="pagination">
                        <li class="page-item active">
                            <a class="page-link" href="">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="">2</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-3">
                    <div class="sidebar">
                        <p>Popular Tags</p>

                        <div class="tag-list">
                            <a href="" class="tag-pill tag-default">programming</a>
                            <a href="" class="tag-pill tag-default">javascript</a>
                            <a href="" class="tag-pill tag-default">emberjs</a>
                            <a href="" class="tag-pill tag-default">angularjs</a>
                            <a href="" class="tag-pill tag-default">react</a>
                            <a href="" class="tag-pill tag-default">mean</a>
                            <a href="" class="tag-pill tag-default">node</a>
                            <a href="" class="tag-pill tag-default">rails</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-common>