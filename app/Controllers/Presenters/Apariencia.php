<?php

namespace App\Controllers\Presenters;

use App\Controllers\BaseController;

class Apariencia extends BaseController
{
	public function index()
	{
		if (session()->has('actualUserUpdate')) {
			return view('apariencia/index');
		}

		return redirect()->to(base_url('/usuarios'));
	}
}
