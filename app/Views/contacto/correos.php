<?= $this->extend('layouts/startbootstrap-sb-admin-gh-pages') ?>

<?= $this->section('content') ?>
<h1 class="mt-4">Correos</h1>
<ol class="breadcrumb mb-4">
  <li class="breadcrumb-item"><a href="<?= base_url('inicio') ?>">Inicio</a></li>
  <li class="breadcrumb-item">Contacto</li>
  <li class="breadcrumb-item active">Correos</li>
</ol>

<div id="seccionTablaCorreos">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header bg-primary text-white"><strong>Tabla de Correos</strong></div>
        <div class="card-body">
          <div class="mb-3">
            <button class="btn btn-success btn-sm" id="btnNuevoCorreo">NUEVO CORREO</button>
          </div>
          <div class="table-responsive">
            <table class="table table-bordered table-sm text-center" id="tablaCorreosElectronicos" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Tipo</th>
                  <th>Url</th>
                  <th>Es Principal</th>
                  <th>Es Publico</th>
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


<div id="seccionFrmRegistrarCorreo" class="mb-3" style="display: none;">
  <div class="row">
    <div class="col-lg-6 col-12">
      <div class="card">
        <div class="card-header bg-primary text-white"><strong>Registrar Correo</strong></div>
        <div class="card-body">
          <form id="frmRegistrarCorreoElectronico">
            <input type="hidden" name="id_usuario" id="inputIdUsuario" value="<?= session('actualUserUpdate.id') ?>">
            <div class="form-group">
              <label for="inputIdTipoCorreoElectronico"><strong>Tipo</strong></label>
              <select id="inputIdTipoCorreoElectronico" name="id_tipo_correo_electronico" class="form-control form-control-sm">
                <option value="" selected>-- SELECCIONAR --</option>
              </select>
            </div>
            <div class="form-group">
              <label for="inputUrl"><strong>Url</strong></label>
              <input type="text" id="inputUrl" name="url" class="form-control form-control-sm">
            </div>
            <div class="form-group">
              <label for="inputEsPrincipal"><strong>¿Es Principal?</strong></label>
              <select id="inputEsPrincipal" name="es_principal" class="form-control form-control-sm">
                <option value="">-- SELECCIONAR --</option>
                <option value="1">SI</option>
                <option value="0" selected>NO</option>
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

