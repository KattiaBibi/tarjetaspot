<?php

function getTelefonoPrincipal($d)
{
	$telefonoPrincipal = ['numero' => null, 'prefijo' => null, 'msg_wsp' => null];

	if (!empty($d['telefonos'])) {
		$key = array_search('1', array_column($d['telefonos'], 'es_principal'));
		if ($key !== false) {
			$telefonoPrincipal = $d['telefonos'][$key];
		}
	}

	return $telefonoPrincipal;
}

function getCorreoPrincipal($d)
{
	$correoPrincipal = ['url' => null];

	if (!empty($d['correos'])) {
		$key = array_search('1', array_column($d['correos'], 'es_principal'));
		if ($key !== false) {
			$correoPrincipal = $d['correos'][$key];
		}
	}

	return $correoPrincipal;
}

function getLocalizacionPrincipal($d)
{
	$localizacionPrincipal = ['direccion' => null];

	if (!empty($d['localizaciones'])) {
		$key = array_search('1', array_column($d['localizaciones'], 'id_tipo_localizacion'));
		if ($key !== false) {
			$localizacionPrincipal = $d['localizaciones'][$key];
		}
	}

	return $localizacionPrincipal;
}

function formatearTelefono($telefono)
{
	return str_replace(' ', '', $telefono);
}

function getExt($d)
{
	if (!empty($d['datosUsuario']['url_foto_de_perfil'])) {
		return explode('.', $d['datosUsuario']['url_foto_de_perfil'])[1];
	}

	return "";
}

function getNomApe($d)
{
	return $d['datosUsuario']['nombres'] . ' ' . $d['datosUsuario']['apellidos'];
}

function getRedSocial($d, $tipoRedSocial)
{
	$url = "/#";

	if (!empty($d['redesSociales'])) {
		$key = array_search($tipoRedSocial, array_column($d['redesSociales'], 'descripcion_tipo_red_social'));
		if ($key !== false) {
			$url = $d['redesSociales'][$key]['url'];
		}
	}

	return $url;
}

function getPaginaWeb($d)
{
	return ($d['datosUsuario']['pagina_web'] !== '') ? $d['datosUsuario']['pagina_web'] : '/#';
}

function getVideoPresentacion($d)
{
	$url = "#";

	if (!empty($d['videos'])) {
		$key = array_search('1', array_column($d['videos'], 'es_principal'));
		if ($key !== false) {
			$url = base_url($d['videos'][$key]['url']);
		}
	}

	return $url;
}

function getPrefijo($telefono, $modo)
{
	if (isset($telefono['prefijo'])) {
		if ($modo === 'whatsapp') {
			return str_replace('+', '', $telefono['prefijo']);
		} else if ($modo === 'telefono') {
			if (
				strpos($telefono['prefijo'], '+') === false &&
				$telefono['descripcion_tipo_telefono'] !== 'Teléfono Central'
			) {
				return "+" . $telefono['prefijo'];
			} else {
				return $telefono['prefijo'];
			}
		}
	}
}

function encodeLinkTarjeta($d, $msg = null)
{
	return urlencode($msg . base_url() . "/" . $d['empresa']['slug'] . "/" . $d['datosUsuario']['slug']);
}

function getLinkTarjeta($d)
{
	return base_url($d['empresa']['slug'] . "/" . $d['datosUsuario']['slug']);
}

function getQr($d)
{
	$link = encodeLinkTarjeta($d);
	return "<img src='https://www.codigos-qr.com/qr/php/qr_img.php?d={$link}&s=6&e=m' alt='Codigo QR' />";
}

function getLinkCompartirWspMsg($d)
{
	return encodeLinkTarjeta($d, "Accede a mi tarjeta digital desde el siguiente link ");
}

function getMsgWsp($telefono)
{
	return (isset($telefono['msg_wsp'])) ? urlencode(trim($telefono['msg_wsp'])) : "";
}

function getLinkCompartir($d)
{
	return encodeLinkTarjeta($d);
}

function getColorApariencia($d)
{
	return $d['apariencia']['color_primario'] ?? "#183b62";
}

function getRutaBanner($d)
{
	if (
		isset($d['apariencia']['ruta_banner']) &&
		!empty($d['apariencia']['ruta_banner'])
	) {
		return base_url($d['apariencia']['ruta_banner']);
	}

	return false;
}
