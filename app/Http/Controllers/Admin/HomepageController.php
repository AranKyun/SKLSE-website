<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Http\Request;
use Redirect;

class HomepageController extends Controller {

	public function index() {
		$filepath = public_path('../HomepageConfig.json');

		$config = null;

		if (file_exists($filepath)) {
			$file = fopen($filepath, "r");
			$config = json_decode(fread($file, filesize($filepath)));
			fclose($file);
		} else {
			$file = fopen($filepath, "w+");
			$config = array('news' => null, 'spotlights' => null, 'blogs' => null);
			fwrite($file, json_encode($config));
			fclose($file);
		}

		return view('admin.homepage')->withConfig($config)->withSelected(0);
	}

	public function news(Request $request) {

		$filepath = public_path('../HomepageConfig.json');

		$file = fopen($filepath, "r");
		$config = json_decode(fread($file, filesize($filepath)));
		fclose($file);

		$newconfig = clone $config;
		$newconfig->news = null;

		for ($i = 0; $i < count($request->input('newsid')); $i++) {
			$newsid = $request->input('newsid')[$i];

			$obj = array('text' => $request->input('text')[$i], 'imgFilename' => null, 'newsid' => $newsid, 'isCarousel' => ($request->input('isCarousel')[$i] == 'true') ? true : false);
			if ($request->file('img')[$i] == null) {
				$obj['imgFilename'] = $config->news->$newsid->imgFilename;
			} else {
				$file = $request->file('img')[$i];

				$filename = $file->getFileName();
				$extension = $file->getClientOriginalExtension();
				$clientName = $file->getClientOriginalName();

				$newName = md5(date('ymdhis') . $clientName) . '.' . $extension;

				$file->move(public_path() . "/assets/images/website", $newName);
				$obj['imgFilename'] = $newName;
			}
			$newconfig->news[$newsid] = $obj;

		}

		$file = fopen($filepath, "w");
		fwrite($file, json_encode($newconfig));
		fclose($file);

		return Redirect::to('admin/homepage');
	}

	public function spotlight(Request $request) {
		$month = array('', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
		$day = array('', '1st', '2nd', '3rd', '4th', '5th', '6th', '7th', '8th', '9th', '10th', '11th', '12th', '13th', '14th', '15th', '16th', '17th', '18th', '19th', '20th', '21st', '22nd', '23rd', '24th', '25th', '26th', '27th', '28th', '29th', '30th', '31st');

		$filepath = public_path('../HomepageConfig.json');

		$file = fopen($filepath, "r");
		$config = json_decode(fread($file, filesize($filepath)));
		fclose($file);

		$newconfig = clone $config;
		$newconfig->spotlights = array();
		for ($i = 0; $i < count($request->input('newsid')); $i++) {
			$news = News::find($request->input('newsid')[$i]);
			if ($news != null) {
				$time = $news->created_at;
				$newconfig->spotlights[$i] = array('newsid' => $request->input('newsid')[$i], 'month' => $month[$time->month], 'day' => $day[$time->day], 'title' => $news->title);
			}

		}

		$file = fopen($filepath, "w");
		fwrite($file, json_encode($newconfig));
		fclose($file);

		return Redirect::to('admin/homepage');

	}

	public function blog(Request $request) {

		return Redirect::to('admin/homepage');
	}
}