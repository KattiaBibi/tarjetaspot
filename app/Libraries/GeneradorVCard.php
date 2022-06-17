<?php

namespace App\Libraries;

use JeroenDesloovere\VCard\VCard;

class GeneradorVCard
{
	public function generarVcard($datosUsuario, $modo = 'DESCARGAR')
	{
		helper('datos_tarjeta');
		$d = $datosUsuario;

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

		if ($modo == 'DESCARGAR') {
			return $vcard->download();
		} else if ($modo == 'QR') {
			$data = urlencode($vcard->getOutput());
			return "<img src='https://qrcode.tec-it.com/API/QRCode?data=$data&size=medium' width='300' />";
		} else if ($modo == 'GUARDAR') {
			$vcard->setFilename('tmpvcard');
			$vcard->setSavePath('tmp');
			$vcard->save();
		}
	}
}
