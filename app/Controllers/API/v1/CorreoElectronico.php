<?php

namespace App\Controllers\API\v1;

use CodeIgniter\RESTful\ResourceController;

class CorreoElectronico extends ResourceController
{
  protected $modelName = 'App\Models\CorreosElectronicosModel';
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
    $correoElectronico = $this->model->find($id);
    if (!$correoElectronico) {
      return $this->failNotFound();
    }
    return $this->respond([
      'status' => 200,
      'error' => null,
      'data' => $correoElectronico
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

      $correoElectronico = $this->request->getPost();

      if (!$validation->run($correoElectronico, 'correoElectronico')) {
        return $this->fail($validation->getErrors());
      }

      $this->model->insert($correoElectronico);
      $correoElectronico['id'] = $this->model->db->insertID();

      return $this->respondCreated([
        'status' => 200,
        'error' => null,
        'data' => $correoElectronico
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

      $correoElectronico = $this->request->getPost();
      $correoElectronico['id'] = $id;

      if (!$validation->run($correoElectronico, 'correoElectronico')) {
        return $this->fail($validation->getErrors());
      }

      $this->model->update($id, $correoElectronico);

      unset($correoElectronico['_method']);

      return $this->respondUpdated([
        'status' => 200,
        'error' => null,
        'data' => $correoElectronico
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
      $correoElectronico = $this->model->find($id);
      if (!$correoElectronico) {
        return $this->failNotFound();
      }
      
      if (!$this->model->delete($id)) {
        return $this->fail(['El recurso no pudo ser eliminado']);
      }

      return $this->respondDeleted([
        'status' => 200,
        'error' => null,
        'data' => $correoElectronico
      ]);
    } catch (\Throwable $th) {
      $this->failServerError();
    }
  }
}
