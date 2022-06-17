<?php

namespace App\Controllers\Presenters;

use App\Controllers\BaseController;

class Contacto extends BaseController
{
	public function redesSociales()
	{
		if (session()->has('actualUserUpdate')) {
			return view('contacto/redes-sociales');
		}

		return redirect()->to(base_url('/usuarios'));
	}

	public function correos()
	{
		if (session()->has('actualUserUpdate')) {
			return view('contacto/correos');
		}

		return redirect()->to(base_url('/usuarios'));
	}

	public function telefonos()
	{
		if (session()->has('actualUserUpdate')) {
			return view('contacto/telefonos');
		}

		return redirect()->to(base_url('/usuarios'));
	}
}
