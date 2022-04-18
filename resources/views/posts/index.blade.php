@extends('layout.app')
@section ('title','Blog Posts Page')
@section ('content')
@foreach ($posts as $post)
   <p>{{$post['title']}}</P> 
@endforeach
@endsection


