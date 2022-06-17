<?= $this->extend('layouts/startbootstrap-sb-admin-gh-pages') ?>

<?= $this->section('content') ?>
<h1 class="mt-4">Videos</h1>
<ol class="breadcrumb mb-4">
  <li class="breadcrumb-item"><a href="<?= base_url('inicio') ?>">Inicio</a></li>
  <li class="breadcrumb-item">Multimedia</li>
  <li class="breadcrumb-item active">Videos</li>
</ol>

<div id="seccionTablaVideos">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header bg-primary text-white"><strong>Tabla de Videos</strong></div>
        <div class="card-body">
          <div class="mb-3">
            <button class="btn btn-success btn-sm" id="btnNuevoVideo">NUEVO VIDEO</button>
          </div>
          <div class="table-responsive">
            <table class="table table-bordered table-sm text-center" id="tablaVideos" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Url</th>
                  <th>Titulo</th>
                  <th style="width: 60%;">Descripción</th>
                  <th>Orden</th>
                  <th>Es publico</th>
                  <th>Es principal</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div id="seccionFrmRegistrarVideo" class="mb-3" style="display: none;">
  <div class="row">
    <div class="col-lg-6 col-12">
      <div class="card">
        <div class="card-header bg-primary text-white"><strong>Registrar Video</strong></div>
        <div class="card-body">
          <form id="frmRegistrarVideo">
            <input type="hidden" name="id_usuario" id="inputIdUsuario" value="<?= session('actualUserUpdate.id') ?>">
            <div class="form-group">
              <label for="inputVideo"><strong>Video</strong>(5Mb Max)</label>
              <input type="file" name="video" id="inputVideo" class="form-control">
            </div>
            <div class="form-group">
              <label for="inputTitulo">Titulo</label>
              <input type="text" name="titulo" id="inputTitulo" class="form-control form-control-sm">
            </div>
            <div class="form-group">
              <label for="inputDescripcion">Descripción</label>
              <textarea class="form-control form-control-sm" name="descripcion" id="inputDescripcion" rows="3"></textarea>
            </div>
            <div class="form-group">
              <label for="inputOrden">Orden</label>
              <input type="text" name="orden" id="inputOrden" class="form-control form-control-sm">
            </div>
            <div class="form-group">
              <label for="inputEsPrincipal"><strong>¿Es Principal?</strong></label>
              <select id="inputEsPrincipal" name="es_principal" class="form-control form-control-sm">
                <option value="" selected>-- SELECCIONAR --</option>
                <option value="1">SI</option>
                <option value="0">NO</option>
              </select>
            </div>
            <div class="form-group">
              <label for="inputEsPublico"><strong>¿Es Público?</strong></label>
              <select id="inputEsPublico" name="es_publico" class="form-control form-control-sm">
                <option value="">-- SELECCIONAR --</option>
                <option value="1" selected>SI</option>
                <option value="0">NO</option>
              </select>
            </div>
            <div class="form-group">
              <input type="submit" value="Guardar" class="btn btn-success btn-sm" id="btnGuardar">
              <button class="btn btn-secondary btn-sm" id="btnVolverFrmRegistrar">Volver</button>
            </div>
            <div class="validaciones mt-2"></div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="seccionFrmEditarVideo" class="mb-3" style="display: none;">
  <div class="row">
    <div class="col-lg-6 col-12">
      <div class="card">
        <div class="card-header bg-primary text-white"><strong>Editar Video</strong></div>
        <div class="card-body">
          <form id="frmEditarVideo">
            <input type="hidden" id="inputId">
            <input type="hidden" name="id_usuario" id="_inputIdUsuario" value="<?= session('actualUserUpdate.id') ?>">
            <div class="form-group">
              <label for="_inputVideo"><strong>Video</strong>(5Mb Max)</label>
              <input type="file" name="video" id="_inputVideo" class="form-control">
              <div class="mt-2 text-center">
                <video src="" id="_vistaPreviaVideo" style="width: 250px;"></video>
              </div>
            </div>
            <div class="form-group">
              <label for="_inputTitulo">Titulo</label>
              <input type="text" name="titulo" id="_inputTitulo" class="form-control form-control-sm">
            </div>
            <div class="form-group">
              <label for="_inputDescripcion">Descripción</label>
              <textarea class="form-control form-control-sm" name="descripcion" id="_inputDescripcion" rows="3"></textarea>
            </div>
            <div class="form-group">
              <label for="_inputOrden">Orden</label>
              <input type="text" name="orden" id="_inputOrden" class="form-control form-control-sm">
            </div>
            <div class="form-group">
              <label for="_inputEsPrincipal"><strong>¿Es Principal?</strong></label>
              <select id="_inputEsPrincipal" name="es_principal" class="form-control form-control-sm">
                <option value="" selected>-- SELECCIONAR --</option>
                <option value="1">SI</option>
                <option value="0">NO</option>
              </select>
            </div>
            <div class="form-group">
              <label for="_inputEsPublico"><strong>¿Es Público?</strong></label>
              <select id="_inputEsPublico" name="es_publico" class="form-control form-control-sm">
                <option value="">-- SELECCIONAR --</option>
                <option value="1" selected>SI</option>
                <option value="0">NO</option>
              </select>
            </div>
            <div class="form-group">
              <input type="submit" value="Guardar" class="btn btn-success btn-sm" id="_btnGuardar">
              <button class="btn btn-secondary btn-sm" id="btnVolverFrmEditar">Volver</button>
            </div>
            <div class="validaciones mt-2"></div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalAcciones" tabindex="-1" aria-labelledby="modalAccionesLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalAccionesLabel">Acciones</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <button class="btn btn-primary btn-sm btn-block" id="btnEditar">Editar</button>
        <button class="btn btn-primary btn-sm btn-block" id="btnEliminar">Eliminar</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="<?= base_url('js/API/VideoAPI.js') ?>"></script>
