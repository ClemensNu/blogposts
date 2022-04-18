@extends('layout.app')
@section('content')

<h1> Create a new comment </h1>

<div class="container">
    <form method="get" action="{{ route('comments.store') }}"method="POST">
        <label>Blog  Post Title</label>
        <select name="comment" class="form-control form-control-lg">
            @foreach($blogposts as $blogpost)
                <option >{{$blogpost->blogPostTitle}}</option>
                @endforeach 
                @include('comments.partials.form')
               <button type="submit" class="btn btn-primary">Create</button>
            
        </select>  
    </form>
</div>

@endsection





