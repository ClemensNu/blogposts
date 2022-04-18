@extends('layout.app')
@section ('content')
<h1> Blog Posts</h1>

<table class="table table-stripped">

    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Highlight</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($blogposts as $key => $blogpost)
        <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$blogpost['blogPostTitle']}}</td>
             <td>{{$blogpost['blogPostContent']}}</td> 
             <td>{{$blogpost['blogPostIsHighlight']== 1 ? 'Yes' : 'No'}}</td>

             <td> <form action="{{route('blogposts.edit',['blogpost'=>$blogpost->id])}}" method="GET">
                @csrf
                @method('UPDATE')
                
                <button type="submit" class="btn btn-info">Edit</button>
            </form>

            <td> <form action="{{route('blogposts.destroy',['blogpost'=>$blogpost->id])}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
                </form>

        </tr>
        @endforeach
    </tbody>
</table>
@endsection    

 





