<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Agenda Profesional - <?= $agenda_profesional['empresa']['nombre'] ?></title>

  <meta property="og:title" content="Agenda Profesinal - <?= $agenda_profesional['empresa']['nombre'] ?>" />
	<meta property="og:description" content="Agenda Profesional - <?= $agenda_profesional['empresa']['nombre'] ?>">
  <meta property="og:url" content="<?= base_url($agenda_profesional['empresa']['slug']) ?>" />
	<meta property="og:image" content="<?= base_url($agenda_profesional['empresa']['logo']) ?>" />
	<meta property="og:image:type" content="image/<?= explode('.', $agenda_profesional['empresa']['logo'])[1] ?>" />

	<link rel="shortcut icon" href="<?= base_url($agenda_profesional['empresa']['logo']) ?>" type="image/<?= explode('.', $agenda_profesional['empresa']['logo'])[1] ?>" />

  <link href="<?= base_url('css/styles.css') ?>" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

  <style>
    @import url(//fonts.googleapis.com/css?family=Lato:300:400);

    body,
    html {
      height: auto;
    }

    body {
      font-family: tahoma;
    }

    .our-team {
      padding: 30px 0 40px;
      margin-bottom: 30px;
      background-color: #f7f5ec;
      text-align: center;
      overflow: hidden;
      position: relative;
    }

    .our-team .picture {
      display: inline-block;
      height: 130px;
      width: 130px;
      margin-bottom: 30px;
      z-index: 1;
      position: relative;
    }

    .our-team .picture::before {
      content: "";
      width: 100%;
      height: 0;
      border-radius: 50%;
      background-color: #1369ce;
      position: absolute;
      bottom: 135%;
      right: 0;
      left: 0;
      opacity: 0.9;
      transform: scale(3);
      transition: all 0.3s linear 0s;
    }

    .our-team:hover .picture::before {
      height: 100%;
    }

    .our-team .picture::after {
      content: "";
      width: 100%;
      height: 100%;
      border-radius: 50%;
      background-color: #1369ce;
      position: absolute;
      top: 0;
      left: 0;
      z-index: -1;
    }

    .our-team .picture img {
      width: 100%;
      height: auto;
      border-radius: 50%;
      transform: scale(1);
      transition: all 0.9s ease 0s;
    }

    .our-team:hover .picture img {
      box-shadow: 0 0 0 14px #f7f5ec;
      transform: scale(0.7);
    }

    .our-team .title {
      display: block;
      font-size: 15px;
      color: #4e5052;
      text-transform: capitalize;
    }

    .our-team .social {
      width: 100%;
      padding: 15px 0;
      margin: 0;
      position: absolute;
      bottom: -100px;
      left: 0;
      transition: all 0.5s ease 0s;
    }

    .our-team .social {
      bottom: 0;
    }

    .our-team .social a {
      display: inline-flex;
      justify-content: center;
      align-items: center;
      background-color: #1369ce;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      padding: 10px;
      font-size: 20px;
      color: white;
      transition: all 0.3s ease 0s;
      text-decoration: none;
    }

    .name {
      color: #1369ce;
    }

    .name:hover {
      text-decoration: none;
      color: #1369ce;
    }

    .titulo,
    .pie {
      color: white;
      /* background-color: rgba(0, 0, 0, .3); */
    }

    .team-content {
      margin-bottom: 50px;
    }

    h1 {
      font-family: 'Lato', sans-serif;
      font-weight: 300;
      letter-spacing: 2px;
      font-size: 48px;
      text-transform: uppercase;
    }

    p {
      font-family: 'Lato', sans-serif;
      letter-spacing: 1px;
      font-size: 14px;
      color: #333333;
    }

    .header {
      position: relative;
      text-align: center;
      background: linear-gradient(60deg, rgba(84, 58, 183, 1) 0%, rgba(0, 172, 193, 1) 100%);
      color: white;
    }

    .logo {
      width: 80px;
      height: 80px;
      padding: 5px;
      background-color: #fff;
      border-radius: 50%;
      margin-right: 15px;
      margin-left: 15px;
      display: inline-block;
      vertical-align: middle;
    }

    .inner-header {
      height: 20vh;
      width: 100%;
      margin: 0;
      padding: 0;
    }

    .flex {
      /*Flexbox for containers*/
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
    }

    .waves {
      position: relative;
      width: 100%;
      height: 15vh;
      margin-bottom: -7px;
      /*Fix for safari gap*/
      min-height: 100px;
      max-height: 150px;
    }

    .content {
      position: relative;
      text-align: center;
    }

    /*Shrinking for mobile*/
    @media (max-width: 768px) {
      h1 {
        font-size: 24px;
      }
    }

    /* BARRA PARA COMPARTIR */
    .sbuttons {
      bottom: 5%;
      position: fixed;
      margin: 1em;
      left: 0;
    }

    .sbutton {
      display: flex;
      justify-content: center;
      align-items: center;
      width: 60px;
      height: 60px;
      font-size: 22px;
      border-radius: 50%;
      text-align: center;
      color: white;
      margin: 20px auto 0;
      box-shadow: 0px 5px 11px -2px rgba(0, 0, 0, 0.18), 0px 4px 12px -7px rgba(0, 0, 0, 0.15);
      cursor: pointer;
      -webkit-transition: all .1s ease-out;
      transition: all .1s ease-out;
      position: relative;
    }

    .sbutton>i {
      font-size: 38px;
      line-height: 60px;
      transition: all .2s ease-in-out;
      transition-delay: 2s;
    }

    .sbutton:active,
    .sbutton:focus,
    .sbutton:hover {
      box-shadow: 0 0 4px rgba(0, 0, 0, .14), 0 4px 8px rgba(0, 0, 0, .28);
      color: white;
    }

    .sbutton:not(:last-child) {
      width: 60px;
      height: 60px;
      margin: 20px auto 0;
      opacity: 0;
    }

    .sbutton:not(:last-child)>i {
      font-size: 25px;
      line-height: 60px;
      transition: all .3s ease-in-out;
    }

    .sbuttons:hover .sbutton:not(:last-child) {
      opacity: 1;
      width: 60px;
      height: 60px;
      margin: 15px auto 0;
    }

    .sbutton:nth-last-child(1) {
      -webkit-transition-delay: 25ms;
      transition-delay: 25ms;
    }

    .sbutton:not(:last-child):nth-last-child(2) {
      -webkit-transition-delay: 20ms;
      transition-delay: 20ms;
    }

    .sbutton:not(:last-child):nth-last-child(3) {
      -webkit-transition-delay: 40ms;
      transition-delay: 40ms;
    }

    .sbutton:not(:last-child):nth-last-child(4) {
      -webkit-transition-delay: 60ms;
      transition-delay: 60ms;
    }

    .sbutton:not(:last-child):nth-last-child(5) {
      -webkit-transition-delay: 80ms;
      transition-delay: 80ms;
    }

    .sbutton:not(:last-child):nth-last-child(6) {
      -webkit-transition-delay: 100ms;
      transition-delay: 100ms;
    }

    [tooltip]:before {
      font-family: 'Roboto';
      font-weight: 600;
      border-radius: 2px;
      background-color: #585858;
      color: #fff;
      content: attr(tooltip);
      font-size: 12px;
      visibility: hidden;
      opacity: 0;
      padding: 5px 7px;
      margin-left: 10px;
      position: absolute;
      left: 100%;
      bottom: 20%;
      white-space: nowrap;
    }

    [tooltip]:hover:before,
    [tooltip]:hover:after {
      visibility: visible;
      opacity: 1;
    }

    .sbutton.mainsbutton {
      background: #2ab1ce;
    }

    .sbutton.gplus {
      background: #F44336;
    }

    .sbutton.pinteres {
      background: #e60023;
    }

    .sbutton.twitt {
      background: #03A9F4;
    }

    .sbutton.fb {
      background: #3F51B5;
    }

    .sbutton.whatsapp {
      background: #00e676;
    }

    .sbutton.qr {
      background-color: steelblue;
    }

    /* BARRA PARA COMPARTIR */
  </style>
</head>

<body style="background-color: <?= $agenda_profesional['empresa']['background_color'] ?>;">
  <!--Header starts-->
  <div class="header">
    <!--Content before waves-->
    <div class="inner-header flex">
      <!--Just the logo.. Don't mind this-->
      <img src="<?= base_url($agenda_profesional['empresa']['logo']) ?>" alt="logotipo" class="logo">
      <h1>AGENDA PROFESIONAL</h1>
    </div>
  </div>
  <!--Header ends-->

  <div class="container">
    <div class="row my-5 mx-3 mx-md-0">
      <?php if (!empty($agenda_profesional['usuarios'])) : ?>
        <?php foreach ($agenda_profesional['usuarios'] as $usuario) : ?>
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="our-team shadow rounded">
              <div class="picture">
                <img class="img-fluid" src="<?= (!empty($usuario['url_foto_de_perfil'])) ? base_url($usuario['url_foto_de_perfil']) : base_url("images/foto_perfil_generica_hombre.jpg") ?>">
              </div>
              <div class="team-content px-2 text-truncate">
                <a href="<?= base_url($agenda_profesional['empresa']['slug'] . '/' . $usuario['slug']) ?>" class="name h4" target="_blank">
                  <span style="font-size: 15px;">👉</span> <?= $usuario['nombres'] . " " . $usuario['apellidos'] ?>
                </a>
                <h4 class="title"><?= (!empty($usuario['puesto'])) ? $usuario['puesto'] : "Médico" ?></h4>
              </div>
              <ul class="social">
                <div class="d-inline-block mr-3">
                  <a href="tel:<?= getPrefijo(getTelefonoPrincipal($usuario), "telefono") ?><?= formatearTelefono(getTelefonoPrincipal($usuario)['numero']) ?>" aria-hidden="true">
                    <i class="fas fa-phone"></i>
                  </a> <br>
                  <span class="small">Llamar</span>
                </div>
                <div class="d-inline-block">
                  <a href="https://api.whatsapp.com/send?phone=<?= getPrefijo(getTelefonoPrincipal($usuario), "whatsapp") ?><?= formatearTelefono(getTelefonoPrincipal($usuario)['numero']) ?>&text=<?= urlencode(getTelefonoPrincipal($usuario)['msg_wsp']) ?>" aria-hidden="true" target="_blank">
                    <i class="fab fa-whatsapp"></i>
                  </a> <br>
                  <span class="small">WhatsApp</span>
                </div>
              </ul>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>

  <!--Content starts-->
  <div class="content flex">
    <p style="color: white;">Desarrollado por <a href="http://tarjetita.vip/CEmpresarial/WC" style="color: white;" target="_blank">tarjetita.vip</a></p>
  </div>
  <!--Content ends-->

  <div class="sbuttons">

    <a href="https://api.whatsapp.com/send?text=<?= urlencode('Accede a mi agenda profesional desde el siguiente link: ' . base_url($agenda_profesional['empresa']['slug'])) ?>" target="_blank" class="sbutton whatsapp" tooltip="WhatsApp"><i class="fab fa-whatsapp"></i></a>
    <a href="//www.facebook.com/sharer.php?u=<?= urlencode(base_url($agenda_profesional['empresa']['slug'])) ?>&t=<?= urlencode($agenda_profesional['empresa']['nombre']) ?>" target="_blank" class="sbutton fb" tooltip="Facebook"><i class="fab fa-facebook-f"></i></a>

    <a href="#" target="_blank" class="sbutton qr" tooltip="Codigo Qr" data-toggle="modal" data-target="#qrModal"><i class="fas fa-qrcode"></i></a>

    <a target="_blank" class="sbutton mainsbutton" tooltip="Share"><i class="fas fa-share-square"></i></a>
  </div>

  <div class="modal fade" id="qrModal" tabindex="-1" aria-labelledby="qrModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="qrModalLabel">Codigo QR</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">
          <img src="https://www.codigos-qr.com/qr/php/qr_img.php?d=<?= urlencode(base_url($agenda_profesional['empresa']['slug'])) ?>&s=6&e=m" alt="Codigo Qr" class="img-fluid">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="<?= base_url('js/scripts.js') ?>"></script>

  <script>
    const BASE_URL = '<?= base_url() ?>';
  </script>

  <script src="<?= base_url('js/Utils.js') ?>"></script>

  <script>
    $(document).ready(function() {

    });
  </script>
</body>

</html>