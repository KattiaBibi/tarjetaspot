<?php

namespace App\Controllers\API\v1;

use CodeIgniter\RESTful\ResourceController;

class Usuario extends ResourceController
{
	protected $modelName = 'App\Models\UsuarioModel';
	protected $format    = 'json';

	/**
	 * Return an array of resource objects, themselves in array format
	 *
	 * @return mixed
	 */
	public function index()
	{
		$limit = $this->request->getGet('length');
		$offset = $this->request->getGet('start');
		$filters = $this->request->getGet('filters');

		$recordsTotal = $this->model->countAllResults();
		$recordsFiltered = $this->model->getTotalRowsFiltered($filters);

		$data = $this->model->index($limit, $offset, $filters);

		$jsonData = [
			"draw"            => intval($this->request->getGet('draw')),
			"recordsTotal"    => intval($recordsTotal),
			"recordsFiltered" => intval($recordsFiltered),
			"data"            => $data
		];

		return $this->respond($jsonData);
	}

	/**
	 * Return the properties of a resource object
	 *
	 * @return mixed
	 */
	public function show($id = null)
	{
		$usuario = $this->model->show($id);
		if (!$usuario) {
			return $this->failNotFound();
		}
		return $this->respond([
			'status' => 200,
			'error' => null,
			'data' => $usuario
		]);
	}

	/**
	 * Create a new resource object, from "posted" parameters
	 *
	 * @return mixed
	 */
	public function create()
	{
		try {
			$validation = \Config\Services::validation();
			helper('text');

			$usuario = $this->request->getPost();
			
			if (!$validation->run($usuario, 'registroUsuario')) {
				return $this->fail($validation->getErrors());
			}

			$usuario['password_hash'] = password_hash($usuario['password'], PASSWORD_DEFAULT);
			$usuario['slug'] = random_string();

			$this->model->insert($usuario);
			$usuario['id_usuario'] = $this->model->db->insertID();
			model('DatosUsuarioModel')->insert($usuario);

			$usuario['id'] = $usuario['id_usuario'];
			unset($usuario['password']);
			unset($usuario['confirm_password']);
			unset($usuario['password_hash']);
			unset($usuario['id_usuario']);

			return $this->respondUpdated([
				'status' => 200,
				'error' => null,
				'data' => $usuario
			]);
		} catch (\Throwable $th) {
			$this->failServerError();
		}
	}

	/**
	 * Add or update a model resource, from "posted" properties
	 *
	 * @return mixed
	 */
	public function update($id = null)
	{
		try {
			$validation = \Config\Services::validation();

			if (!$this->model->find($id)) {
				return $this->failNotFound();
			}

			$usuario = $this->request->getPost();
			$usuario['id'] = $id;

			$rules = $validation->getRuleGroup('registroUsuario');
			if (empty($usuario['password'])) {
				unset($rules['password']);
				unset($rules['confirm_password']);
			}

			if (!$validation->setRules($rules)->run($usuario)) {
				return $this->fail($validation->getErrors());
			}

			if (!empty($usuario['password'])) {
				$usuario['password_hash'] = password_hash($usuario['password'], PASSWORD_DEFAULT);
			}

			$this->model->update($id, $usuario);
			model('DatosUsuarioModel')->set($usuario)->where('id_usuario', $id)->update();

			unset($usuario['password']);
			unset($usuario['confirm_password']);
			unset($usuario['password_hash']);
			unset($usuario['_method']);

			return $this->respondUpdated([
				'status' => 200,
				'error' => null,
				'data' => $usuario
			]);
		} catch (\Throwable $th) {
			$this->failServerError();
		}
	}

	/**
	 * Delete the designated resource object from the model
	 *
	 * @return mixed
	 */
	public function delete($id = null)
	{
		try {
			$usuario = $this->model->show($id);
			if (!$usuario) {
				return $this->failNotFound();
			}

			if (!$this->model->delete($id)) {
				return $this->fail("El recurso no pudo ser eliminado");
			}

			$this->deleteUserFiles($id);

			return $this->respondDeleted([
				'status' => 200,
				'error' => null,
				'data' => $usuario
			]);
		} catch (\Throwable $th) {
			$this->failServerError();
		}
	}

	private function deleteUserFiles($id = null)
	{
		$datosUsuario = model('DatosUsuarioModel')->where('id_usuario', $id)->first();
		$datosEmpresa = model('DatosEmpresaModel')->where('id_usuario',$id)->first();
		$imagenes = model('ImagenesModel')->where('id_usuario', $id)->findAll();
		$videos = model('VideosModel')->where('id_usuario', $id)->findAll();

		if ($datosUsuario) {
			if ( file_exists($datosUsuario['url_foto_de_perfil']) ) {
				unlink($datosUsuario['url_foto_de_perfil']);
			}
		}

		if ($datosEmpresa) {
			if ( file_exists($datosEmpresa['url_imagen']) ) {
				unlink($datosEmpresa['url_imagen']);
			}
		}

		if ($imagenes) {
			foreach ($imagenes as $imagen) {
				if ( file_exists($imagen['url']) ) {
					unlink($imagen['url']);
				}
			}
		}

		if ($videos) {
			foreach ($videos as $video) {
				if ( file_exists($video['url']) ) {
					unlink($video['url']);
				}
			}
		}
	}
}
