<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InternalAreaController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::view('/', 'home.index');
//Route::view('/register','auth.register');
//Route::get('/contact', 'App\Http\Controllers\homeController@contact')->name('home.contact');
//Route::resource ('blogposts',BlogPostController::class);
//Route::resource ('authors',AuthorController::class);
//Route::resource ('comments',CommentController::class);




Route::get('/', [HomeController::class, 'home'])->name('home.index');
Route::get('/home', [InternalAreaController::class, 'index'])->name('home');
Route::get('/contact', [HomeController::class,'contact'])->name('home.contact');

Route::get('/recent-post/{days-ago?}',function($daysAgo=20){
    return 'Posts from'.$daysAgo.'days ago' ;})->name('posts.recent.index');

Route::resource ('blogposts',BlogPostController::class);
Route::resource ('authors',AuthorController::class);
Route::resource ('comments',CommentController::class)->only('create','store');





Auth::routes();
