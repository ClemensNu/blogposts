@extends('layout.app')
@section ('title','content')


    <div class="max-w-4xl mx-auto py-20">
        <h1>{{ $blogPostTitle }}</h1>
        <p>{!! $comment !!}</p>
    </div>
</div>

