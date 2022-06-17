<?= $this->extend('layouts/startbootstrap-sb-admin-gh-pages') ?>

<?= $this->section('content') ?>
<h1 class="mt-4">Localizaciones</h1>
<ol class="breadcrumb mb-4">
  <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
  <li class="breadcrumb-item active">Localizaciones</li>
</ol>

<div id="seccionTablaLocalizaciones">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header bg-primary text-white"><strong>Tabla de Localizaciones</strong></div>
        <div class="card-body">
          <div class="mb-3">
            <button class="btn btn-success btn-sm" id="btnNuevaLocalizacion">NUEVA LOCALIZACIÓN</button>
          </div>
          <div class="table-responsive">
            <table class="table table-bordered table-sm text-center" id="tablaLocalizaciones" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Tipo</th>
                  <th>Dirección</th>
                  <th>Ver Ubicación</th>
                  <th>Es publico</th>
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

<div id="seccionFrmRegistrarLocalizacion" class="mb-3" style="display: none;">
  <div class="row">
    <div class="col-lg-6 col-12">
      <div class="card">
        <div class="card-header bg-primary text-white"><strong>Registrar Localización</strong></div>
        <div class="card-body">
          <form id="frmRegistrarLocalizacion">
            <input type="hidden" name="id_usuario" id="inputIdUsuario" value="<?= session('actualUserUpdate.id') ?>">
            <div class="form-group">
              <label for="inputIdTipoLocalizacion"><strong>Tipo</strong></label>
              <select name="id_tipo_localizacion" id="inputIdTipoLocalizacion" class="form-control form-control-sm">
                <option value="" selected>-- SELECCIONAR --</option>
              </select>
            </div>
            <div class="form-group">
              <label for="inputDireccion"><strong>Dirección</strong></label>
              <input type="text" name="direccion" id="inputDireccion" class="form-control form-control-sm">
            </div>
            <div class="form-group">
              <label for="inputIframe"><strong>Link Iframe</strong></label>
              <input type="text" name="iframe" id="inputIframe" class="form-control form-control-sm">
            </div>
            <div class="form-group">
              <label for="inputLink"><strong>Link Ubicación</strong></label>
              <input type="text" name="link" id="inputLink" class="form-control form-control-sm">
            </div>
            <div class="form-group">
              <label for="inputLinkComoLlegar"><strong>Link Como Llegar</strong></label>
              <input type="text" name="link_como_llegar" id="inputLinkComoLlegar" class="form-control form-control-sm">
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
              <input type="submit" class="btn btn-success btn-sm" id="btnGuardar" value="Guardar">
              <button class="btn btn-secondary btn-sm" id="btnVolverFrmRegistrar">Volver</button>
            </div>
            <div class="validaciones mt-2"></div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="seccionFrmEditarLocalizacion" class="mb-3" style="display: none;">
  <div class="row">
    <div class="col-lg-6 col-12">
      <div class="card">
        <div class="card-header bg-primary text-white"><strong>Editar Localización</strong></div>
        <div class="card-body">
          <form id="frmEditarLocalizacion">
            <input type="hidden" id="_inputId">
            <input type="hidden" name="id_usuario" id="_inputIdUsuario" value="<?= session('actualUserUpdate.id') ?>">
            <div class="form-group">
              <label for="_inputIdTipoLocalizacion"><strong>Tipo</strong></label>
              <select name="id_tipo_localizacion" id="_inputIdTipoLocalizacion" class="form-control form-control-sm">
                <option value="" selected>-- SELECCIONAR --</option>
              </select>
            </div>
            <div class="form-group">
              <label for="_inputDireccion"><strong>Dirección</strong></label>
              <input type="text" name="direccion" id="_inputDireccion" class="form-control form-control-sm">
            </div>
            <div class="form-group">
              <label for="_inputIframe"><strong>Link Iframe</strong></label>
              <input type="text" name="iframe" id="_inputIframe" class="form-control form-control-sm">
            </div>
            <div class="form-group">
              <label for="_inputLink"><strong>Link Ubicación</strong></label>
              <input type="text" name="link" id="_inputLink" class="form-control form-control-sm">
            </div>
            <div class="form-group">
              <label for="_inputLinkComoLlegar"><strong>Link Como Llegar</strong></label>
              <input type="text" name="link_como_llegar" id="_inputLinkComoLlegar" class="form-control form-control-sm">
            </div>
            <div class="form-group">
              <label for="_inputEsPublico"><strong>¿Es Público?</strong></label>
              <select id="_inputEsPublico" name="es_publico" class="form-control form-control-sm">
                <option value="" selected>-- SELECCIONAR --</option>
                <option value="1">SI</option>
                <option value="0">NO</option>
              </select>
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-success btn-sm" id="_btnGuardar" value="Guardar">
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
<script src="<?= base_url('js/API/TipoLocalizacionAPI.js') ?>"></script>
<script src="<?= base_url('js/API/LocalizacionAPI.js') ?>"></script>
<script>
  $(document).ready(function() {

    const LOCALIZACION_API = new LocalizacionAPI();
    const TIPO_LOCALIZACION_API = new TipoLocalizacionAPI();

    function llenarInputTipoLocalizacion() {
      TIPO_LOCALIZACION_API.index().then(json => {
        console.log(json);
        let template = "";
        json.data.forEach(element => {
          template += `<option value="${element.id}">${element.descripcion}</option>`;
        });
        inputIdTipoLocalizacion.innerHTML += template;
        _inputIdTipoLocalizacion.innerHTML += template;
      });
    }

    llenarInputTipoLocalizacion();

    const DATATABLE_LOCALIZACIONES = $('#tablaLocalizaciones').DataTable({
      searching: false,
      ordering: false,
      processing: true,
      serverSide: true,
      ajax: {
        url: `${BASE_URL}/api/v1/localizaciones`,
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
          data: "descripcion_tipo_localizacion"
        },
        {
          data: "direccion"
        },
        {
          defaultContent: "",
          render: function(data, type, row, meta) {
            if (type === 'display') {
              return `<a href="${row.link}" target="_blank">Ver en google maps</a>`;
            }
          }
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
    $('#tablaLocalizaciones tbody').on('click', '.btn-acciones', function() {
      fila = Utils.obtenerFilaSeleccionada(DATATABLE_LOCALIZACIONES, this);
    });

    frmRegistrarLocalizacion.addEventListener('submit', function(e) {
      e.preventDefault();
      btnGuardar.disabled = true;

      let localizacion = new FormData(this);

      LOCALIZACION_API.create(localizacion).then(json => {
        btnGuardar.disabled = false;
        if (json.status === 200) {
          alertify.success('Guardado');
          DATATABLE_LOCALIZACIONES.ajax.reload();
          Utils.resetearFormulario(frmRegistrarLocalizacion, null);
          Utils.toggleSeccion(seccionTablaLocalizaciones, seccionFrmRegistrarLocalizacion);
        } else if (json.status === 400) {
          Utils.mostrarValidaciones(json, frmRegistrarLocalizacion);
        }
      })
    });

    frmEditarLocalizacion.addEventListener('submit', function(e) {
      e.preventDefault();
      _btnGuardar.disabled = true;

      let localizacion = new FormData(this);
      localizacion.append('_method', 'PUT');

      LOCALIZACION_API.update(_inputId.value, localizacion).then(json => {
        _btnGuardar.disabled = false;
        if (json.status === 200) {
          alertify.success('Guardado');
          DATATABLE_LOCALIZACIONES.ajax.reload();
          Utils.resetearFormulario(frmEditarLocalizacion, null);
          Utils.toggleSeccion(seccionTablaLocalizaciones, seccionFrmEditarLocalizacion);
        } else if (json.status === 400) {
          Utils.mostrarValidaciones(json, frmEditarLocalizacion);
        }
      })
    });

    btnEliminar.addEventListener('click', function() {
      $('#modalAcciones').modal('hide');
      alertify.confirm("Eliminar", "¿Esta seguro de eliminar?",
        function() {
          LOCALIZACION_API.delete(fila.id).then(json => {
            if (json.status === 200) {
              DATATABLE_LOCALIZACIONES.ajax.reload();
              alertify.success('Eliminado');
            } else if (json.status === 404) {
              alert(`No se encontro una localizacion con el id: ${fila.id}`);
            }
          });
        },
        function() {});
    });

    btnNuevaLocalizacion.addEventListener('click', function(e) {
      Utils.toggleSeccion(seccionTablaLocalizaciones, seccionFrmRegistrarLocalizacion);
    });

    btnEditar.addEventListener('click', function(e) {
      _btnGuardar.disabled = true;
      $('#modalAcciones').modal('hide');
      Utils.toggleSeccion(seccionTablaLocalizaciones, seccionFrmEditarLocalizacion);

      LOCALIZACION_API.show(fila.id).then(json => {
        console.log(json);
        _btnGuardar.disabled = false;
        _inputId.value = json.data.id;
        $('#_inputIdTipoLocalizacion').val(json.data.id_tipo_localizacion);
        _inputDireccion.value = json.data.direccion;
        _inputIframe.value = json.data.iframe;
        _inputLink.value = json.data.link;
        _inputLinkComoLlegar.value = json.data.link_como_llegar;
        $('#_inputEsPublico').val(json.data.es_publico);
      });
    });

    btnVolverFrmRegistrar.addEventListener('click', function(e) {
      e.preventDefault();
      Utils.toggleSeccion(seccionTablaLocalizaciones, seccionFrmRegistrarLocalizacion);
    });

    btnVolverFrmEditar.addEventListener('click', function(e) {
      e.preventDefault();
      Utils.toggleSeccion(seccionTablaLocalizaciones, seccionFrmEditarLocalizacion);
    });
  });
</script>
<?= $this->endSection() ?>