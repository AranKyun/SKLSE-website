<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    //
     protected $fillable = ['username','content','article_id','blog_id'];

}
