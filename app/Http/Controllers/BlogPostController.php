<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Http\Controllers\BlogPostController;
use \App\Http\Controllers\CommentController;
use App\Models\BlogPost;
use App\Models\Comment;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;





use App\Http\Requests\StoreBlogPost;
use Illuminate\Foundation\Http\FormRequest;


class BlogPostController extends Controller {

 public $blogpost;

    public function index(  BlogPost $blogpost )
    {   

        $counters = BlogPost::withCount('comments')
        ->where('id', $blogpost->id)
        ->orderBy('created_at', 'desc')
        ->get();
        return view ('blogposts.index',['blogposts'=>BlogPost::all(),'counters'=>with($counters)]);

       

        //return view('blogposts.index' ,['blogposts'=> BlogPost::orderBy('created_at','desc')->take(5)->get()]);
    }

    public function create()
    {
        return view('blogposts.create');
    }

   

    public function store(StoreBlogPost $request)
    { 

      
          
       $validated =$request->validated();
       $blogpost = new BlogPost(); 
       $blogpost ->blogPostTitle = $validated['blogPostTitle'];
       $blogpost ->blogPostContent = $validated['blogPostContent'];
       $blogpost -> blogPostIsHighlight = $request ['blogPostIsHighlight']=='on' ? 1:0;
       $blogpost->save();

      $request->session()->flash('status','The Blog Post was created!');
 
      return redirect() -> route('blogposts.show',['blogpost'=> $blogpost->id]);
    
        
    }

   

    public function show($id)
    {
       return $blogpost =  view ('blogposts.show',blogpost::find($id));
        //return view ('blogposts.show',['blogposts'=>BlogPost::findOrFail($id)]);

       //return $blogpost = BlogPost::find($id) -> view ('blogposts.show');

        //return view ('blogposts.show')->with('blogpost', $blogpost);
      // return blogpost::find($id);
      // return view('blogposts.show');
       // ->extends('layouts.app')
       // ->section('content');
       
    
    }


 
    public function edit($id)
    {
        return view ('blogposts.edit',['blogpost'=>BlogPost::findOrFail($id)]);
    }

   
    public function update(StoreBlogPost $request, $id)
    {
       
        $blogpost = BlogPost::findOrFail($id);
        $validated = $request->validated();
        $blogpost->fill($validated);
        $blogpost -> blogPostIsHighlight = $request['blogPostIsHighlight']=='on' ? 1:0;
        $blogpost->save();

      $request->session()->flash('status','The Blog Post was updated succesfully');

     return redirect() -> route('blogposts.show',['blogpost'=> $blogpost->id]);

    }

  

    public function destroy($id)
    {
        $blogpost = BlogPost::findOrFail($id);
        $this->authorize('blogposts.delete',$blogpost);
        $blogpost->delete();

        $comments=$blogpost->comments;
        foreach ($comments as $comment)
        $comment->delete();
        $blogpost->delete();

        session ()->flash('status','Blog Post with ID'.$id.'was deleted');
        return redirect ()->route('blogposts.index');
    }
}

