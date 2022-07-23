<?php

namespace App\Controllers\API\v1;

use CodeIgniter\RESTful\ResourceController;

class DatosUsuario extends ResourceController
{
	protected $modelName = 'App\Models\DatosUsuarioModel';
	protected $format    = 'json';

	/**
	 * Return the properties of a resource object
	 *
	 * @return mixed
	 */
	public function show($id_usuario = null)
	{
		$datosUsuario = $this->model->where('id_usuario', $id_usuario)->first();
		if (!$datosUsuario) {
			return $this->failNotFound();
		}
		return $this->respond([
			'status' => 200,
			'error' => null,
			'data' => $datosUsuario
		]);
	}

	/**
	 * Add or update a model resource, from "posted" properties
	 *
	 * @return mixed
	 */
	public function update($id_usuario = null)
	{
		try {
			$validation = \Config\Services::validation();

			$datosUsuarioInsertado = $this->model->where('id_usuario', $id_usuario)->first();

			if (!$datosUsuarioInsertado) {
				return $this->failNotFound();
			}

			$datosUsuario = $this->request->getPost();
			$foto_perfil = $this->request->getFile('foto_perfil');

			$datosUsuario['id_usuario'] = $id_usuario;

			$rules = $validation->getRuleGroup('datosUsuario');

			if (!empty($datosUsuarioInsertado['url_foto_de_perfil']) && $foto_perfil->getError() === 4) {
				unset($rules['foto_perfil']);
			}
			
			if (!$validation->setRules($rules)->run($datosUsuario)) {
				return $this->fail($validation->getErrors());
			}

			if ($foto_perfil->isValid() && !$foto_perfil->hasMoved()) {
				$nombreArchivo = $foto_perfil->getRandomName();
				$datosUsuario['url_foto_de_perfil'] = 'images/fotos_perfil/' . $nombreArchivo;
				$foto_perfil->move('images/fotos_perfil/', $nombreArchivo);
				if (!empty($datosUsuarioInsertado['url_foto_de_perfil'])) {
					unlink($datosUsuarioInsertado['url_foto_de_perfil']);
				}
			}

			$this->model->set($datosUsuario)->where('id_usuario', $id_usuario)->update();

			unset($datosUsuario['_method']);
			$datosUsuario['id'] = $datosUsuarioInsertado['id'];

			return $this->respondUpdated([
				'status' => 200,
				'error' => null,
				'data' => $datosUsuario
			]);
		} catch (\Throwable $th) {
			$this->failServerError();
		}
	}
}
