<?php

namespace App\Controllers\API\v1;

use CodeIgniter\RESTful\ResourceController;

class Documento extends ResourceController
{
  protected $modelName = 'App\Models\DocumentosModel';
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
    $documento = $this->model->find($id);
    if (!$documento) {
      return $this->failNotFound();
    }
    return $this->respond([
      'status' => 200,
      'error' => null,
      'data' => $documento
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
      $documento = $this->request->getPost();
      $archivo = $this->request->getFile('archivo');

      if (!$this->validate('documento')) {
        return $this->fail($this->validator->getErrors());
      }

      if (!$archivo->isValid() && !$archivo->hasMoved()) {
        return $this->fail($archivo->getErrorString());
      } else {
        $nombreArchivo = $archivo->getRandomName();
        $documento['url'] = "documentos/pdf/" . $nombreArchivo;
        $archivo->move('documentos/pdf/', $nombreArchivo);
      }

      $this->model->insert($documento);
      $documento['id'] = $this->model->db->insertID();

      return $this->respondCreated([
        'status' => 200,
        'error' => null,
        'data' => $documento
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

      $documento_db = $this->model->find($id);
      if (!$documento_db) {
        return $this->failNotFound();
      }

      $documento = $this->request->getPost();
      $archivo = $this->request->getFile('archivo');
      $documento['id'] = $id;

      $rules = $validation->getRuleGroup('documento');
      unset($rules['id_usuario']);

      if ($archivo->getError() === 4) {
        unset($rules['archivo']);
      }

      if (!$validation->setRules($rules)->run($documento)) {
        return $this->fail($validation->getErrors());
      }

      // return $this->respond(['post' => $_POST, 'files' => $_FILES]);

      if ($archivo->getError() !== 4) {
        if (!$archivo->isValid() && !$archivo->hasMoved()) {
          return $this->fail($archivo->getErrorString());
        } else {
          $nombreArchivo = $archivo->getRandomName();
          $documento['url'] = "documentos/pdf/" . $nombreArchivo;
          $archivo->move('documentos/pdf/', $nombreArchivo);
          unlink($documento_db['url']);
        }
      }

      $this->model->update($id, $documento);

      return $this->respondUpdated([
        'status' => 200,
        'error' => null,
        'data' => $documento
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
      $documento = $this->model->find($id);
      if (!$documento) {
        return $this->failNotFound();
      }
      
      if (!$this->model->delete($id)) {
        return $this->fail("Resource could not be removed");
      }

      unlink($documento['url']);

      return $this->respondDeleted([
        'status' => 200,
        'error' => null,
        'data' => $documento
      ]);
    } catch (\Throwable $th) {
      $this->failServerError();
    }
  }
}
