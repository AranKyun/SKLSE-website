<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
     protected $fillable = [
        'introduction', 'sex', 'name','email',
    ];

     public function articles()
  	{
   	 	return $this->hasMany('App\BlogArticle', 'blog_id', 'id');
  	}

  	public function files()
  	{
   	 	return $this->hasMany('App\File', 'blog_id', 'id');
  	}
}
