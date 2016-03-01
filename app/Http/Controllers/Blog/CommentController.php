<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;
use Auth;
use App\BlogComment;
use App\BlogArticle;

class CommentController extends Controller
{
    //

    public function store(Request $request)
    {
    	$comment=new BlogComment;
        $comment->username=Auth::id();
        $comment->content=$request->input('content');
        $comment->article_id=$request->input('article_id');
        $comment->save();
        return Redirect::back();

    }
}
