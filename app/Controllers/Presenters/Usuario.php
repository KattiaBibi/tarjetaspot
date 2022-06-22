<?php

namespace App\Controllers\Presenters;

use App\Controllers\BaseController;
use App\Libraries\GeneradorVCard;

class Usuario extends BaseController
{

	public function index()
	{
		return view('usuarios/index');
	}

	public function verTarjeta($id = null)
	{
		helper('datos_tarjeta');
		$datosUsuario = model('UsuarioModel')->getForTarjetaDigital($id);
		
		// dd($datosUsuario);

		$generadorVCard = new GeneradorVCard();
    $qrVcardImg = $generadorVCard->generarVcard($datosUsuario, 'QR');

		return view('tarjeta_digital/default', ['d' => $datosUsuario, 'qrVcardImg' => $qrVcardImg]);
	}

	public function datosPersonales()
	{
		if (session()->has('actualUserUpdate')) {
			return view('usuarios/datos-personales');
		}

		return redirect()->to(base_url('/usuarios'));
	}

	public function datosEmpresa()
	{
		if (session()->has('actualUserUpdate')) {
			return view('usuarios/datos-empresa');
		}

		return redirect()->to(base_url('/usuarios'));
	}

	public function registrate()
	{
		return view('usuarios/registrate');
	}

	public function ingresar()
	{
		return view('usuarios/ingresar');
	}

	public function salir()
	{
		$session = \Config\Services::session();
		$session->destroy();
		return redirect()->to(base_url('/ingresar'));
	}

	public function setActualUserUpdate($id = null)
	{
		$usuario = model('UsuarioModel')->show($id);
		session()->set('actualUserUpdate', (array) $usuario);
		return redirect()->to(base_url('/usuarios'));
	}

	public function deleteActualUserUpdate()
	{
		session()->remove('actualUserUpdate');
		return redirect()->to(base_url('/usuarios'));
	}

	public function test()
	{
		dd(session()->get());
		// echo "<pre>";
		// var_dump(model('UsuarioModel')->getAllUserData(2));
		// echo "</pre>";
	}
}
