<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class HomepageController extends Controller {

	public function index() {
		$filepath = public_path('../HomepageConfig.json');
		$config = null;
		if (file_exists($filepath)) {
			$file = fopen($filepath, "r");
			$config = json_decode(fread($file, filesize($filepath)));
			fclose($file);
		} else {
			$config = array('spotlights' => null, 'news' => null, 'blogs' => null);
			$config = json_decode(json_encode($config));
		}

		return view('homepage')->withConfig($config)->withNavSelection(0);
	}

}
