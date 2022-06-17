<?= $this->extend('layouts/startbootstrap-sb-admin-gh-pages') ?>
<?= $this->section('content') ?>
<h1 class="mt-4">Datos Empresa</h1>
<ol class="breadcrumb mb-4">
  <li class="breadcrumb-item"><a href="<?= base_url('inicio') ?>">Inicio</a></li>
  <li class="breadcrumb-item active">Datos Empresa</li>
</ol>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header bg-primary text-white"><strong>Datos Empresa</strong></div>
      <div class="card-body">
        <form id="frmDatosEmpresa">
          <input type="hidden" id="inputId">
          <input type="hidden" name="id_usuario" id="inputIdUsuario" value="<?= session('actualUserUpdate.id') ?>">
          <div class="form-group">
            <label for="inputImagen"><strong>Imagen</strong> (2MB max.)</label>
            <input type="file" class="form-control" id="inputImagen" name="imagen">
            <div class="text-center py-3">
              <img id="vistaPreviaImagen" src="" alt="Vista Previa" style="max-width:250px" />
            </div>
          </div>
          <div class="form-group">
            <label for="inputImagen"><strong>Descripción</strong></label>
            <textarea name="descripcion" id="inputDescripcion" rows="5" class="form-control form-control-sm"></textarea>
          </div>
          <div class="form-group mt-4 mb-0">
            <input type="submit" value="Guardar" class="btn btn-primary">
          </div>
          <div class="validaciones mt-2"></div>
        </form>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="<?= base_url('js/API/DatosEmpresaAPI.js') ?>"></script>
<script>
  $(document).ready(function() {

    const DATOS_EMPRESA_API = new DatosEmpresaAPI();
    let accion = "CREATE";

    inputImagen.addEventListener('change', function(e) {
      Utils.readURL(this, '#vistaPreviaImagen');
    });

    function getDatosEmpresa(id_usuario) {
      DATOS_EMPRESA_API.show(id_usuario).then(json => {
        if (json.status === 200) {
          accion = "UPDATE";
          inputId.value = json.data.id;
          inputIdUsuario.value = json.data.id_usuario;
          vistaPreviaImagen.setAttribute('src', `${BASE_URL}/${json.data.url_imagen}`);
          inputDescripcion.value = json.data.descripcion;
        }
      });
    }

    getDatosEmpresa(inputIdUsuario.value);

    frmDatosEmpresa.addEventListener('submit', function(e) {
      e.preventDefault();
      let datosEmpresa = new FormData(this);
      
      if (accion === 'CREATE') {
        DATOS_EMPRESA_API.create(datosEmpresa).then(json => {
          if (json.status === 400) {
            Utils.mostrarValidaciones(json, frmDatosEmpresa);
          } else if (json.status === 200) {
            alertify.success('Guardado');
            $('.validaciones').html('');
            getDatosEmpresa(inputIdUsuario.value);
          }
        });
      } else if (accion === 'UPDATE') {
        datosEmpresa.append('_method', 'PUT');
        DATOS_EMPRESA_API.update(inputIdUsuario.value, datosEmpresa).then(json => {
          if (json.status === 400) {
            Utils.mostrarValidaciones(json, frmDatosEmpresa);
          } else if (json.status === 200) {
            alertify.success('Guardado');
            $('.validaciones').html('');
            getDatosEmpresa(inputIdUsuario.value);
          }
        });
      }
    });

  });
</script>
<?= $this->endSection() ?>