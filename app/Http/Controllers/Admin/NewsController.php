<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\News;

use App\Http\Requests;
use Redirect;

use Illuminate\Http\Request;

class NewsController extends Controller {
	public function index(Request $request) {
		$tag = $request->input('tag');
		if($tag == null || $tag == "全部分类")
			return view('admin.news.index')->withNews(News::paginate(10))->withTag($tag);
		else
			return view('admin.news.index')->withNews(News::where('tag', $tag)->paginate(10))->withTag($tag);
	}

	public function create() {
		return view('admin.news.create');
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
		while (preg_match("/<img([^>]*)src=\"data:image\/(jpeg|gif|png);base64,([^\"]*)\"([^>]*)>/u", $raw, $matches, PREG_OFFSET_CAPTURE)) {
			$leftlength = $matches[0][1];
			$taglength = strlen($matches[0][0]);

			//save img file
			$data = base64_decode($matches[3][0]);
			$filename = md5($data) .".". ($matches[2][0] == "jpeg" ? "jpg" : $matches[2][0]);

			if(!file_exists(public_path()."/assets/images/news/".$filename)) {
				$file = fopen(public_path() . "/assets/images/news/" . $filename, "w");
				fwrite($file, $data);
				fclose($file);
			}
			$code = $code . substr($raw, 0, $leftlength) . "<img".$matches[1][0]."src=\"_public_path/assets/images/news/" . $filename . "\"".$matches[4][0]."/>";
			$raw = substr($raw, $leftlength + $taglength);

		}

		$code = $code . $raw;

		//save in database
		$news = new News;
		$news->title = $request->input('title');
		$news->content = $code;
		$news->tag = $request->input('tag');

		if ($news->save()) {
			return Redirect::to('admin/news');
		} else {
			return Redirect::back()->withInput();
		}

	}

	public function edit($id) {
		$news = News::find($id);
		return view('admin.news.edit')->withNews($news);
	}

	public function update(Request $request, $id) {
		$this->validate($request, [
			'title' => 'required|max:255',
			'content' => 'required',
		]);

		//process the html code
		$raw = $request->input('content');
		$code = "";

		//process img tag and save imgs
		while (preg_match("/<img([^>]*)src=\"data:image\/(jpeg|gif|png);base64,([^\"]*)\"([^>]*)>/u", $raw, $matches, PREG_OFFSET_CAPTURE)) {
			$leftlength = $matches[0][1];
			$taglength = strlen($matches[0][0]);

			//save img file
			$data = base64_decode($matches[3][0]);
			$filename = md5($data) .".". ($matches[2][0] == "jpeg" ? "jpg" : $matches[1][0]);

			if(!file_exists(public_path()."/assets/images/news/".$filename)) {
				$file = fopen(public_path() . "/assets/images/news/" . $filename, "w");
				fwrite($file, $data);
				fclose($file);
			}
			$code = $code . substr($raw, 0, $leftlength) . "<img".$matches[1][0]."src=\"_public_path/assets/images/news/" . $filename . "\"".$matches[4][0]."/>";
			$raw = substr($raw, $leftlength + $taglength);

		}

		$code = $code . $raw;

		//save in database
		$news = News::find($id);
		$news->title = $request->input('title');
		$news->content = $code;
		$news->tag = $request->input('tag');

		if ($news->save()) {
			return Redirect::to('admin/news');
		} else {
			return Redirect::back()->withInput();
		}

	}

	public function destroy($id) {
		$news = News::find($id);
		$news->delete();

		return Redirect::to('admin/news');
	}

	public function show($id) {
		$news = News::find($id);

		return view("admin.news.show")->withNews($news);
	}

	public function delete($id) {
		$news = News::find($id);
		return view('admin.news.delete')->withNews($news);
	}
}
