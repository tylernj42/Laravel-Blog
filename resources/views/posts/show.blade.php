@extends('layout')

@section('content')
    <div class="col-sm-8 blog-main">
        <div class="blog-post">
            <h2 class="blog-post-title">
                <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
            </h2>
            <p class="blog-post-meta">{{ $post->created_at->toFormattedDateString() }}</p>
            <p>{{ $post->body }}</p>
            @if(count($post->comments) > 0)
                <hr>
                <ul class="list-group">
                    @foreach($post->comments as $comment)
                        <li class="list-group-item">
                            <article>
                                <strong><small>{{ $comment->created_at->diffForHumans() }}:</small></strong>
                                <p>{{ $comment->body }}</p>
                            </article>
                        </li>
                    @endforeach
                </ul>
            @endif
            <hr>
            <div class="card">
                <div class="card-block">
                    <form method="POST" action="/posts/{{ $post->id }}/comments">
                        <div class="form-group">
                            <textarea name="body" class="form-control" placeholder="Your Comment Here"></textarea>
                        </div>
                        <div class="form-group">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-primary">Add Comment</button>
                        </div>
                    </form>
                    @include('partials.errors')
                </div>
            </div>
        </div><!-- /.blog-post -->
    </div>
@endsection