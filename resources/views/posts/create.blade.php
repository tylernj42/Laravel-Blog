@extends('layout')
@section('content')
    <div class="col-sm-8 blog-main">
        <h2>Create a Post</h2>
        <hr>
        <form method="POST" action="/posts">
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title">
          </div>
          <div class="form-group">
            <label for="body">Body</label>
            <textarea name="body" class="form-control" id="body"></textarea>
          </div>
          <div class="form-group">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
        @include('partials.errors')
    </div>
@endsection('content')