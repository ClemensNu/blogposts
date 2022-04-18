@extends('layout.app')
@section ('title','Update a Blog Post')

@section('content')
<h1>Update an existing Blog Post</h1>
<form action="{{route('blogposts.update',['blogpost'=>$blogpost->id])}}" method="POST">
    @csrf
    @method('PUT')
    @include('blogposts.partials.form')
    <button type="submit" class="btn btn-primary">Update </button>

</form>
@endsection