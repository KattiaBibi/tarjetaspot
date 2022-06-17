<?php

namespace App\Controllers\API\v1;

use CodeIgniter\RESTful\ResourceController;

class Empresa extends ResourceController
{
  protected $modelName = 'App\Models\EmpresaModel';
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
    $empresa = $this->model->find($id);
    if (!$empresa) {
      return $this->failNotFound();
    }
    return $this->respond([
      'status' => 200,
      'error' => null,
      'data' => $empresa
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

      $empresa = $this->request->getPost();
      $logo = $this->request->getFile('logo');

      if (!$validation->run($empresa, 'empresa')) {
        return $this->fail($validation->getErrors());
      }

      if ($logo->isValid() && !$logo->hasMoved()) {
        $nombreLogo = $logo->getRandomName();
        $empresa['logo'] = 'images/empresa/' . $nombreLogo;
        $logo->move('images/empresa/', $nombreLogo);
      }

      $this->model->insert($empresa);
      $empresa['id'] = $this->model->db->insertID();

      return $this->respondCreated([
        'status' => 200,
        'error' => null,
        'data' => $empresa
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
      $empresa_registrada = $this->model->find($id);
      if (!$empresa_registrada) {
        return $this->failNotFound();
      }

      $empresa = $this->request->getPost();
      $logo = $this->request->getFile('logo');

      $empresa['id'] = $id;

      $rules = $validation->getRuleGroup('empresa');

      if ($logo->getError() === 4) {
        unset($rules['logo']);
      }

      if (!$validation->setRules($rules)->run($empresa)) {
        return $this->fail($validation->getErrors());
      }

      if ($logo->isValid() && !$logo->hasMoved()) {
        $nombreLogo = $logo->getRandomName();
        $empresa['logo'] = 'images/empresa/' . $nombreLogo;
        $logo->move('images/empresa/', $nombreLogo);
        unlink($empresa_registrada['logo']);
      }

      $this->model->update($id, $empresa);

      unset($empresa['_method']);

      return $this->respondUpdated([
        'status' => 200,
        'error' => null,
        'data' => $empresa
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
      $empresa = $this->model->find($id);
      if (!$empresa) {
        return $this->failNotFound();
      }

      if (!$this->model->delete($id)) {
        return $this->fail("El recurso no pudo ser eliminado");
      }

      unlink($empresa['logo']);

      return $this->respondDeleted([
        'status' => 200,
        'error' => null,
        'data' => $empresa
      ]);
    } catch (\Throwable $th) {
      $this->failServerError();
    }
  }

  public function searchByNombre()
  {
    $search = $this->request->getGet('search');
    $page = $this->request->getGet('page');

    $data = $this->model->searchByNombre($search, $page);
    return $this->respond($data);
  }
}
