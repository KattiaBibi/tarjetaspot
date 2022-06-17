<?php

namespace App\Controllers\API\v1;

use CodeIgniter\RESTful\ResourceController;

class Localizacion extends ResourceController
{
  protected $modelName = 'App\Models\LocalizacionesModel';
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
    $localizacion = $this->model->find($id);
    if (!$localizacion) {
      return $this->failNotFound();
    }
    return $this->respond([
      'status' => 200,
      'error' => null,
      'data' => $localizacion
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

      $localizacion = $this->request->getPost();

      if (!$validation->run($localizacion, 'localizacion')) {
        return $this->fail($validation->getErrors());
      }

      $this->model->insert($localizacion);
      $localizacion['id'] = $this->model->db->insertID();

      return $this->respondCreated([
        'status' => 200,
        'error' => null,
        'data' => $localizacion
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

      $localizacion = $this->request->getPost();
      $localizacion['id'] = $id;

      if (!$validation->run($localizacion, 'localizacion')) {
        return $this->fail($validation->getErrors());
      }

      $this->model->update($id, $localizacion);

      unset($localizacion['_method']);

      return $this->respondUpdated([
        'status' => 200,
        'error' => null,
        'data' => $localizacion
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
      $localizacion = $this->model->find($id);
      if (!$localizacion) {
        return $this->failNotFound();
      }
      
      if (!$this->model->delete($id)) {
        return $this->fail(['El recurso no pudo ser eliminado']);
      }

      return $this->respondDeleted([
        'status' => 200,
        'error' => null,
        'data' => $localizacion
      ]);
    } catch (\Throwable $th) {
      $this->failServerError();
    }
  }
}
