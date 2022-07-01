<?php

namespace App\Controllers\Presenters;

use App\Controllers\BaseController;
use App\Libraries\GeneradorVCard;

class AgendaProfesional extends BaseController
{
	public function index($slug = null)
	{
		helper('datos_tarjeta_helper');
		$agendaProfesional = model('UsuarioModel')->getForAgendaProfesional($slug);

    $usuario = model('DatosUsuarioModel')->where('slug', $slug)->first();

		if ($agendaProfesional['empresa']) {
			return view('agenda-profesional/index', ['agenda_profesional' => $agendaProfesional]);
		} 

		if ($usuario) {
			$datosUsuario = model('UsuarioModel')->getForTarjetaDigital($usuario['id_usuario']);

			$generadorVCard = new GeneradorVCard();
			$qrVcardImg = $generadorVCard->generarVcard($datosUsuario, 'QR');
	
			return view('tarjeta_digital/default', ['d' => $datosUsuario, 'qrVcardImg' => $qrVcardImg]);
		}

		throw new \CodeIgniter\Exceptions\PageNotFoundException("No se encontro la agenda profesional para la empresa ó usuario ($slug)");

	}
}
