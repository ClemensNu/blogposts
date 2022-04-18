<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;



class BlogPost extends Model
{
    use hasFactory;
  
    
   protected $fillable = [
       'blogPostTitle',
       'blogPostContent',
   ];

   public function comments()
   {
       return $this->hasMany(Comment::class);
   }





}



