<?php

namespace App\Controllers\API\v1;

use CodeIgniter\RESTful\ResourceController;

class DatosEmpresa extends ResourceController
{
  protected $modelName = 'App\Models\DatosEmpresaModel';
  protected $format    = 'json';

  /**
   * Return the properties of a resource object
   *
   * @return mixed
   */
  public function show($id_usuario = null)
  {
    $datosEmpresa = $this->model->where('id_usuario', $id_usuario)->first();
    if (!$datosEmpresa) {
      return $this->failNotFound();
    }
    return $this->respond([
      'status' => 200,
      'error' => null,
      'data' => $datosEmpresa
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

      $datosEmpresa = $this->request->getPost();
      $imagen = $this->request->getFile('imagen');

      if (!$validation->run($datosEmpresa, 'datosEmpresa')) {
        return $this->fail($validation->getErrors());
      }

      if ($imagen->isValid() && !$imagen->hasMoved()) {
        $nombreArchivo = $imagen->getRandomName();
        $datosEmpresa['url_imagen'] = 'images/empresa/' . $nombreArchivo;
        $imagen->move('images/empresa/', $nombreArchivo);
      }

      $this->model->insert($datosEmpresa);
      $datosEmpresa['id'] = $this->model->db->insertID();

      return $this->respondUpdated([
        'status' => 200,
        'error' => null,
        'data' => $datosEmpresa
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
  public function update($id_usuario = null)
  {
    try {
      $validation = \Config\Services::validation();

      $datosEmpresaInsertado = $this->model->where('id_usuario', $id_usuario)->first();

      if (!$datosEmpresaInsertado) {
        return $this->failNotFound();
      }

      $datosEmpresa = $this->request->getPost();
      $imagen = $this->request->getFile('imagen');

      $rules = $validation->getRuleGroup('datosEmpresa');

      if ($imagen->getError() === 4) {
        unset($rules['imagen']);
      }

      if (!$validation->setRules($rules)->run($datosEmpresa)) {
        return $this->fail($validation->getErrors());
      }

      if ($imagen->isValid() && !$imagen->hasMoved()) {
        $nombreArchivo = $imagen->getRandomName();
        $datosEmpresa['url_imagen'] = 'images/empresa/' . $nombreArchivo;
        $imagen->move('images/empresa/', $nombreArchivo);
        unlink($datosEmpresaInsertado['url_imagen']);
      }

      $this->model->set($datosEmpresa)->where('id_usuario', $id_usuario)->update();

			unset($datosEmpresa['_method']);
			$datosEmpresa['id'] = $datosEmpresaInsertado['id'];

			return $this->respondUpdated([
				'status' => 200,
				'error' => null,
				'data' => $datosEmpresa
			]);

    } catch (\Throwable $th) {
      $this->failServerError();
    }
  }
}
