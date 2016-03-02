<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\BlogArticle;
use App\BlogComment;
use App\Blog;
use App\User;
use Redirect;
use Auth;

class BlogController extends Controller
{
    //
    public function index()
    {
    	$users=DB::table('users')->where('tag','=','teacher')->paginate(15);
    	return view('blog.index')->withUsers($users);
    }
    
    public function home($id)
    {
        //$articles=DB::table('blog_articles')->where('blog_id','=',$id)->paginate(15);
        if (Auth::check()&&Auth::user()->id==$id) {
            # code...
            return Redirect::to('/blog/'.$id.'/admin')->with('id',$id);
        }
        $user=User::find($id);
        $blog=User::find($id)->blog;
        $articles=$blog->articles()->get();
        $data = array('articles' =>$articles ,'user'=>$user,'blog'=>$blog );

        return view('blog.home')->with('data',$data);

    }


     public function show($id,$article_id)
    {
        
        $user=User::find($id);
        $blog=User::find($id)->blog;
        $article=BlogArticle::find($article_id);
        $islogged=Auth::check();
        $data = array('article' =>$article ,'islogged'=>$islogged ,'id'=>$id,'user'=>$user,'blog'=>$blog);
        return view('blog.article')->with('data',$data);

    }

        public function search(Request $request)
    {
        $search=$request->only('searchtit');
        $user=User::find($request->input('user_id'));
        $blog=$user->blog;
        $articles=DB::table('blog_articles')->where('blog_id','=',$blog->id)->where('title','like','%'.$search['searchtit'].'%')->paginate(15);
       // return $articles;
        //$data = array('id' => $user->id,'articles',$articles);
        return view('blog.search')->with('id',$user->id)->with('articles',$articles);
    }


    public function set($id){
        $user=User::find($id);
        $blog=$user->blog;
        return view('blog.admin.set')->withUser($user)->withBlog($blog);
    }

    public function setstore(Request $request,$id){

        $user=User::find($id);
        $blog=$user->blog;
        $blog->user_id = $request->input('user_id');
        $blog->introduction = $request->input('introduction');
        $blog->name=$request->input('name');
        $blog->sex=$request->input('sex');

        
        $file = $request->file('icon');
        
        if ($file!=null) 
        {
            //delete old icon
            $old_icon=$request->input('old_icon');
            if($old_icon!=null)
            {
                $path=public_path().'/assets/images/icon/'.$old_icon;
                unlink($path);
            }

            $filename = $file->getFileName();
                $extension = $file->getClientOriginalExtension();    
                if ($extension!='jpg') 
                {
                     # code...
                    header("Content-type:text/html;charset=utf-8");
                    
                    echo "<script language=\"javascript\">\r\n";
                    echo "alert(\"请上传JPG格式图像文件!\");\r\n";
                    echo "history.back();\r\n";
                    echo "</script>";
                    exit;
                } 
                $clientName = $file->getClientOriginalName();
        
                $newName = md5(date('ymdhis').$clientName).'.'.$extension;
                
                $file->move(public_path()."/assets/images/icon",$newName);
                $blog->icon=$newName;
            }
            else
                $blog->icon=$request->input('old_icon');



        if($blog->save()){
            return Redirect::to('blog/'.$id.'/admin');
        }
        else{
            return Redirect::back()->withInput();
        }

    }

    
}
