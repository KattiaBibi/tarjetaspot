<?= $this->extend('layouts/startbootstrap-sb-admin-gh-pages') ?>

<?= $this->section('content') ?>
<h1 class="mt-4">Redes Sociales</h1>
<ol class="breadcrumb mb-4">
  <li class="breadcrumb-item"><a href="<?= base_url('inicio') ?>">Inicio</a></li>
  <li class="breadcrumb-item">Contacto</li>
  <li class="breadcrumb-item active">Redes Sociales</li>
</ol>

<div id="seccionTablaRedesSociales">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header bg-primary text-white"><strong>Tabla de Redes Sociales</strong></div>
        <div class="card-body">
          <div class="mb-3">
            <button class="btn btn-success btn-sm" id="btnNuevaRedSocial">NUEVA RED SOCIAL</button>
          </div>
          <div class="table-responsive">
            <table class="table table-bordered table-sm text-center" id="tablaRedesSociales" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Tipo</th>
                  <th>Url</th>
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


<div id="seccionFrmRegistrarRedSocial" class="mb-3" style="display: none;">
  <div class="row">
    <div class="col-lg-6 col-12">
      <div class="card">
        <div class="card-header bg-primary text-white"><strong>Registrar Red Social</strong></div>
        <div class="card-body">
          <form id="frmRegistrarRedSocial">
            <input type="hidden" name="id_usuario" id="inputIdUsuario" value="<?= session('actualUserUpdate.id') ?>">
            <div class="form-group">
              <label for="inputIdTipoRedSocial"><strong>Tipo</strong></label>
              <select id="inputIdTipoRedSocial" name="id_tipo_red_social" class="form-control form-control-sm">
                <option value="" selected>-- SELECCIONAR --</option>
              </select>
            </div>
            <div class="form-group">
              <label for="inputUrl"><strong>Url</strong></label>
              <input type="text" id="inputUrl" name="url" class="form-control form-control-sm">
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

