@extends('layout.app')
@section ('title','Update a Author')

@section('content')
<h1>Update an existing author</h1>
<form action="{{route('authors.update',['author'=>$author->id])}}" method="POST">
    @csrf
    @method('PUT')
    @include('authors.partials.form')
    <button type="submit" class="btn btn-primary">Update </button>

</form>
@endsection