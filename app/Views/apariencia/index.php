<?= $this->extend('layouts/startbootstrap-sb-admin-gh-pages') ?>
<?= $this->section('content') ?>
<h1 class="mt-4">Apariencia</h1>
<ol class="breadcrumb mb-4">
  <li class="breadcrumb-item"><a href="<?= base_url('inicio') ?>">Inicio</a></li>
  <li class="breadcrumb-item active">Apariencia</li>
</ol>

<div class="row">
  <div class="col-lg-6 col-12">
    <div class="card">
      <div class="card-header bg-primary text-white"><strong>Apariencia</strong></div>
      <div class="card-body">
        <form id="frmApariencia">
          <input type="hidden" id="inputId">
          <input type="hidden" name="id_usuario" id="inputIdUsuario" value="<?= session('actualUserUpdate.id') ?>">
          <div class="form-group">
            <label for="inputColorPrimario"><strong>Color Primario</strong> (Hexadecimal)</label>
            <input type="color" name="color_primario" id="inputColorPrimario" class="form-control form-control-sm">
          </div>
          <div class="form-group">
            <label for="inputBanner"><strong>Banner</strong> (2MB max.) <button class="btn btn-sm btn-danger" id="btnEliminarBanner" style="display: none;">Eliminar Banner</button> </label>
            <input type="file" class="form-control" id="inputBanner" name="banner">
            <div class="text-center py-3">
              <img id="vistaPreviaBanner" src="" alt="Vista Previa" style="max-width: 300px" />
            </div>
          </div>
          <div class="form-group mt-4 mb-0">
            <input type="submit" value="Guardar" class="btn btn-primary" id="btnGuardar">
          </div>
          <div class="validaciones mt-2"></div>
        </form>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="<?= base_url('js/API/AparienciaAPI.js') ?>"></script>
<script>
  $(document).ready(function() {

    const APARIENCIA_API = new AparienciaAPI();
    let accion = "CREATE";

    inputBanner.addEventListener('change', function(e) {
      Utils.readURL(this, '#vistaPreviaBanner');
    });

    function getDatosApariencia(id_usuario) {
      btnGuardar.disabled = true;
      APARIENCIA_API.show(id_usuario).then(json => {
        btnGuardar.disabled = false;
        if (json.status === 200) {
          accion = "UPDATE";
          inputId.value = json.data.id;
          inputIdUsuario.value = json.data.id_usuario;
          inputColorPrimario.value = json.data.color_primario;
          vistaPreviaBanner.setAttribute('src', `${BASE_URL}/${json.data.ruta_banner}`);
          if (json.data.ruta_banner !== '' && json.data.ruta_banner !== null) {
            btnEliminarBanner.style.display = 'inline-block';
          } else {
            btnEliminarBanner.style.display = 'none';
          }
        }
      });
    }

    getDatosApariencia(inputIdUsuario.value);

    frmApariencia.addEventListener('submit', function(e) {
      e.preventDefault();
      btnGuardar.disabled = true;
      let apariencia = new FormData(this);

      if (accion === 'CREATE') {
        APARIENCIA_API.create(apariencia).then(json => {
          btnGuardar.disabled = false;
          if (json.status === 400) {
            Utils.mostrarValidaciones(json, frmApariencia);
          } else if (json.status === 200) {
            alertify.success('Guardado');
            $('.validaciones').html('');
            getDatosApariencia(inputIdUsuario.value);
          }
        });
      } else if (accion === 'UPDATE') {
        apariencia.append('_method', 'PUT');
        APARIENCIA_API.update(inputIdUsuario.value, apariencia).then(json => {
          btnGuardar.disabled = false;
          if (json.status === 400) {
            Utils.mostrarValidaciones(json, frmApariencia);
          } else if (json.status === 200) {
            alertify.success('Guardado');
            $('.validaciones').html('');
            getDatosApariencia(inputIdUsuario.value);
          }
        });
      }
    });

    btnEliminarBanner.addEventListener('click', function(e) {
      e.preventDefault();
      alertify.confirm("Eliminar", "¿Esta seguro de eliminar?",
        function() {
          APARIENCIA_API.deleteBanner(inputIdUsuario.value).then(json => {
            if (json.status === 400) {
              alertify.warning('No se encontro el banner');
            } else if (json.status === 200) {
              alertify.success('Guardado');
              $('.validaciones').html('');
              getDatosApariencia(inputIdUsuario.value);
            }
          });
        },
        function() {});
    });

  });
</script>
<?= $this->endSection() ?>