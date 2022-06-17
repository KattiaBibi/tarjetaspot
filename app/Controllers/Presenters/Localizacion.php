<?php

namespace App\Controllers\Presenters;

use App\Controllers\BaseController;

class Localizacion extends BaseController
{
	public function index()
	{
		if (session()->has('actualUserUpdate')) {
			return view('localizaciones/index');
		}

		return redirect()->to(base_url('/usuarios'));
	}

}
