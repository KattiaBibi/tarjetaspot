<?php

namespace App\Controllers\API\v1;

use CodeIgniter\RESTful\ResourceController;

class Apariencia extends ResourceController
{
  protected $modelName = 'App\Models\AparienciaModel';
  protected $format    = 'json';

  /**
   * Return the properties of a resource object
   *
   * @return mixed
   */
  public function show($id_usuario = null)
  {
    $apariencia = $this->model->where('id_usuario', $id_usuario)->first();
    if (!$apariencia) {
      return $this->failNotFound();
    }
    return $this->respond([
      'status' => 200,
      'error' => null,
      'data' => $apariencia
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

      $apariencia = $this->request->getPost();
      $banner = $this->request->getFile('banner');

      $rules = $validation->getRuleGroup('apariencia');

      if ($banner->getError() === 4) {
        unset($rules['banner']);
      }

      if (!$validation->setRules($rules)->run($apariencia)) {
        return $this->fail($validation->getErrors());
      }

      if ($banner->isValid() && !$banner->hasMoved()) {
        $nombreArchivo = $banner->getRandomName();
        $apariencia['ruta_banner'] = 'images/banners/' . $nombreArchivo;
        $banner->move('images/banners/', $nombreArchivo);
      }

      $this->model->insert($apariencia);
      $apariencia['id'] = $this->model->db->insertID();

      return $this->respondUpdated([
        'status' => 200,
        'error' => null,
        'data' => $apariencia
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

      $aparienciaInsertado = $this->model->where('id_usuario', $id_usuario)->first();

      if (!$aparienciaInsertado) {
        return $this->failNotFound();
      }

      $apariencia = $this->request->getPost();
      $banner = $this->request->getFile('banner');

      $rules = $validation->getRuleGroup('apariencia');

      if ($banner->getError() === 4) {
        unset($rules['banner']);
      }

      if (!$validation->setRules($rules)->run($apariencia)) {
        return $this->fail($validation->getErrors());
      }

      if ($banner->isValid() && !$banner->hasMoved()) {
        $nombreArchivo = $banner->getRandomName();
        $apariencia['ruta_banner'] = 'images/banners/' . $nombreArchivo;
        $banner->move('images/banners/', $nombreArchivo);
        if (!empty($aparienciaInsertado['ruta_banner'])) {
          unlink($aparienciaInsertado['ruta_banner']);
        }
      }

      $this->model->set($apariencia)->where('id_usuario', $id_usuario)->update();

      unset($apariencia['_method']);
      $apariencia['id'] = $aparienciaInsertado['id'];

      return $this->respondUpdated([
        'status' => 200,
        'error' => null,
        'data' => $apariencia
      ]);
    } catch (\Throwable $th) {
      $this->failServerError();
    }
  }

  public function deleteBanner($id_usuario = null)
  {
    try {
      $apariencia = $this->model->where('id_usuario', $id_usuario)->first();
      if (!$apariencia) {
        return $this->failNotFound();
      }

      if (!empty($apariencia['ruta_banner'])) {
        unlink($apariencia['ruta_banner']);
        $this->model->set('ruta_banner', '')->where('id_usuario', $id_usuario)->update();

        return $this->respondDeleted([
          'status' => 200,
          'error' => null,
          'data' => $apariencia['ruta_banner']
        ]);
      } else {
        return $this->failNotFound();
      }
    } catch (\Throwable $th) {
      $this->failServerError();
    }
  }
}
