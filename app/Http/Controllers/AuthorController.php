<?php

namespace App\Http\Controllers;
use App\Models\Author;
use App\Models\Profile;
use App\Models\Comment;

use App\Http\Requests\StoreAuthor;
use App\Http\Requests\StoreProfile;
use App\Http\Requests\StoreComment;

use Illuminate\Http\Request;

class AuthorController extends Controller
{

      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view ('authors.index',['authors'=>Author::all()]);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAuthor $request)
    {
        
       $validated =$request->validated();
       $author = new Author(); 
       $author ->name = $validated['name'];
       $author->save();

       
       foreach ($profiles as $profile) {
       $validated =$request->validated();
       $profile = new Profile(); 
       $profile ->email = $validated['email'];
       };



      $request->session()->flash('status','New author created!');
 
      return redirect() -> route('authors.show',['author'=> $author->id]);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $author =  view ('authors.show',author::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view ('authors.edit',['author'=>Author::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $author = Author::findOrFail($id);
        $validated = $request->validated();
        $author->fill($validated);
        $author->save();

      $request->session()->flash('status','The Author was updated succesfully');

     return redirect() -> route('authors.show',['author'=> $author->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $author = Author::findOrFail($id);
        $author->delete();
        session ()->flash('status','author with ID'.$id.'was deleted');
        return redirect ()->route('authors.index');
    }
}
