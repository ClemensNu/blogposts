<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Http\Controllers\BlogPostController;
use \App\Http\Controllers\AuthorController;
use \App\Http\Controllers\CommentController;

use App\Models\BlogPost;
use App\Models\Author;
use App\Models\Comment;


use App\Http\Requests\StoreBlogPost;
use App\Http\Requests\StoreAuthor;
use App\Http\Requests\StoreComment;

use Illuminate\Foundation\Http\FormRequest;


class CommentController extends Controller
{  
    public $comment;
    public $blogpost;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('comments.index',['comments'=>Comment::all()],);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comments.create',['blogposts'=>BlogPost::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreComment $request)
    {
        $validated =$request->validated();
        $comment = new Comment(); 
        $comment ->commentContent = $validated['commentContent'];
        $blogpost = new BlogPost(); 
        $blogpost ->id = $validated['id'];
        $comment->save();
 
       $request->session()->flash('status','The comment was created!');
  
       return redirect() -> route('blogposts.show',['blogpost'=> $blogpost->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $comment =  view ('comments.show',comment::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view ('comments.edit',['comment'=>Comment::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreComment $request, $id)
    {
        $comment = Comment::findOrFail($id);
        $validated = $request->validated();
        $comment->fill($validated);
        $comment->save();

        $request->session()->flash('status','The comment was updated succesfully');

       return redirect() -> route('comments.show',['comment'=> $comment->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        session ()->flash('status','Comment with ID'.$id.'was deleted');
        return redirect ()->route('comments.index');
    }
}
