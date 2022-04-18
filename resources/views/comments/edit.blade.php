@extends('layout.app')
@section ('title','Update a Blog Post')

@section('content')
<h1>Update an existing Comment</h1>
<form action="{{route('comments.update',['comments'=>$comment->id])}}" method="POST">
    @csrf
    @method('PUT')
    @include('comments.partials.form')
    <button type="submit" class="btn btn-primary">Update </button>

</form>
@endsection