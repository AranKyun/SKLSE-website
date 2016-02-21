<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\News;

use App\Http\Requests;
use Redirect;

use Illuminate\Http\Request;

class NewsController extends Controller {
	public function index() {
		$news = News::all();
		return view('admin.news.index')->withNews($news);
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
		while (preg_match("/<img[^>]*src=\"data:image\/(jpeg|gif|png);base64,([^\"]*)\"[^>]*data-filename=\"([^\"]*)\"[^>]*>/u", $raw, $matches, PREG_OFFSET_CAPTURE)) {
			$leftlength = $matches[0][1];
			$taglength = strlen($matches[0][0]);

			//save img file
			$data = base64_decode($matches[2][0]);
			$filename = md5($data) .".". ($matches[1][0] == "jpeg" ? "jpg" : $matches[1][0]);

			if(!file_exists(public_path()."/assets/images/news/".$filename)) {
				$file = fopen(public_path() . "/assets/images/news/" . $filename, "w");
				fwrite($file, $data);
				fclose($file);
			}
			$code = $code . substr($raw, 0, $leftlength) . "<img src=\"_public_path/assets/images/news/" . $filename . "\" />";
			$raw = substr($raw, $leftlength + $taglength);

		}

		$code = $code . $raw;

		//save in database
		$news = new News;
		$news->title = $request->input('title');
		$news->content = $code;
		$news->tag = "Default";

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
		while (preg_match("/<img[^>]*src=\"data:image\/(jpeg|gif|png);base64,([^\"]*)\"[^>]*data-filename=\"([^\"]*)\"[^>]*>/u", $raw, $matches, PREG_OFFSET_CAPTURE)) {
			$leftlength = $matches[0][1];
			$taglength = strlen($matches[0][0]);

			//save img file
			$data = base64_decode($matches[2][0]);
			$filename = md5($data) .".". ($matches[1][0] == "jpeg" ? "jpg" : $matches[1][0]);

			if(!file_exists(public_path()."/assets/images/news/".$filename)) {
				$file = fopen(public_path() . "/assets/images/news/" . $filename, "w");
				fwrite($file, $data);
				fclose($file);
			}
			$code = $code . substr($raw, 0, $leftlength) . "<img src=\"_public_path/assets/images/news/" . $filename . "\" />";
			$raw = substr($raw, $leftlength + $taglength);

		}

		$code = $code . $raw;

		//save in database
		$news = News::find($id);
		$news->title = $request->input('title');
		$news->content = $code;
		$news->tag = "Default";

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
}
