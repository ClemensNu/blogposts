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


class HomeController extends Controller
{
    public function home()
    {
    return view ('home.index');
    }

    public function contact()
    {
        return view ('home.contact');
    }
}