<script>
  $(document).ready(function() {

    const VIDEO_API = new VideoAPI();

    const DATATABLE_VIDEOS = $('#tablaVideos').DataTable({
      searching: false,
      ordering: false,
      processing: true,
      serverSide: true,
      ajax: {
        url: `${BASE_URL}/api/v1/videos`,
        type: "GET",
        data: function(d) {
          return $.extend({}, d, {
            "filters": {
              "id_usuario": "<?= session('actualUserUpdate.id') ?>",
            }
          });
        }
      },
      columns: [{
          data: "id"
        },
        {
          defaultContent: "",
          render: function(data, type, row, meta) {
            if (type === 'display') {
              return `<a href="${BASE_URL}/${row.url}" target="_blank">Ver video</a>`;
            }
          }
        },
        {
          data: "titulo"
        },
        {
          data: "descripcion"
        },
        {
          data: "orden"
        },
        {
          defaultContent: "",
          render: function(data, type, row, meta) {
            if (type === 'display') {
              return (row.es_publico === '1') ? 'SI' : 'NO';
            }
          }
        },
        {
          defaultContent: "",
          render: function(data, type, row, meta) {
            if (type === 'display') {
              return (row.es_principal === '1') ? 'SI' : 'NO';
            }
          }
        },
        {
          defaultContent: "",
          render: function(data, type, row, meta) {
            return `
            <button class="btn btn-sm btn-success btn-acciones" data-toggle="modal" data-target="#modalAcciones">
              Acciones
            </button>`
          }
        }
      ],
      columnDefs: [{
        targets: [0],
        visible: false
      }]
    });

    let fila = null;
    $('#tablaVideos tbody').on('click', '.btn-acciones', function() {
      fila = Utils.obtenerFilaSeleccionada(DATATABLE_VIDEOS, this);
    });

    frmRegistrarVideo.addEventListener('submit', function(e) {
      e.preventDefault();
      btnGuardar.disabled = true;

      let video = new FormData(this);

      VIDEO_API.create(video).then(json => {
        btnGuardar.disabled = false;
        if (json.status === 200) {
          alertify.success('Guardado');
          DATATABLE_VIDEOS.ajax.reload();
          Utils.resetearFormulario(frmRegistrarVideo, null);
          Utils.toggleSeccion(seccionTablaVideos, seccionFrmRegistrarVideo);
        } else if (json.status === 400) {
          Utils.mostrarValidaciones(json, frmRegistrarVideo);
        }
      })
    });

    frmEditarVideo.addEventListener('submit', function(e) {
      e.preventDefault();
      _btnGuardar.disabled = true;

      let video = new FormData(this);
      video.append('_method', 'PUT');

      VIDEO_API.update(inputId.value, video).then(json => {
        console.log(json);
        _btnGuardar.disabled = false;
        if (json.status === 200) {
          alertify.success('Guardado');
          DATATABLE_VIDEOS.ajax.reload();
          Utils.resetearFormulario(frmEditarVideo, null);
          Utils.toggleSeccion(seccionTablaVideos, seccionFrmEditarVideo);
        } else if (json.status === 400) {
          Utils.mostrarValidaciones(json, frmEditarVideo);
        }
      })
    });

    btnEditar.addEventListener('click', function(e) {
      _btnGuardar.disabled = true;
      $('#modalAcciones').modal('hide');
      Utils.toggleSeccion(seccionTablaVideos, seccionFrmEditarVideo);

      VIDEO_API.show(fila.id).then(json => {
        _btnGuardar.disabled = false;
        inputId.value = json.data.id;
        _vistaPreviaVideo.setAttribute('src', `${BASE_URL}/${json.data.url}`);
        _inputTitulo.value = json.data.titulo;
        _inputDescripcion.value = json.data.descripcion;
        _inputOrden.value = json.data.orden;
        $('#_inputEsPrincipal').val(json.data.es_principal);
        $('#_inputEsPublico').val(json.data.es_publico);
      });
    });

    btnEliminar.addEventListener('click', function() {
      $('#modalAcciones').modal('hide');
      alertify.confirm("Eliminar", "¿Esta seguro de eliminar?",
        function() {
          VIDEO_API.delete(fila.id).then(json => {
            if (json.status === 200) {
              DATATABLE_VIDEOS.ajax.reload();
              alertify.success('Eliminado');
            } else if (json.status === 404) {
              alert(`No se encontro video con el id: ${fila.id}`);
            }
          });
        },
        function() {});
    });

    btnNuevoVideo.addEventListener('click', function(e) {
      Utils.toggleSeccion(seccionTablaVideos, seccionFrmRegistrarVideo);
    });

    btnVolverFrmRegistrar.addEventListener('click', function(e) {
      e.preventDefault();
      Utils.toggleSeccion(seccionTablaVideos, seccionFrmRegistrarVideo);
      Utils.resetearFormulario(frmRegistrarVideo, null);
      vistaPreviaVideo.setAttribute('src', "#");
    });

    btnVolverFrmEditar.addEventListener('click', function(e) {
      e.preventDefault();
      Utils.toggleSeccion(seccionTablaVideos, seccionFrmEditarVideo);
      Utils.resetearFormulario(frmEditarVideo, null);
      _vistaPreviaVideo.setAttribute('src', "#");
    });
  });
</script>
<?= $this->endSection() ?>