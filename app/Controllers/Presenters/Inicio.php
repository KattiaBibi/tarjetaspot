<?php

namespace App\Controllers\Presenters;

use App\Controllers\BaseController;

class Inicio extends BaseController
{
	public function index()
	{
		return view('inicio/index');
	}

}
