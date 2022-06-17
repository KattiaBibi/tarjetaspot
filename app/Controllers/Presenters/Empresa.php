<?php

namespace App\Controllers\Presenters;

use App\Controllers\BaseController;

class Empresa extends BaseController
{
	public function index()
	{
		return view('empresa/index');
	}

}
