<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\BlogArticle;
use App\BlogComment;
use App\User;
use App\Blog;
use Redirect;
use Auth;
class ArticleController extends Controller
{
    //
    public function index($id)
    {
		//$articles=DB::table('blog_articles')->where('blog_id','=',$id)->paginate(15);
		if(Auth::user()->tag!='')
		{
			$user=User::find($id);
			$blog=$user->blog;

			if (empty($blog)) {
				# code...
				$blog=new Blog;
				$blog->name=$user->name;
				$blog->user_id=$user->id;
				$blog->save();
			}

			
			$blog=$user->blog;
			$articles=$blog->articles()->get();
			$user=User::find($id);
    		$data = array('articles' =>$articles ,'user'=>$user ,'blog'=>$blog);
    		//return $data;
    		return view('blog.admin.index')->with('data',$data);

			
    	}
    	else
    		return '该博客暂时不对实验室外部人员开放';

    }

    public function create($id) {

    	$user=User::find($id);
		$blog=$user->blog;
		$data = array('user' =>$user ,'blog'=>$blog );
		return view('blog.admin.create')->withData($data);
	}

	public function store(Request $request) {

		$this->validate($request, [
			'title' => 'required|max:255',
			'content' => 'required',
		]);

		//process the html code
		$raw = $request->input('content');
		$code = "";

		//process img tag and save imgs
		while (preg_match("/<img[^>]*src=\"data:image\/(jpeg|gif|png);base64,([^\"]*)\"[^>]*data-filename=\"([^\"]*)\"[^>]*>/u", $raw, $matches, PREG_OFFSET_CAPTURE)) {
			$leftlength = $matches[0][1];
			$taglength = strlen($matches[0][0]);

			//save img file
			$data = base64_decode($matches[2][0]);
			$filename = md5($data) .".". ($matches[1][0] == "jpeg" ? "jpg" : $matches[1][0]);

			if(!file_exists(public_path()."/assets/images/articles/".$filename)) {
				$file = fopen(public_path() . "/assets/images/articles/" . $filename, "w");
				fwrite($file, $data);
				fclose($file);
			}
			$code = $code . substr($raw, 0, $leftlength) . "<img src=\"_public_path/assets/images/articles/" . $filename . "\" />";
			$raw = substr($raw, $leftlength + $taglength);

		}

		$code = $code . $raw;

		//save in database
		$article = new BlogArticle;
		$article->title = $request->input('title');
		$user=User::find($request->input('user_id'));
		$blog=$user->blog;
		$article->blog_id = $blog->id;
		$article->content = $code;

		if ($article->save()) {
			return Redirect::to('blog/'.$user->id.'/admin');
		} else {
			return Redirect::back()->withInput();
		}

	}

	public function edit($id,$article_id) {
		$user=User::find($id);
		$blog=$user->blog;
		$article = BlogArticle::find($article_id);
		$data = array('id' => $id,'article'=>$article,'user'=>$user,'blog'=>$blog );
		return view('blog.admin.edit')->withData($data);
	}

	public function update(Request $request, $id , $article_id) {
		$this->validate($request, [
			'title' => 'required|max:255',
			'content' => 'required',
		]);

		//process the html code
		$raw = $request->input('content');
		$code = "";

		//process img tag and save imgs
		while (preg_match("/<img[^>]*src=\"data:image\/(jpeg|gif|png);base64,([^\"]*)\"[^>]*data-filename=\"([^\"]*)\"[^>]*>/u", $raw, $matches, PREG_OFFSET_CAPTURE)) {
			$leftlength = $matches[0][1];
			$taglength = strlen($matches[0][0]);

			//save img file
			$data = base64_decode($matches[2][0]);
			$filename = md5($data) .".". ($matches[1][0] == "jpeg" ? "jpg" : $matches[1][0]);

			if(!file_exists(public_path()."/assets/images/articles/".$filename)) {
				$file = fopen(public_path() . "/assets/images/articles/" . $filename, "w");
				fwrite($file, $data);
				fclose($file);
			}
			$code = $code . substr($raw, 0, $leftlength) . "<img src=\"_public_path/assets/images/articles/" . $filename . "\" />";
			$raw = substr($raw, $leftlength + $taglength);

		}

		$code = $code . $raw;

		//save in database
		$article = BlogArticle::find($article_id);
		$article->title = $request->input('title');
		$user=User::find($id);
		$blog=$user->blog;
		$article->blog_id = $blog->id;
		$article->content = $code;

		
		if ($article->save()) {
			return Redirect::to('blog/'.$id.'/admin');
		} else {
			return Redirect::back()->withInput();
		}

	}

	public function destroy($id,$article_id) 
	{

		$article = BlogArticle::find($article_id);
		$comments= BlogArticle::find($article['id'])->comments()->get();
		if (!checkArray($comments)) 
		{
			$comments->delete();	
		}
		$article->delete();
		//$comments= BlogArticle::find($article_id)->hasManyComments()->delete();
		//$comments=DB::table('blog_comments')->where('article_id','=',$article_id)->delete();
		return Redirect::to('blog/'.$id.'/admin');
	}

	public function show($id,$article_id)
	{
		$user=User::find($id);
		$blog=$user->blog;
		$article=BlogArticle::find($article_id);
        $data = array('article' =>$article,'id'=>$id,'user'=>$user,'blog'=>$blog);
        return view('blog.admin.article')->with('data',$data);
	}

	    public function comment(Request $request)
    {
        //Auth::id();
        $comment=new BlogComment;
        $comment->username=Auth::user()->name;
        $comment->content=$request->input('content');
        $comment->article_id=$request->input('article_id');
        $comment->save();
        return Redirect::back();
    }

    public function alist($id)
    {
    	$user=User::find($id);
        $blog=$user->blog;
        $articles=$blog->articles()->get();
        $data = array('user' =>$user ,'blog'=>$blog ,'articles'=>$articles);
        return view('blog.admin.list')->withData($data);
    }




}
