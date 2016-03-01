<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller {
	public function index(Request $request) {
		if ($request->input('tag') == '全部动态' || $request->input('tag') == null) {
			return view('news.index')->withNavSelection(3)->withTagSelection("全部动态")->withNews(News::paginate(10));
		} else {
			return view('news.index')->withNavSelection(3)->withTagSelection($request->input('tag'))->withNews(News::where('tag', $request->input('tag'))->paginate(10));
		}

	}

	public function show($id) {
		return view('news.show')->withNavSelection(3)->withTagSelection(-1)->withNews(News::find($id));
	}
}
