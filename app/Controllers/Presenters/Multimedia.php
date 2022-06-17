<?php

namespace App\Controllers\Presenters;

use App\Controllers\BaseController;

class Multimedia extends BaseController
{
	public function videos()
	{
		if (session()->has('actualUserUpdate')) {
			return view('multimedia/videos');
		}

		return redirect()->to(base_url('/usuarios'));
	}

	public function imagenes()
	{
		if (session()->has('actualUserUpdate')) {
			return view('multimedia/imagenes');
		}

		return redirect()->to(base_url('/usuarios'));
	}
}
