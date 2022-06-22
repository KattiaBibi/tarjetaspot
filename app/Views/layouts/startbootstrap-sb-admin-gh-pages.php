<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Tarjeta Digital</title>

  <link href="<?= base_url('css/styles.css') ?>" rel="stylesheet" />

  <!-- font-awesome css cdn -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

  <!-- Datatables css cdn -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" />

  <!-- Alertify css cdn -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />

  <!-- Alertify bootstrap theme css cdn -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />

  <!-- Select2 css cdn -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

  <?= $this->renderSection('sytles') ?>
</head>

<body class="sb-nav-fixed">
  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="<?= base_url('inicio') ?>">Tarjetaspot</a>
    <button class="btn btn-link ml-auto ml-lg-0 btn-sm order-1 order-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
  </nav>
  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
          <div class="nav">
            <div class="sb-sidenav-menu-heading">Escritorio</div>
            <a class="nav-link" href="<?= base_url('inicio') ?>">
              <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
              Inicio
            </a>

            <a class="nav-link" href="<?= base_url('empresas') ?>">
              <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
              Empresas
            </a>
            <a class="nav-link" href="<?= base_url('usuarios') ?>">
              <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
              Usuarios
            </a>

            <?php if (session()->has('actualUserUpdate')) : ?>
              <div class="sb-sidenav-menu-heading">Datos del Usuario</div>
              <a class="nav-link" href="<?= base_url('datos-personales') ?>">
                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                Datos Personales
              </a>
              <a class="nav-link" href="<?= base_url('datos-empresa') ?>">
                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                Datos Empresa
              </a>
              <a class="nav-link" href="<?= base_url('localizacion') ?>">
                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                Localización
              </a>
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseContacto" aria-expanded="false" aria-controls="collapseContacto">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Contacto
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
              </a>
              <div class="collapse" id="collapseContacto" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                  <a class="nav-link" href="<?= base_url('contacto/redes-sociales') ?>">Redes Sociales</a>
                  <a class="nav-link" href="<?= base_url('contacto/correos') ?>">Correos</a>
                  <a class="nav-link" href="<?= base_url('contacto/telefonos') ?>">Télefonos</a>
                </nav>
              </div>
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMultimedia" aria-expanded="false" aria-controls="collapseMultimedia">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Multimedia
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
              </a>
              <div class="collapse" id="collapseMultimedia" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                  <a class="nav-link" href="<?= base_url('multimedia/videos') ?>">Videos</a>
                  <a class="nav-link" href="<?= base_url('multimedia/imagenes') ?>">Imagenes</a>
                </nav>
              </div>
              <a class="nav-link" href="<?= base_url('apariencia') ?>">
                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                Apariencia
              </a>
              <a class="nav-link" href="<?= base_url('usuario/delete-actual-user-update') ?>">
                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                Dejar de Editar
              </a>
            <?php endif; ?>

            <div class="sb-sidenav-menu-heading">Cerrar Sesión</div>
            <a class="nav-link" href="<?= base_url('salir') ?>">
              <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
              Salir
            </a>
          </div>
        </div>
        <div class="sb-sidenav-footer">
          <div class="small">Usuario:</div>
          <?= session('usuarioLogueado.nombres') . ' ' . session('usuarioLogueado.apellidos') ?>
        </div>
      </nav>
    </div>
    <div id="layoutSidenav_content">

      <!-- content -->
      <main>
        <div class="container-fluid">
          <?= $this->renderSection('content') ?>
        </div>
      </main>
      <!-- //content -->

      <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid">
          <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Your Website 2021</div>
            <div>
              <a href="#">Privacy Policy</a>
              &middot;
              <a href="#">Terms &amp; Conditions</a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

  <script src="<?= base_url('js/scripts.js') ?>"></script>

  <!-- Datatables js cdn -->
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

  <!-- Alertify js cdn -->
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

  <!-- Select2 js cdn -->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

  <!-- Select2 traduccion cdn -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/i18n/es.js"></script>

  <script src="<?= base_url('js/configs.js') ?>"></script>
  <script src="<?= base_url('js/Utils.js') ?>"></script>

  <script>
    const BASE_URL = '<?= base_url() ?>';
  </script>

  <?= $this->renderSection('scripts') ?>
</body>

</html>