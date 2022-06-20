<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
  require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'TarjetaDigital::index/kidsalud/jorge-cespedes', ['namespace' => 'App\Controllers\Presenters']);

$routes->post('api/v1/acceso/login', 'Acceso::login', ['namespace' => 'App\Controllers\API\v1']);
$routes->get('api/v1/acceso/notAuthorized', 'Acceso::notAuthorized', ['namespace' => 'App\Controllers\API\v1']);
$routes->post('api/v1/enviar-email/enviar-vcard', 'EnviarEmail::EnviarVCard', ['namespace' => 'App\Controllers\API\v1']);

// 'filter' => 'AccesoAPI'
$routes->group('api/v1', ['namespace' => 'App\Controllers\API\v1', 'filter' => 'AccesoAPI'], function ($routes) {
  $routes->post('empresa', 'Empresa::create');
  $routes->get('empresas', 'Empresa::index');
  $routes->get('empresa/searchByNombre', 'Empresa::searchByNombre');
  $routes->get('empresa/(:num)', 'Empresa::show/$1');
  $routes->put('empresa/(:num)', 'Empresa::update/$1');
  $routes->patch('empresa/(:num)', 'Empresa::update/$1');
  $routes->delete('empresa/(:num)', 'Empresa::delete/$1');

  $routes->post('usuario', 'Usuario::create');
  $routes->get('usuarios', 'Usuario::index');
  $routes->get('usuario/(:num)', 'Usuario::show/$1');
  $routes->put('usuario/(:num)', 'Usuario::update/$1');
  $routes->patch('usuario/(:num)', 'Usuario::update/$1');
  $routes->delete('usuario/(:num)', 'Usuario::delete/$1');

  $routes->get('datos-usuario/(:num)', 'DatosUsuario::show/$1');
  $routes->put('datos-usuario/(:num)', 'DatosUsuario::update/$1');
  $routes->patch('datos-usuario/(:num)', 'DatosUsuario::update/$1');

  $routes->post('datos-empresa', 'DatosEmpresa::create');
  $routes->get('datos-empresa/(:num)', 'DatosEmpresa::show/$1');
  $routes->put('datos-empresa/(:num)', 'DatosEmpresa::update/$1');
  $routes->patch('datos-empresa/(:num)', 'DatosEmpresa::update/$1');

  $routes->post('imagen', 'Imagen::create');
  $routes->get('imagenes', 'Imagen::index');
  $routes->get('imagen/(:num)', 'Imagen::show/$1');
  $routes->put('imagen/(:num)', 'Imagen::update/$1');
  $routes->patch('imagen/(:num)', 'Imagen::update/$1');
  $routes->delete('imagen/(:num)', 'Imagen::delete/$1');

  $routes->post('localizacion', 'Localizacion::create');
  $routes->get('localizaciones', 'Localizacion::index');
  $routes->get('localizacion/(:num)', 'Localizacion::show/$1');
  $routes->put('localizacion/(:num)', 'Localizacion::update/$1');
  $routes->patch('localizacion/(:num)', 'Localizacion::update/$1');
  $routes->delete('localizacion/(:num)', 'Localizacion::delete/$1');

  $routes->get('tipos-localizacion', 'TipoLocalizacion::index');

  $routes->post('red-social', 'RedSocial::create');
  $routes->get('redes-sociales', 'RedSocial::index');
  $routes->get('red-social/(:num)', 'RedSocial::show/$1');
  $routes->put('red-social/(:num)', 'RedSocial::update/$1');
  $routes->patch('red-social/(:num)', 'RedSocial::update/$1');
  $routes->delete('red-social/(:num)', 'RedSocial::delete/$1');

  $routes->get('tipos-red-social', 'TipoRedSocial::index');

  $routes->post('correo-electronico', 'CorreoElectronico::create');
  $routes->get('correos-electronicos', 'CorreoElectronico::index');
  $routes->get('correo-electronico/(:num)', 'CorreoElectronico::show/$1');
  $routes->put('correo-electronico/(:num)', 'CorreoElectronico::update/$1');
  $routes->patch('correo-electronico/(:num)', 'CorreoElectronico::update/$1');
  $routes->delete('correo-electronico/(:num)', 'CorreoElectronico::delete/$1');

  $routes->get('tipos-correo-electronico', 'TipoCorreoElectronico::index');

  $routes->post('telefono', 'Telefono::create');
  $routes->get('telefonos', 'Telefono::index');
  $routes->get('telefono/(:num)', 'Telefono::show/$1');
  $routes->put('telefono/(:num)', 'Telefono::update/$1');
  $routes->patch('telefono/(:num)', 'Telefono::update/$1');
  $routes->delete('telefono/(:num)', 'Telefono::delete/$1');

  $routes->get('tipos-telefono', 'TipoTelefono::index');

  $routes->post('documento', 'Documento::create');
  $routes->get('documentos', 'Documento::index');
  $routes->get('documento/(:num)', 'Documento::show/$1');
  $routes->post('documento/(:num)/update', 'Documento::update/$1');
  $routes->delete('documento/(:num)', 'Documento::delete/$1');

  $routes->post('video', 'Video::create');
  $routes->get('videos', 'Video::index');
  $routes->get('video/(:num)', 'Video::show/$1');
  $routes->put('video/(:num)', 'Video::update/$1');
  $routes->patch('video/(:num)', 'Video::update/$1');
  $routes->delete('video/(:num)', 'Video::delete/$1');

  $routes->post('apariencia', 'Apariencia::create');
  $routes->get('apariencia/(:num)', 'Apariencia::show/$1');
  $routes->put('apariencia/(:num)', 'Apariencia::update/$1');
  $routes->patch('apariencia/(:num)', 'Apariencia::update/$1');
  $routes->delete('apariencia/deleteBanner/(:num)', 'Apariencia::deleteBanner/$1');
});

