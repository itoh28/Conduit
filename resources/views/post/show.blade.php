<x-common>

    <div class="article-page">
        <div class="banner">
            <div class="container">
                <h1> {{ $post->title }} </h1>

                <div class="article-meta">
                    <a href="/profile/eric-simons"><img src="http://i.imgur.com/Qr71crq.jpg" /></a>
                    <div class="info">
                        <a href="/profile/eric-simons" class="author">{{ $post->user->name }}</a>
                        <span class="date">{{ $post->created_at->format('F j, Y') }}</span>
                    </div>
                    <div class="inlineBlock">
                        <button class="btn btn-sm btn-outline-secondary">
                            <i class="ion-plus-round"></i>
                            &nbsp; Follow {{ $post->user->name }} <span class="counter">(10)</span>
                        </button>
                        &nbsp;&nbsp;
                    </div>
                    <div class="inlineBlock">
                        <button class="btn btn-sm btn-outline-primary">
                            <i class="ion-heart"></i>
                            &nbsp; Favorite Post <span class="counter">(29)</span>
                        </button>
                    </div>
                    <div class="inlineBlock">
                        <button class="btn btn-sm btn-outline-secondary">
                            <a href="{{route('post.edit', $post)}}"><i class="ion-edit"></i> Edit Article</a>
                        </button>
                    </div>
                    <div class="inlineBlock">
                        <form method="post" action="{{route('post.destroy', $post)}}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-outline-danger" onClick="return confirm('Do you really want to delete this?');"><i class="ion-trash-a"></i> Delete Article</a></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="container page">
            <div class="row article-content">
                <div class="col-md-12">
                    <p>{{ $post->body }}</p>
                    <ul class="tag-list">
                        @foreach ($post->tags as $tag)
                        <li class="tag-default tag-pill tag-outline">{{ $tag->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <hr />

            <div class="article-actions">
                <div class="article-meta">
                    <a href="profile.html"><img src="http://i.imgur.com/Qr71crq.jpg" /></a>
                    <div class="info">
                        <a href="" class="author">{{ $post->user->name }}</a>
                        <span class="date">{{ $post->created_at->format('F j, Y') }}</span>
                    </div>
                    <div class="inlineBlock">
                        <button class="btn btn-sm btn-outline-secondary">
                            <i class="ion-plus-round"></i>
                            &nbsp; Follow {{ $post->user->name }} <span class="counter">(10)</span>
                        </button>
                        &nbsp;
                    </div>
                    <div class="inlineBlock">
                        <button class="btn btn-sm btn-outline-primary">
                            <i class="ion-heart"></i>
                            &nbsp; Favorite Post <span class="counter">(29)</span>
                        </button>
                    </div>
                    <div class="inlineBlock">
                        <button class="btn btn-sm btn-outline-secondary">
                            <a href="{{route('post.edit', $post)}}"><i class="ion-edit"></i> Edit Article</a>
                        </button>
                    </div>
                    <div class="inlineBlock">
                        <form method="post" action="{{route('post.destroy', $post)}}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-outline-danger" onClick="return confirm('Do you really want to delete this?');"><i class="ion-trash-a"></i> Delete Article</a></button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-md-8 offset-md-2">
                    <form class="card comment-form">
                        <div class="card-block">
                            <textarea class="form-control" placeholder="Write a comment..." rows="3"></textarea>
                        </div>
                        <div class="card-footer">
                            <img src="http://i.imgur.com/Qr71crq.jpg" class="comment-author-img" />
                            <button class="btn btn-sm btn-primary">Post Comment</button>
                        </div>
                    </form>

                    <div class="card">
                        <div class="card-block">
                            <p class="card-text">
                                With supporting text below as a natural lead-in to additional content.
                            </p>
                        </div>
                        <div class="card-footer">
                            <a href="/profile/author" class="comment-author">
                                <img src="http://i.imgur.com/Qr71crq.jpg" class="comment-author-img" />
                            </a>
                            &nbsp;
                            <a href="/profile/jacob-schmidt" class="comment-author">Jacob Schmidt</a>
                            <span class="date-posted">Dec 29th</span>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

</x-common>