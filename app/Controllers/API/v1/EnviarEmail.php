<?php

namespace App\Controllers\API\v1;

use App\Libraries\GeneradorCorreo;
use CodeIgniter\RESTful\ResourceController;

class EnviarEmail extends ResourceController
{
  protected $modelName = 'App\Models\UsuarioModel';
  protected $format    = 'json';

  public function enviarVCard()
  {
    $validation = \Config\Services::validation();

    $emailDestino = $this->request->getPost('emailDestino');
    $slugUsuario = $this->request->getPost('slugUsuario');

    $usuario = model('DatosUsuarioModel')->where('slug', $slugUsuario)->first();
    if (!$usuario) {
      return $this->fail("El usuario $slugUsuario no existe");
    }

    $validation->setRule('emailDestino', 'email', 'required|valid_email');
    if (!$validation->run($this->request->getPost())) {
      return $this->fail($validation->getErrors());
    }

    $generadorCorreo = new GeneradorCorreo();
    $datosUsuario = model('UsuarioModel')->getForTarjetaDigital($usuario['id_usuario']);

    if ($generadorCorreo->enviarVCard($datosUsuario, $emailDestino)) {
      return $this->respond([
        'status' => 200,
        'error' => null,
        'data' => 'Correo enviado satisfactoriamente'
      ]);
    }

    return $this->fail('Ocurrio un error al enviar el correo');
  }
}
