<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Redirect;
use Validator;

class UserController extends Controller {
	public function index() {
		return view('admin.user.index')->withUsers(User::paginate(30));
	}

	public function reset() {
		$new_username = substr(md5(mt_rand(0, 100000)), 0, 8) . '@admin.com';
		$new_password = substr(md5(time() . mt_rand(0, 1000)), 0, 16);
		$data = array('name' => 'admin', 'email' => $new_username, 'password' => $new_password);
		if (Validator::make($data, [
			'name' => 'required|max:255',
			'email' => 'required|max:255|unique:users',
			'password' => 'required|min:6',
		])->passes()) {
			if ($admin = User::create([
				'name' => $data['name'],
				'email' => $data['email'],
				'password' => bcrypt($data['password']),
			])) {
				User::where('tag', 'admin')->delete();

				$admin->tag = 'admin';
				$admin->save();

				$file = fopen(public_path('../admin.txt'), 'w');
				fwrite($file, 'name: ' . $new_username . "\npassword: " . $new_password);
				fclose($file);

			}
		}

		return Redirect::to('/');
	}
}
