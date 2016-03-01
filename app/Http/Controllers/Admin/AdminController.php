<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Redirect;

class AdminController extends Controller
{
	public function index() {
		return Redirect::to('admin/homepage');
	}

    public function homepage() {
    	return view('admin.homepage')->withSelected(0);
    }

}
