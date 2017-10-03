@extends('layout')
@section('content')
    <div class="col-sm-8">
        <h1>Sign In</h1>
        <form method="POST" action="/login">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
            @include('partials.errors')
        </form>
    </div>
@endsection