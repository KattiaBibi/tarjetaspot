<?php

namespace App\Controllers\API\v1;

use CodeIgniter\RESTful\ResourceController;

class Video extends ResourceController
{
  protected $modelName = 'App\Models\VideosModel';
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
    $video = $this->model->find($id);
    if (!$video) {
      return $this->failNotFound();
    }
    return $this->respond([
      'status' => 200,
      'error' => null,
      'data' => $video
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

      $video = $this->request->getPost();
      $archivo = $this->request->getFile('video');

      if (!$validation->run($video, 'video')) {
        return $this->fail($validation->getErrors());
      }

      if ($archivo->isValid() && !$archivo->hasMoved()) {
        $nombreArchivo = $archivo->getRandomName();
        $video['url'] = 'videos/' . $nombreArchivo;
        $archivo->move('videos/', $nombreArchivo);
      }

      $this->model->insert($video);
      $video['id'] = $this->model->db->insertID();

      return $this->respondCreated([
        'status' => 200,
        'error' => null,
        'data' => $video
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

      $videoInsertardo = $this->model->find($id);

      if (!$videoInsertardo) {
        return $this->failNotFound();
      }

      $video = $this->request->getPost();
      $archivo = $this->request->getFile('video');
      $video['id'] = $id;

      $rules = $validation->getRuleGroup('video');

      if ($archivo->getError() === 4) {
        unset($rules['video']);
      }

      if (!$validation->setRules($rules)->run($video)) {
        return $this->fail($validation->getErrors());
      }

      if ($archivo->isValid() && !$archivo->hasMoved()) {
        $nombreArchivo = $archivo->getRandomName();
        $video['url'] = 'videos/' . $nombreArchivo;
        $archivo->move('videos/', $nombreArchivo);
        unlink($videoInsertardo['url']);
      }

      $this->model->update($id, $video);

      unset($video['_method']);

      return $this->respondUpdated([
        'status' => 200,
        'error' => null,
        'data' => $video
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
      $video = $this->model->find($id);
      if (!$video) {
        return $this->failNotFound();
      }

      if (!$this->model->delete($id)) {
        return $this->fail(['El recurso no pudo ser eliminado']);
      }

      unlink($video['url']);

      return $this->respondDeleted([
        'status' => 200,
        'error' => null,
        'data' => $video
      ]);
    } catch (\Throwable $th) {
      $this->failServerError();
    }
  }
}
