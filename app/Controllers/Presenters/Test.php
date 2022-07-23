<?php

namespace App\Controllers\Presenters;

use App\Controllers\BaseController;
use App\Libraries\GeneradorCorreo;
use JeroenDesloovere\VCard\VCard;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Test extends BaseController
{
	public function index()
	{
		return view('test/index');

		helper('datos_tarjeta');
		$d = model('UsuarioModel')->getForTarjetaDigital(12);
		// dd($d);

		// define vcard
		$vcard = new VCard();

		// define variables
		$lastname = $d['datosUsuario']['apellidos'];
		$firstname = $d['datosUsuario']['nombres'];
		$additional = '';
		$prefix = '';
		$suffix = '';

		// add personal data
		$vcard->addName($lastname, $firstname, $additional, $prefix, $suffix);

		// add work data
		$vcard->addCompany($d['empresa']['nombre']);
		$vcard->addJobtitle($d['datosUsuario']['puesto']);
		$vcard->addRole($d['datosUsuario']['puesto']);

		$correo = getCorreoPrincipal($d);
		if (!empty($correo['url'])) {
			$vcard->addEmail($correo['url'], 'WORK');
		}

		$telefono = getTelefonoPrincipal($d);
		if (!empty($telefono['numero'])) {
			$prefijo = getPrefijo($telefono, 'telefono');
			$numTel = $prefijo . $telefono['numero'];
			$vcard->addPhoneNumber(formatearTelefono($numTel), 'WORK');
		}

		$localizacion = getLocalizacionPrincipal($d);
		if (!empty($localizacion['direccion'])) {
			$vcard->addAddress(null, null, $localizacion['direccion'], null, null, null, null);
		}

		$vcard->addURL(getLinkTarjeta($d));

		// return $vcard->getOutput();

		// return vcard as a string
		// $data = urlencode($vcard->getOutput());
		// $qr = "<img src='https://qrcode.tec-it.com/API/QRCode?data=$data&size=medium' width='250' />";
		// echo $qr;

		// return vcard as a download
		// return $vcard->download();

		// save vcard on disk
		$vcard->setFilename('tmpvcard');
		$vcard->setSavePath('tmp');
		$vcard->save();
	}

	public function testEmail()
	{
		helper('datos_tarjeta');
		$d = model('UsuarioModel')->getForTarjetaDigital(12);

		$generadorCorreo = new GeneradorCorreo();
		$generadorCorreo->enviarVCard($d, "elbooz30@hotmail.com");
	}

	public function testResizeImage()
	{
		// $x_file = new \CodeIgniter\Files\File('images/fotos_perfil/1656704544_2b75aec1191222ebfe28.jpg');

		// // dd($x_file);

		// $image = \Config\Services::image()
		// 	->withFile($x_file)
		// 	->resize(200, 200, true, 'height')
		// 	->save(FCPATH . '/images/' . $x_file->getRandomName());
		
		// dd($image);

		// $x_file->move(WRITEPATH . 'uploads');

		helper('datos_tarjeta');

		$datosUsuario = model('UsuarioModel')->getForTarjetaDigital(10);

		// dd($datosUsuario);

		return view('tarjeta_digital/Bittanto_Package/dark/index', ['d' => $datosUsuario]);
	}
}
