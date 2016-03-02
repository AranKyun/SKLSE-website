<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use DB;
use Redirect;
use App\File;
use App\Blog;

class UploadController extends Controller
{
    //
    public function index($id)
    {
    	$user=User::find($id);
        $blog=$user->blog;
        $files=$blog->files()->get();
        //$files= DB::table('files')->where('blog_id','=',$id)->paginate(15);
    	$data = array('user' => $user,'files'=>$files,'user'=>$user,'blog'=>$blog);
    	return view('blog.admin.filecenter')->withData($data);
    }

    public function create($id)
    {
    	
    }

    public function store(Request $request,$id)
    {
        
    	$this->validate($request, [
			'myfile' => 'required',
		]);
		
		$file = $request->file('myfile');
    	$id = $request->Input('user_id');

        
        if ($file->getSize()<=0) 
        {
             # code...
            header("Content-type:text/html;charset=utf-8");
            
            echo "<script language=\"javascript\">\r\n";
            echo "alert(\"文件内容不能为空!\");\r\n";
            echo "history.back();\r\n";
            echo "</script>";
            exit;


        } 
    	
		$filename = $file->getFileName();
		$extension = $file->getClientOriginalExtension();
		$clientName = $file->getClientOriginalName();

		$newName = md5(date('ymdhis').$clientName).'.'.$extension;

		$file->move(public_path()."/uploads",$newName);
        
		$f = new File;
		$user=User::find($request->input('user_id'));
        $blog=$user->blog;
        $f->blog_id = $blog->id;
		$f->new_name = $newName;
		$f->original_name = $clientName;

		if($f->save()){
			return Redirect::to('blog/'.$id.'/admin/uploads');
		}
		else{
			return Redirect::back()->withInput();
		}
    }

    public function destroy($id,$file_id)
    {

    	$file=File::find($file_id);
        $path=public_path().'/uploads/'.$file->new_name;
        unlink($path);
    	$file->delete();
    	return Redirect::to('blog/'.$id.'/admin/uploads');
    }
}
