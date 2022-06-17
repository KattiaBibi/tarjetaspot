<?= $this->extend('layouts/startbootstrap-sb-admin-gh-pages') ?>

<?= $this->section('content') ?>
<h1 class="mt-4">Télefonos</h1>
<ol class="breadcrumb mb-4">
  <li class="breadcrumb-item"><a href="<?= base_url('inicio') ?>">Inicio</a></li>
  <li class="breadcrumb-item">Contacto</li>
  <li class="breadcrumb-item active">Télefonos</li>
</ol>

<div id="seccionTablaTelefonos">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header bg-primary text-white"><strong>Tabla de Télefonos</strong></div>
        <div class="card-body">
          <div class="mb-3">
            <button class="btn btn-success btn-sm" id="btnNuevoTelefono">NUEVO TELEFONO</button>
          </div>
          <div class="table-responsive">
            <table class="table table-bordered table-sm text-center" id="tablaTelefonos" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Tipo</th>
                  <th>Prefijo</th>
                  <th>Número</th>
                  <th>Es Wsp</th>
                  <th>Msg Wsp</th>
                  <th>Es Publico</th>
                  <th>Es Principal</th>
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


<div id="seccionFrmRegistrarTelefono" class="mb-3" style="display: none;">
  <div class="row">
    <div class="col-lg-6 col-12">
      <div class="card">
        <div class="card-header bg-primary text-white"><strong>Registrar Télefono</strong></div>
        <div class="card-body">
          <form id="frmRegistrarTelefono">
            <input type="hidden" name="id_usuario" id="inputIdUsuario" value="<?= session('actualUserUpdate.id')  ?>">
            <div class="form-group">
              <label for="inputIdTipoTelefono"><strong>Tipo</strong></label>
              <select id="inputIdTipoTelefono" name="id_tipo_telefono" class="form-control form-control-sm">
                <option value="" selected>-- SELECCIONAR --</option>
              </select>
            </div>
            <div class="form-group">
              <label for="inputPrefijo"><strong>Prefijo</strong></label>
              <input type="text" id="inputPrefijo" name="prefijo" class="form-control form-control-sm">
            </div>
            <div class="form-group">
              <label for="inputNumero"><strong>Número</strong></label>
              <input type="text" id="inputNumero" name="numero" class="form-control form-control-sm">
            </div>
            <div class="form-group">
              <label for="inputEsWsp"><strong>¿Es Whatsapp?</strong></label>
              <select id="inputEsWsp" name="es_wsp" class="form-control form-control-sm">
                <option value="" selected>-- SELECCIONAR --</option>
                <option value="1">SI</option>
                <option value="0">NO</option>
              </select>
            </div>
            <div class="form-group">
              <label for="inputMsgWsp"><strong>Mensaje Whatsapp</strong></label>
              <textarea name="msg_wsp" id="inputMsgWsp" rows="3" class="form-control form-control-sm"></textarea>
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
              <label for="inputEsPrincipal"><strong>¿Es Principal?</strong></label>
              <select id="inputEsPrincipal" name="es_principal" class="form-control form-control-sm">
                <option value="">-- SELECCIONAR --</option>
                <option value="1">SI</option>
                <option value="0" selected>NO</option>
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

