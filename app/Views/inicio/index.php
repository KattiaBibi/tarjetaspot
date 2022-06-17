<?= $this->extend('layouts/startbootstrap-sb-admin-gh-pages') ?>

<?= $this->section('content') ?>
<h1 class="mt-4">Inicio</h1>
<ol class="breadcrumb mb-4">
  <li class="breadcrumb-item"><a href="<?= base_url('inicio') ?>">Inicio</a></li>
</ol>

<div class="jumbotron">
  <h1 class="display-4">Hola, <?= session('usuarioLogueado.nombres') ?></h1>
  <p class="lead">Aqui podras crear tu tarjeta digital con tus datos personales, informacion de contacto, multimedia, etc.</p>
  <hr class="my-4">
  <p>Empieza ahora a editar tu tarjeta digital!</p>
  <a class="btn btn-primary btn-lg" href="<?= base_url('usuarios') ?>" role="button">Comienza Ahora!</a>
</div>

<?= $this->endSection() ?>