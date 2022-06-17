<?php

namespace App\Controllers\API\v1;

use CodeIgniter\RESTful\ResourceController;

class Acceso extends ResourceController
{
  protected $modelName = 'App\Models\UsuarioModel';
  protected $format    = 'json';

  public function login()
  {
    $validation =  \Config\Services::validation();
    $session = \Config\Services::session();

    $usuario = $this->request->getJSON(true);

    if (!$validation->run($usuario, 'acceso')) {
      return $this->fail($validation->getErrors());
    }

    $usuario_db = $this->model->where('email', $usuario['email'])->where('rol', 'administrador')->first();
    if ($usuario_db && password_verify($usuario['password'], $usuario_db['password_hash'])) {
      $datosUsuario = model('DatosUsuarioModel')->where('id_usuario', $usuario_db['id'])->first();
      $usuario_db['is_logged'] = true;
      $usuario_db['nombres'] = $datosUsuario['nombres'];
      $usuario_db['apellidos'] = $datosUsuario['apellidos'];

      $session->set('usuarioLogueado', (array) $usuario_db);

      return $this->respond([
        'status' => 200,
        'error' => null,
        'data' => null
      ]);
    }

    return $this->fail('Email o contraseña invalidas');
  }

  public function notAuthorized()
  {
    return $this->failUnauthorized();
  }
}
