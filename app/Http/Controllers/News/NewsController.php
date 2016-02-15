<?php

namespace App\Http\Controllers\News;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function create() {
    	return view('admin.news.create');
    }
}