<div id="seccionFrmEditarCorreo" class="mb-3" style="display: none;">
  <div class="row">
    <div class="col-lg-6 col-12">
      <div class="card">
        <div class="card-header bg-primary text-white"><strong>Editar Correo</strong></div>
        <div class="card-body">
          <form id="frmEditarCorreoElectronico">
            <input type="hidden" name="id_usuario" id="_inputIdUsuario" value="<?= session('actualUserUpdate.id') ?>">
            <input type="hidden" id="inputId">
            <div class="form-group">
              <label for="_inputIdTipoCorreoElectronico"><strong>Tipo</strong></label>
              <select id="_inputIdTipoCorreoElectronico" name="id_tipo_correo_electronico" class="form-control form-control-sm"></select>
            </div>
            <div class="form-group">
              <label for="_inputUrl"><strong>Url</strong></label>
              <input type="text" id="_inputUrl" name="url" class="form-control form-control-sm">
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
<script src="<?= base_url('js/API/TipoCorreoElectronicoAPI.js') ?>"></script>
<script src="<?= base_url('js/API/CorreoElectronicoAPI.js') ?>"></script>
<script>
  $(document).ready(function() {

    const CORREO_ELECTRONICO_API = new CorreoElectronicoAPI();
    const TIPO_CORREO_ELECTRONICO_API = new TipoCorreoElectronicoAPI();

    function llenarInputTipoCorreoElectronico() {
      TIPO_CORREO_ELECTRONICO_API.index().then(json => {
        console.log(json);
        let template = "";
        json.data.forEach(element => {
          template += `<option value="${element.id}">${element.descripcion}</option>`;
        });
        inputIdTipoCorreoElectronico.innerHTML += template;
        _inputIdTipoCorreoElectronico.innerHTML += template;
      });
    }

    llenarInputTipoCorreoElectronico();

    const DATATABLE_CORREOS_ELECTRONICOS = $('#tablaCorreosElectronicos').DataTable({
      searching: false,
      ordering: false,
      processing: true,
      serverSide: true,
      ajax: {
        url: `${BASE_URL}/api/v1/correos-electronicos`,
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
          data: "descripcion_tipo_correo_electronico"
        },
        {
          data: "url"
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
    $('#tablaCorreosElectronicos tbody').on('click', '.btn-acciones', function() {
      fila = Utils.obtenerFilaSeleccionada(DATATABLE_CORREOS_ELECTRONICOS, this);
    });

    frmRegistrarCorreoElectronico.addEventListener('submit', function(e) {
      e.preventDefault();
      btnGuardar.disabled = true;

      let correoElectronico = new FormData(this);

      CORREO_ELECTRONICO_API.create(correoElectronico).then(json => {
        btnGuardar.disabled = false;
        if (json.status === 200) {
          alertify.success('Guardado');
          DATATABLE_CORREOS_ELECTRONICOS.ajax.reload();
          Utils.resetearFormulario(frmRegistrarCorreoElectronico, null);
          Utils.toggleSeccion(seccionTablaCorreos, seccionFrmRegistrarCorreo);
        } else if (json.status === 400) {
          Utils.mostrarValidaciones(json, frmRegistrarCorreoElectronico);
        }
      })
    });

    frmEditarCorreoElectronico.addEventListener('submit', function(e) {
      e.preventDefault();
      _btnGuardar.disabled = true;

      let correoElectronico = new FormData(this);
      correoElectronico.append('_method', 'PUT');

      CORREO_ELECTRONICO_API.update(inputId.value, correoElectronico).then(json => {
        console.log(json);
        _btnGuardar.disabled = false;
        if (json.status === 200) {
          alertify.success('Guardado');
          DATATABLE_CORREOS_ELECTRONICOS.ajax.reload();
          Utils.resetearFormulario(frmEditarCorreoElectronico, null);
          Utils.toggleSeccion(seccionTablaCorreos, seccionFrmEditarCorreo);
        } else if (json.status === 400) {
          Utils.mostrarValidaciones(json, frmEditarCorreoElectronico);
        }
      })
    });

    btnEditar.addEventListener('click', function(e) {
      _btnGuardar.disabled = true;
      $('#modalAcciones').modal('hide');
      Utils.toggleSeccion(seccionTablaCorreos, seccionFrmEditarCorreo);

      CORREO_ELECTRONICO_API.show(fila.id).then(json => {
        _btnGuardar.disabled = false;
        inputId.value = json.data.id;
        $('#_inputIdTipoCorreoElectronico').val(json.data.id_tipo_correo_electronico);
        _inputUrl.value = json.data.url;
        $('#_inputEsPrincipal').val(json.data.es_principal);
        $('#_inputEsPublico').val(json.data.es_publico);
      });
    });

    btnEliminar.addEventListener('click', function() {
      $('#modalAcciones').modal('hide');
      alertify.confirm("Eliminar", "¿Esta seguro de eliminar?",
        function() {
          CORREO_ELECTRONICO_API.delete(fila.id).then(json => {
            if (json.status === 200) {
              DATATABLE_CORREOS_ELECTRONICOS.ajax.reload();
              alertify.success('Eliminado');
            } else if (json.status === 404) {
              alert(`No se encontro un correo electronico con el id: ${fila.id}`);
            }
          });
        },
        function() {});
    });

    btnNuevoCorreo.addEventListener('click', function(e) {
      Utils.toggleSeccion(seccionTablaCorreos, seccionFrmRegistrarCorreo);
    });

    btnVolverFrmRegistrar.addEventListener('click', function(e) {
      e.preventDefault();
      Utils.toggleSeccion(seccionTablaCorreos, seccionFrmRegistrarCorreo);
      Utils.resetearFormulario(frmRegistrarCorreoElectronico, null);
    });

    btnVolverFrmEditar.addEventListener('click', function(e) {
      e.preventDefault();
      Utils.toggleSeccion(seccionTablaCorreos, seccionFrmEditarCorreo);
      Utils.resetearFormulario(frmEditarCorreoElectronico, null);
    });
  });
</script>
<?= $this->endSection() ?>