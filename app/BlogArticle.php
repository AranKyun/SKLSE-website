<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogArticle extends Model
{
    //
    protected $fillable = ['title','content','blog_id','article_id'];

    public function comments()
  {
    return $this->hasMany('App\BlogComment', 'article_id', 'id');
  }

  public function user()
  {
  	return $this->belongsTo('App\User');//$article->user
  }

}
