<?php

namespace App\Controllers\Presenters;

use App\Controllers\BaseController;
use App\Libraries\GeneradorVCard;

class TarjetaDigital extends BaseController
{
  public function index($slugEmpresa = null, $slugUsuario = null)
  {
    helper('datos_tarjeta');
    
    $empresa = model('EmpresaModel')->where('slug', $slugEmpresa)->first();
    $usuario = model('DatosUsuarioModel')->where('slug', $slugUsuario)->first();

    if (!$empresa || !$usuario) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException("No se encontro la tarjeta para la empresa ($slugEmpresa) o el usuario ($slugUsuario)");
    }

    $datosUsuario = model('UsuarioModel')->getForTarjetaDigital($usuario['id_usuario']);

    $generadorVCard = new GeneradorVCard();
    $qrVcardImg = $generadorVCard->generarVcard($datosUsuario, 'QR');

    return view('tarjeta_digital/default', ['d' => $datosUsuario, 'qrVcardImg' => $qrVcardImg]);
  }

  public function descargarVCard($slugUsuario = null)
  {
    $usuario = model('DatosUsuarioModel')->where('slug', $slugUsuario)->first();
    if (!$usuario) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException("No se encontro la tarjeta para el usuario ($slugUsuario)");
    }

    $generadorVCard = new GeneradorVCard();
    $datosUsuario = model('UsuarioModel')->getForTarjetaDigital($usuario['id_usuario']);
    $generadorVCard->generarVcard($datosUsuario, 'DESCARGAR');
  }
}