<div id="seccionFrmEditarRedSocial" class="mb-3" style="display: none;">
  <div class="row">
    <div class="col-lg-6 col-12">
      <div class="card">
        <div class="card-header bg-primary text-white"><strong>Editar Red Social</strong></div>
        <div class="card-body">
          <form id="frmEditarRedSocial">
            <input type="hidden" name="id_usuario" id="_inputIdUsuario" value="<?= session('actualUserUpdate.id') ?>">
            <input type="hidden" id="inputId">
            <div class="form-group">
              <label for="inputIdTipoRedSocial"><strong>Tipo</strong></label>
              <select id="_inputIdTipoRedSocial" name="id_tipo_red_social" class="form-control form-control-sm">
                <option value="">-- SELECCIONAR --</option>
              </select>
            </div>
            <div class="form-group">
              <label for="inputUrl"><strong>Url</strong></label>
              <input type="text" id="_inputUrl" name="url" class="form-control form-control-sm">
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
<script src="<?= base_url('js/API/TipoRedSocialAPI.js') ?>"></script>
<script src="<?= base_url('js/API/RedSocialAPI.js') ?>"></script>
<script>
  $(document).ready(function() {

    const RED_SOCIAL_API = new RedSocialAPI();
    const TIPO_RED_SOCIAL_API = new TipoRedSocialAPI();

    function llenarInputTipoRedSocial() {
      TIPO_RED_SOCIAL_API.index().then(json => {
        console.log(json);
        let template = "";
        json.data.forEach(element => {
          template += `<option value="${element.id}">${element.descripcion}</option>`;
        });
        inputIdTipoRedSocial.innerHTML += template;
        _inputIdTipoRedSocial.innerHTML += template;
      });
    }

    llenarInputTipoRedSocial();

    const DATATABLE_REDES_SOCIALES = $('#tablaRedesSociales').DataTable({
      searching: false,
      ordering: false,
      processing: true,
      serverSide: true,
      ajax: {
        url: `${BASE_URL}/api/v1/redes-sociales`,
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
          data: "descripcion_tipo_red_social"
        },
        {
          defaultContent: "",
          render: function(data, type, row, meta) {
            if (type === 'display') {
              return `<a href="${row.url}" target="_blank">${row.url}</a>`;
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
    $('#tablaRedesSociales tbody').on('click', '.btn-acciones', function() {
      fila = Utils.obtenerFilaSeleccionada(DATATABLE_REDES_SOCIALES, this);
    });

    frmRegistrarRedSocial.addEventListener('submit', function(e) {
      e.preventDefault();
      btnGuardar.disabled = true;

      let redSocial = new FormData(this);

      RED_SOCIAL_API.create(redSocial).then(json => {
        btnGuardar.disabled = false;
        if (json.status === 200) {
          alertify.success('Guardado');
          DATATABLE_REDES_SOCIALES.ajax.reload();
          Utils.resetearFormulario(frmRegistrarRedSocial, null);
          Utils.toggleSeccion(seccionTablaRedesSociales, seccionFrmRegistrarRedSocial);
        } else if (json.status === 400) {
          Utils.mostrarValidaciones(json, frmRegistrarRedSocial);
        }
      })
    });

    frmEditarRedSocial.addEventListener('submit', function(e) {
      e.preventDefault();
      _btnGuardar.disabled = true;

      let redSocial = new FormData(this);
      redSocial.append('_method', 'PUT');

      RED_SOCIAL_API.update(inputId.value, redSocial).then(json => {
        console.log(json);
        _btnGuardar.disabled = false;
        if (json.status === 200) {
          alertify.success('Guardado');
          DATATABLE_REDES_SOCIALES.ajax.reload();
          Utils.resetearFormulario(frmEditarRedSocial, null);
          Utils.toggleSeccion(seccionTablaRedesSociales, seccionFrmEditarRedSocial);
        } else if (json.status === 400) {
          Utils.mostrarValidaciones(json, frmEditarRedSocial);
        }
      })
    });

    btnNuevaRedSocial.addEventListener('click', function(e) {
      Utils.toggleSeccion(seccionTablaRedesSociales, seccionFrmRegistrarRedSocial);
    });

    btnEditar.addEventListener('click', function(e) {
      _btnGuardar.disabled = true;
      $('#modalAcciones').modal('hide');
      Utils.toggleSeccion(seccionTablaRedesSociales, seccionFrmEditarRedSocial);

      RED_SOCIAL_API.show(fila.id).then(json => {
        _btnGuardar.disabled = false;
        inputId.value = json.data.id;
        $('#_inputIdTipoRedSocial').val(json.data.id_tipo_red_social);
        _inputUrl.value = json.data.url;
        $('#_inputEsPublico').val(json.data.es_publico);
      });
    });

    btnEliminar.addEventListener('click', function() {
      $('#modalAcciones').modal('hide');
      alertify.confirm("Eliminar", "¿Esta seguro de eliminar?",
        function() {
          RED_SOCIAL_API.delete(fila.id).then(json => {
            if (json.status === 200) {
              DATATABLE_REDES_SOCIALES.ajax.reload();
              alertify.success('Eliminado');
            } else if (json.status === 404) {
              alert(`No se encontro una red social con el id: ${fila.id}`);
            }
          });
        },
        function() {});
    });

    btnVolverFrmRegistrar.addEventListener('click', function(e) {
      e.preventDefault();
      Utils.toggleSeccion(seccionTablaRedesSociales, seccionFrmRegistrarRedSocial);
      Utils.resetearFormulario(frmRegistrarRedSocial, null);
    });

    btnVolverFrmEditar.addEventListener('click', function(e) {
      e.preventDefault();
      Utils.toggleSeccion(seccionTablaRedesSociales, seccionFrmEditarRedSocial);
      Utils.resetearFormulario(frmEditarRedSocial, null);
    });
  });
</script>
<?= $this->endSection() ?>