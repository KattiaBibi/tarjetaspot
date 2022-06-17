<?php

namespace App\Controllers\API\v1;

use CodeIgniter\RESTful\ResourceController;

class Imagen extends ResourceController
{
  protected $modelName = 'App\Models\ImagenesModel';
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
    $imagen = $this->model->find($id);
    if (!$imagen) {
      return $this->failNotFound();
    }
    return $this->respond([
      'status' => 200,
      'error' => null,
      'data' => $imagen
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

      $imagen = $this->request->getPost();
      $archivo = $this->request->getFile('imagen');

      if (!$validation->run($imagen, 'imagen')) {
        return $this->fail($validation->getErrors());
      }

      if ($archivo->isValid() && !$archivo->hasMoved()) {
        $nombreArchivo = $archivo->getRandomName();
        $imagen['url'] = 'images/publicos/' . $nombreArchivo;
        $archivo->move('images/publicos/', $nombreArchivo);
      }

      $this->model->insert($imagen);
      $imagen['id'] = $this->model->db->insertID();

      return $this->respondUpdated([
        'status' => 200,
        'error' => null,
        'data' => $imagen
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

      $imagenInsertado = $this->model->find($id);

      if (!$imagenInsertado) {
        return $this->failNotFound();
      }

      $imagen = $this->request->getPost();
      $archivo = $this->request->getFile('imagen');
      $imagen['id'] = $id;

      $rules = $validation->getRuleGroup('imagen');

      if ($archivo->getError() === 4) {
        unset($rules['imagen']);
      }

      if (!$validation->setRules($rules)->run($imagen)) {
        return $this->fail($validation->getErrors());
      }

      if ($archivo->isValid() && !$archivo->hasMoved()) {
        $nombreArchivo = $archivo->getRandomName();
        $imagen['url'] = 'images/publicos/' . $nombreArchivo;
        $archivo->move('images/publicos/', $nombreArchivo);
        unlink($imagenInsertado['url']);
      }

      $this->model->update($id, $imagen);

      unset($imagen['_method']);

      return $this->respondUpdated([
        'status' => 200,
        'error' => null,
        'data' => $imagen
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
      $imagen = $this->model->find($id);
      if (!$imagen) {
        return $this->failNotFound();
      }

      if (!$this->model->delete($id)) {
        return $this->fail(['El recurso no pudo ser eliminado']);
      }

      unlink($imagen['url']);

      return $this->respondDeleted([
        'status' => 200,
        'error' => null,
        'data' => $imagen
      ]);
    } catch (\Throwable $th) {
      $this->failServerError();
    }
  }
}