// 'filter' => 'AccesoPresenters'
$routes->group('/', ['namespace' => 'App\Controllers\Presenters', 'filter' => 'AccesoPresenters'], function ($routes) {
  $routes->get('inicio', 'Inicio::index');
  $routes->get('empresas', 'Empresa::index');
  $routes->get('usuarios', 'Usuario::index');
  $routes->get('usuario/ver-tarjeta/(:num)', 'Usuario::verTarjeta/$1');
  $routes->get('usuario/set-actual-user-update/(:num)', 'Usuario::setActualUserUpdate/$1');
  $routes->get('usuario/delete-actual-user-update', 'Usuario::deleteActualUserUpdate');
  $routes->get('salir', 'Usuario::salir');

  $routes->get('datos-personales', 'Usuario::datosPersonales');
  $routes->get('datos-empresa', 'Usuario::datosEmpresa');
  $routes->get('localizacion', 'Localizacion::index');
  $routes->get('contacto/redes-sociales', 'Contacto::redesSociales');
  $routes->get('contacto/correos', 'Contacto::correos');
  $routes->get('contacto/telefonos', 'Contacto::telefonos');
  $routes->get('multimedia/videos', 'Multimedia::videos');
  $routes->get('multimedia/imagenes', 'Multimedia::imagenes');
  $routes->get('apariencia', 'Apariencia::index');
  $routes->get('test', 'Test::index');
});

$routes->get('ingresar', 'Usuario::ingresar', ['namespace' => 'App\Controllers\Presenters']);
$routes->get('registrate', 'Usuario::registrate', ['namespace' => 'App\Controllers\Presenters']);
// $routes->get('test', 'Test::index', ['namespace' => 'App\Controllers\Presenters']);
// $routes->get('testEmail', 'Test::testEmail', ['namespace' => 'App\Controllers\Presenters']);
// $routes->get('usuario/test', 'Usuario::test', ['namespace' => 'App\Controllers\Presenters']);

$routes->get('descargar-vcard/(:segment)', 'TarjetaDigital::descargarVCard/$1', ['namespace' => 'App\Controllers\Presenters']);

$routes->get('/(:segment)', 'AgendaProfesional::index/$1', ['namespace' => 'App\Controllers\Presenters']);
$routes->get('/(:segment)/(:segment)', 'TarjetaDigital::index/$1/$2', ['namespace' => 'App\Controllers\Presenters']);

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
  require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
