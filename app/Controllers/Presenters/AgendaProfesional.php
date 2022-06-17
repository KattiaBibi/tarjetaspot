<?php

namespace App\Controllers\Presenters;

use App\Controllers\BaseController;

class AgendaProfesional extends BaseController
{
	public function index($slugEmpresa = null)
	{
		helper('datos_tarjeta_helper');
		$agendaProfesional = model('UsuarioModel')->getForAgendaProfesional($slugEmpresa);

		if (!$agendaProfesional['empresa']) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException("No se encontro la agenda profesional para la empresa ($slugEmpresa)");
		}

		return view('agenda-profesional/index', ['agenda_profesional' => $agendaProfesional]);
	}
}
