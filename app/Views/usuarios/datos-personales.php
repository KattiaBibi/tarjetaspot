<?= $this->extend('layouts/startbootstrap-sb-admin-gh-pages') ?>
<?= $this->section('content') ?>
<h1 class="mt-4">Datos Personales</h1>
<ol class="breadcrumb mb-4">
  <li class="breadcrumb-item"><a href="<?= base_url('inicio') ?>">Inicio</a></li>
  <li class="breadcrumb-item active">Datos Personales</li>
</ol>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header bg-primary text-white"><strong>Datos Personales</strong></div>
      <div class="card-body">
        <form id="frmEditarDatosPersonales">
          <input type="hidden" id="inputIdUsuario" value="<?= session('actualUserUpdate.id') ?>">
          <div class="form-group">
            <label for="inputSlug"><strong>Slug</strong></label>
            <input type="text" name="slug" id="inputSlug" class="form-control form-control-sm">
          </div>
          <div class="form-group">
            <label for="inputNombres"><strong>Nombres</strong></label>
            <input type="text" name="nombres" id="inputNombres" class="form-control form-control-sm">
          </div>
          <div class="form-group">
            <label for="inputApellidos"><strong>Apellidos</strong></label>
            <input type="text" name="apellidos" id="inputApellidos" class="form-control form-control-sm">
          </div>
          <div class="form-group">
            <label for="inputPuesto"><strong>Puesto</strong></label>
            <input type="text" name="puesto" id="inputPuesto" class="form-control form-control-sm">
          </div>
          <div class="form-group">
            <label for="inputPaginaWeb"><strong>Pagina Web</strong></label>
            <input type="text" name="pagina_web" id="inputPaginaWeb" class="form-control form-control-sm">
          </div>
          <div class="form-group">
            <label for="inputFechaNacimiento"><strong>Fecha Nacimiento</strong></label>
            <input type="date" name="fecha_nacimiento" id="inputFechaNacimiento" class="form-control form-control-sm">
          </div>
          <div class="form-group">
            <label for="inputGenero"><strong>Genero</strong></label>
            <select name="genero" id="inputGenero" class="form-control form-control-sm">
              <option value="" selected>-- Seleccione --</option>
              <option value="M">Masculino</option>
              <option value="F">Femenino</option>
            </select>
          </div>
          <div class="form-group">
            <label for="inputFotoPerfil"><strong>Foto de perfil</strong> (500px * 500px - 12MB max.)</label>
            <input type="file" class="form-control" id="inputFotoPerfil" name="foto_perfil">
            <div class="text-center py-3">
              <img id="vistaPreviaFotoPerfil" src="" alt="Vista Previa" style="max-width:250px" />
            </div>
          </div>
          <div class="form-group">
            <label for="inputAcercaDeMi"><strong>Acerca de mi</strong></label>
            <textarea class="form-control form-control-sm" id="inputAcercaDeMi" name="acerca_de_mi" rows="3"></textarea>
          </div>
          <div class="form-group">
            <label for="inputInicio"><strong>Inicio</strong></label>
            <textarea class="form-control form-control-sm" id="inputInicio" name="inicio" rows="3"></textarea>
          </div>
          <div class="form-group">
            <label for="inputHorariosAtencion"><strong>Horarios de atención</strong></label>
            <textarea class="form-control form-control-sm" id="inputHorariosAtencion" name="horarios_atencion" rows="3"></textarea>
          </div>
          <div class="form-group">
            <label for="inputEducacion"><strong>Educación</strong></label>
            <textarea class="form-control form-control-sm" id="inputEducacion" name="educacion" rows="3"></textarea>
          </div>
          <div class="form-group">
            <label for="inputExperiencia"><strong>Experiencia</strong></label>
            <textarea class="form-control form-control-sm" id="inputExperiencia" name="experiencia" rows="3"></textarea>
          </div>
          <div class="form-group">
            <label for="inputServicios"><strong>Servicios</strong></label>
            <textarea class="form-control form-control-sm" id="inputServicios" name="servicios" rows="3"></textarea>
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
<script src="<?= base_url('js/API/DatosUsuarioAPI.js') ?>"></script>
<script>
  $(document).ready(function() {

    const DATOS_USUARIO_API = new DatosUsuarioAPI();

    function getDatosUsuario(id_usuario) {
      DATOS_USUARIO_API.show(id_usuario).then(json => {
        console.log(json);
        inputSlug.value = json.data.slug;
        inputNombres.value = json.data.nombres;
        inputApellidos.value = json.data.apellidos;
        inputPuesto.value = json.data.puesto;
        inputPaginaWeb.value = json.data.pagina_web;
        inputFechaNacimiento.value = json.data.fecha_nacimiento;
        $('#inputGenero').val(json.data.genero);
        vistaPreviaFotoPerfil.setAttribute('src', `${BASE_URL}/${json.data.url_foto_de_perfil}`);
        inputAcercaDeMi.value = json.data.acerca_de_mi;
        inputInicio.value = json.data.inicio;
        inputHorariosAtencion.value = json.data.horarios_atencion;
        inputEducacion.value = json.data.educacion;
        inputExperiencia.value = json.data.experiencia;
        inputServicios.value = json.data.servicios;
      });
    }

    inputFotoPerfil.addEventListener('change', function(e) {
      Utils.readURL(this, '#vistaPreviaFotoPerfil');
    });

    getDatosUsuario(inputIdUsuario.value);

    frmEditarDatosPersonales.addEventListener('submit', function(e) {
      e.preventDefault();
      let datosPersonales = new FormData(this);
      datosPersonales.append('_method', 'PUT');

      DATOS_USUARIO_API.update(inputIdUsuario.value, datosPersonales).then(json => {
        if (json.status === 400) {
          Utils.mostrarValidaciones(json, frmEditarDatosPersonales);
        } else if (json.status === 200) {
          alertify.success('Guardado');
          $('.validaciones').html('');
          getDatosUsuario(inputIdUsuario.value);
        }
      });
    });
  });
</script>
<?= $this->endSection() ?>