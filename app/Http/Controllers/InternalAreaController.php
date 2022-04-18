<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Http\Controllers\BlogPostController;
use \App\Http\Controllers\AuthorController;
use \App\Http\Controllers\CommentController;
use \App\Http\Controllers\HomeController;

use App\Models\BlogPost;
use App\Models\Author;
use App\Models\Comment;

class InternalAreaController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home.index');
    }
}