<div id="seccionFrmEditarTelefono" class="mb-3" style="display: none;">
  <div class="row">
    <div class="col-lg-6 col-12">
      <div class="card">
        <div class="card-header bg-primary text-white"><strong>Editar Télefono</strong></div>
        <div class="card-body">
          <form id="frmEditarTelefono">
            <input type="hidden" name="id_usuario" id="_inputIdUsuario" value="<?= session('actualUserUpdate.id')  ?>">
            <input type="hidden" id="inputId">
            <div class="form-group">
              <label for="_inputIdTipoTelefono"><strong>Tipo</strong></label>
              <select id="_inputIdTipoTelefono" name="id_tipo_telefono" class="form-control form-control-sm">
                <option value="" selected>-- SELECCIONAR --</option>
              </select>
            </div>
            <div class="form-group">
              <label for="_inputPrefijo"><strong>Prefijo</strong></label>
              <input type="text" id="_inputPrefijo" name="prefijo" class="form-control form-control-sm">
            </div>
            <div class="form-group">
              <label for="_inputNumero"><strong>Número</strong></label>
              <input type="text" id="_inputNumero" name="numero" class="form-control form-control-sm">
            </div>
            <div class="form-group">
              <label for="_inputEsWsp"><strong>¿Es Whatsapp?</strong></label>
              <select id="_inputEsWsp" name="es_wsp" class="form-control form-control-sm">
                <option value="" selected>-- SELECCIONAR --</option>
                <option value="1">SI</option>
                <option value="0">NO</option>
              </select>
            </div>
            <div class="form-group">
              <label for="_inputMsgWsp"><strong>Mensaje Whatsapp</strong></label>
              <textarea name="msg_wsp" id="_inputMsgWsp" rows="3" class="form-control form-control-sm"></textarea>
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
              <label for="_inputEsPrincipal"><strong>¿Es Principal?</strong></label>
              <select id="_inputEsPrincipal" name="es_principal" class="form-control form-control-sm">
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
<script src="<?= base_url('js/API/TipoTelefonoAPI.js') ?>"></script>
<script src="<?= base_url('js/API/TelefonoAPI.js') ?>"></script>
<script>
  $(document).ready(function() {

    const TIPO_TELEFONO_API = new TipoTelefonoAPI();
    const TELEFONO_API = new TelefonoAPI();

    function llenarInputTipoTelefono() {
      TIPO_TELEFONO_API.index().then(json => {
        console.log(json);
        let template = "";
        json.data.forEach(element => {
          template += `<option value="${element.id}">${element.descripcion}</option>`;
        });
        inputIdTipoTelefono.innerHTML += template;
        _inputIdTipoTelefono.innerHTML += template;
      });
    }

    llenarInputTipoTelefono();

    const DATATABLE_TELEFONOS = $('#tablaTelefonos').DataTable({
      searching: false,
      ordering: false,
      processing: true,
      serverSide: true,
      ajax: {
        url: `${BASE_URL}/api/v1/telefonos`,
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
          data: "descripcion_tipo_telefono"
        },
        {
          data: "prefijo"
        },
        {
          data: "numero"
        },
        {
          defaultContent: "",
          render: function(data, type, row, meta) {
            if (type === 'display') {
              return (row.es_wsp === '1') ? 'SI' : 'NO';
            }
          }
        },
        {
          data: "msg_wsp"
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
    $('#tablaTelefonos tbody').on('click', '.btn-acciones', function() {
      fila = Utils.obtenerFilaSeleccionada(DATATABLE_TELEFONOS, this);
    });

    frmRegistrarTelefono.addEventListener('submit', function(e) {
      e.preventDefault();
      btnGuardar.disabled = true;

      let telefono = new FormData(this);

      TELEFONO_API.create(telefono).then(json => {
        btnGuardar.disabled = false;
        if (json.status === 200) {
          alertify.success('Guardado');
          DATATABLE_TELEFONOS.ajax.reload();
          Utils.resetearFormulario(frmRegistrarTelefono, null);
          Utils.toggleSeccion(seccionTablaTelefonos, seccionFrmRegistrarTelefono);
        } else if (json.status === 400) {
          Utils.mostrarValidaciones(json, frmRegistrarTelefono);
        }
      })
    });

    frmEditarTelefono.addEventListener('submit', function(e) {
      e.preventDefault();
      _btnGuardar.disabled = true;

      let telefono = new FormData(this);
      telefono.append('_method', 'PUT');

      TELEFONO_API.update(inputId.value, telefono).then(json => {
        console.log(json);
        _btnGuardar.disabled = false;
        if (json.status === 200) {
          alertify.success('Guardado');
          DATATABLE_TELEFONOS.ajax.reload();
          Utils.resetearFormulario(frmEditarTelefono, null);
          Utils.toggleSeccion(seccionTablaTelefonos, seccionFrmEditarTelefono);
        } else if (json.status === 400) {
          Utils.mostrarValidaciones(json, frmEditarTelefono);
        }
      })
    });

    btnEditar.addEventListener('click', function(e) {
      _btnGuardar.disabled = true;
      $('#modalAcciones').modal('hide');
      Utils.toggleSeccion(seccionTablaTelefonos, seccionFrmEditarTelefono);

      TELEFONO_API.show(fila.id).then(json => {
        _btnGuardar.disabled = false;
        inputId.value = json.data.id;
        $('#_inputIdTipoTelefono').val(json.data.id_tipo_telefono);
        _inputPrefijo.value = json.data.prefijo;
        _inputNumero.value = json.data.numero;
        $('#_inputEsWsp').val(json.data.es_wsp);
        _inputMsgWsp.value = json.data.msg_wsp;
        $('#_inputEsPublico').val(json.data.es_publico);
        $('#_inputEsPrincipal').val(json.data.es_principal);
      });
    });

    btnEliminar.addEventListener('click', function() {
      $('#modalAcciones').modal('hide');
      alertify.confirm("Eliminar", "¿Esta seguro de eliminar?",
        function() {
          TELEFONO_API.delete(fila.id).then(json => {
            if (json.status === 200) {
              DATATABLE_TELEFONOS.ajax.reload();
              alertify.success('Eliminado');
            } else if (json.status === 404) {
              alert(`No se encontro un telefono con el id: ${fila.id}`);
            }
          });
        },
        function() {});
    });

    btnNuevoTelefono.addEventListener('click', function(e) {
      Utils.toggleSeccion(seccionTablaTelefonos, seccionFrmRegistrarTelefono);
    });

    btnVolverFrmRegistrar.addEventListener('click', function(e) {
      e.preventDefault();
      Utils.toggleSeccion(seccionTablaTelefonos, seccionFrmRegistrarTelefono);
      Utils.resetearFormulario(frmRegistrarTelefono, null);
    });

    btnVolverFrmEditar.addEventListener('click', function(e) {
      e.preventDefault();
      Utils.toggleSeccion(seccionTablaTelefonos, seccionFrmEditarTelefono);
      Utils.resetearFormulario(frmEditarTelefono, null);
    });
  });
</script>
<?= $this->endSection() ?>