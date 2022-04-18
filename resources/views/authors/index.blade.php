@extends('layout.app')
@section ('content')
<h1> Our Authors</h1>

<table class="table table-stripped">

    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($authors as $key => $author ) 
        <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$author['name']}}</td>
             <td>{{$author['email']}}</td> 

             <td> <form action="{{route('authors.edit',['author'=>$author->id])}}" method="GET">
                @csrf
                @method('UPDATE')
                
                <button type="submit" class="btn btn-info">Edit</button>
            </form>

            <td> <form action="{{route('authors.destroy',['author'=>$author->id])}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
                </form>

        </tr>
        @endforeach
    </tbody>
</table>
@endsection    

 





