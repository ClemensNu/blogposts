@extends('layout.app')
@section('content')

<h1> Create a new author </h1>
<form action="{{route('authors.store')}}" method="POST">
@csrf
@include('authors.partials.form')
<button type="submit" class="btn btn-primary">Create</button>


@endsection