<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use ZipClass;
use Redirect;
use App\File;
use App\Blog;
use App\User;
use DB;

class DownloadController extends Controller
{
    //
    public function index($id)
    {
    	
    	$user=User::find($id);
    	$blog=$user->blog;
    	$files= $blog->files()->get();
    	//$files= DB::table('files')->where('blog_id','=',$id)->paginate(15);
    	$data = array('id' => $id,'files'=>$files,'user'=>$user,'blog'=>$blog );

    	return view('blog.download')->with('data',$data);
    }

    public function download($id,$filename)
    {
    	
    	header("Content-type:text/html;charset=utf-8"); 
		
		$file_path=public_path()."/uploads/".$filename; 
		
		if(!file_exists($file_path))
			{ 
				echo "没有该文件"; 
				return ; 
			} 
		$fp=fopen($file_path,"r"); 
		$file_size=filesize($file_path); 
		//下载文件需要用到的头 
		Header("Content-type: application/octet-stream"); 
		Header("Accept-Ranges: bytes"); 
		Header("Accept-Length:".$file_size); 
		Header("Content-Disposition: attachment; filename=".$filename); 
		$buffer=1024; 
		$file_count=0; 
		//向浏览器返回数据 
		while(!feof($fp) && $file_count<$file_size)
			{ 
				$file_con=fread($fp,$buffer); 
				$file_count+=$buffer; 
				echo $file_con; 
			} 
		fclose($fp);
    }

    public function downloadzip(Request $request)
    {
    	
    	$files=$request->only('file');
    	$id=$request->only('id');

    	if (count($files['file'])==1) {
    		$filename=basename($files['file'][0]);

    		return Redirect::to('blog/'.$id['id'].'/home/download/'.$filename);
    		# code...
    	}
    	for ($i=0; $i <count($files['file']) ; $i++) { 
    		# code...
    		$files['file'][$i]=public_path()."/uploads/".$files['file'][$i];
    		//echo $file;
    	}
    	$filename='download.zip'; //最终生成的文件名（含路径）

		if(file_exists($filename))
			{ 
  				unlink($filename); 
			}  
		
		//return $files['file'];
		//$data = array('C:/Demo/public/uploads/test.txt' ,'C:/Demo/public/uploads/test1.txt' );	
		ZipClass::Zip($files['file'],$filename);
		//foreach ($files['file'] as $file) {
			# code...
		//	echo $file;
		//}
		//return ;//$files['file'];
		
		//TestClass::Zip($data,$filename);

		$fp=fopen($filename,"r"); 
		$file_size=filesize($filename); 
		//下载文件需要用到的头 
		Header("Content-type: application/octet-stream"); 
		Header("Accept-Ranges: bytes"); 
		Header("Accept-Length:".$file_size); 
		Header("Content-Disposition: attachment; filename=".$filename); 
		$buffer=1024; 
		$file_count=0; 
		//向浏览器返回数据 
		while(!feof($fp) && $file_count<$file_size)
			{ 
				$file_con=fread($fp,$buffer); 
				$file_count+=$buffer; 
				echo $file_con; 
			} 
		fclose($fp);
    	
    }
}
