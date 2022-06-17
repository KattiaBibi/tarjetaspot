<?= $this->extend('layouts/startbootstrap-sb-admin-gh-pages') ?>

<?= $this->section('content') ?>
<h1 class="mt-4">Documentos</h1>
<ol class="breadcrumb mb-4">
  <li class="breadcrumb-item"><a href="<?= base_url('inicio') ?>">Inicio</a></li>
  <li class="breadcrumb-item">Multimedia</li>
  <li class="breadcrumb-item active">Documentos</li>
</ol>

<div id="seccionTablaDocumentos">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header bg-primary text-white"><strong>Tabla de Documentos</strong></div>
        <div class="card-body">
          <div class="mb-3">
            <button class="btn btn-success btn-sm" id="btnNuevoDocumento">NUEVO DOCUMENTO</button>
          </div>
          <div class="table-responsive">
            <table class="table table-bordered table-sm text-center" id="tablaDocumentos" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Url</th>
                  <th style="width: 60%;">Descripción</th>
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


<div id="seccionFrmRegistrarDocumento" class="mb-3" style="display: none;">
  <div class="row">
    <div class="col-lg-6 col-12">
      <div class="card">
        <div class="card-header bg-primary text-white"><strong>Registrar Documento</strong></div>
        <div class="card-body">
          <form id="frmRegistrarDocumento">
            <input type="hidden" name="id_usuario" value="<?= session('id') ?>">
            <div class="form-group">
              <label for="archivo"><strong>Documento</strong></label>
              <input type="file" name="archivo" id="archivo" class="form-control">
            </div>
            <div class="form-group">
              <label for="inputDescripcion">Descripción</label>
              <textarea class="form-control form-control-sm" id="inputDescripcion" name="descripcion" rows="3"></textarea>
            </div>
            <div class="form-group">
              <label for="inputEsPublico"><strong>¿Es Público?</strong></label>
              <select id="inputEsPublico" name="es_publico" class="form-control form-control-sm">
                <option value="" selected>-- Seleccionar --</option>
                <option value="1">SI</option>
                <option value="0">NO</option>
              </select>
            </div>
            <div class="form-group">
              <input type="submit" value="Guardar" id="btnGuardar" class="btn btn-success btn-sm">
              <button class="btn btn-secondary btn-sm" id="btnVolverFrmRegistrar">Volver</button>
            </div>
            <div class="validaciones mt-2"></div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="seccionFrmEditarDocumento" class="mb-3" style="display: none;">
  <div class="row">
    <div class="col-lg-6 col-12">
      <div class="card">
        <div class="card-header bg-primary text-white"><strong>Editar Documento</strong></div>
        <div class="card-body">
          <form id="frmEditarDocumento">
            <input type="hidden" id="inputId">
            <div class="form-group">
              <label for="_archivo"><strong>Documento</strong></label>
              <input type="file" name="archivo" id="_archivo">
              <div class="mt-2">
                <a href="#" id="linkDocumento" target="_blank">Ver Documento Guardado</a>
              </div>
            </div>
            <div class="form-group">
              <label for="_inputDescripcion">Descripción</label>
              <textarea class="form-control form-control-sm" id="_inputDescripcion" name="descripcion" rows="3"></textarea>
            </div>
            <div class="form-group">
              <label for="_inputEsPublico"><strong>¿Es Público?</strong></label>
              <select id="_inputEsPublico" name="es_publico" class="form-control form-control-sm">
                <option value="1">SI</option>
                <option value="0">NO</option>
              </select>
            </div>
            <div class="form-group">
              <input type="submit" value="Guardar" id="_btnGuardar" class="btn btn-success btn-sm">
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
<script src="<?= base_url('js/API/DocumentoAPI.js') ?>"></script>
<script>
  $(document).ready(function() {

    const DOCUMENTO_API = new DocumentoAPI();

    const DATATABLE_DOCUMENTOS = $('#tablaDocumentos').DataTable({
      searching: false,
      ordering: false,
      processing: true,
      serverSide: true,
      ajax: {
        url: `${BASE_URL}/api/v1/documentos`,
        type: "GET",
        data: function(d) {
          return $.extend({}, d, {
            "filters": {
              "id_usuario": "<?= session('id') ?>",
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
              return `<a href="${BASE_URL}/${row.url}" target="_blank">Ver documento</a>`;
            }
          }
        },
        {
          data: "descripcion"
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
    $('#tablaDocumentos tbody').on('click', '.btn-acciones', function() {
      fila = Utils.obtenerFilaSeleccionada(DATATABLE_DOCUMENTOS, this);
    });

    frmRegistrarDocumento.addEventListener('submit', function(e) {
      e.preventDefault();
      btnGuardar.disabled = true;

      let documento = new FormData(this);

      DOCUMENTO_API.create(documento).then(json => {
        btnGuardar.disabled = false;
        if (json.status === 200) {
          alertify.success('Guardado');
          DATATABLE_DOCUMENTOS.ajax.reload();
          Utils.resetearFormulario(frmRegistrarDocumento, null);
          Utils.toggleSeccion(seccionTablaDocumentos, seccionFrmRegistrarDocumento);
        } else if (json.status === 400) {
          Utils.mostrarValidaciones(json, frmRegistrarDocumento);
        }
      })
    });

    frmEditarDocumento.addEventListener('submit', function(e) {
      e.preventDefault();
      _btnGuardar.disabled = true;

      let documento = new FormData(this);

      DOCUMENTO_API.update(inputId.value, documento).then(json => {
        console.log(json);
        _btnGuardar.disabled = false;
        if (json.status === 200) {
          alertify.success('Guardado');
          DATATABLE_DOCUMENTOS.ajax.reload();
          Utils.resetearFormulario(frmEditarDocumento, null);
          Utils.toggleSeccion(seccionTablaDocumentos, seccionFrmEditarDocumento);
        } else if (json.status === 400) {
          Utils.mostrarValidaciones(json, frmEditarDocumento);
        }
      })
    });

    btnEditar.addEventListener('click', function(e) {
      _btnGuardar.disabled = true;
      $('#modalAcciones').modal('hide');
      Utils.toggleSeccion(seccionTablaDocumentos, seccionFrmEditarDocumento);

      DOCUMENTO_API.show(fila.id).then(json => {
        _btnGuardar.disabled = false;
        inputId.value = json.data.id;
        linkDocumento.setAttribute('href', `${BASE_URL}/${json.data.url}`);
        _inputDescripcion.value = json.data.descripcion;
        $('#_inputEsPublico').val(json.data.es_publico);
      });
    });

    btnEliminar.addEventListener('click', function() {
      $('#modalAcciones').modal('hide');
      alertify.confirm("Eliminar", "¿Esta seguro de eliminar?",
        function() {
          DOCUMENTO_API.delete(fila.id).then(json => {
            if (json.status === 200) {
              DATATABLE_DOCUMENTOS.ajax.reload();
              alertify.success('Eliminado');
            } else if (json.status === 404) {
              alert(`No se encontro video con el id: ${fila.id}`);
            }
          });
        },
        function() {});
    });

    btnNuevoDocumento.addEventListener('click', function(e) {
      Utils.toggleSeccion(seccionTablaDocumentos, seccionFrmRegistrarDocumento);
    });

    btnVolverFrmRegistrar.addEventListener('click', function(e) {
      e.preventDefault();
      Utils.toggleSeccion(seccionTablaDocumentos, seccionFrmRegistrarDocumento);
      Utils.resetearFormulario(frmRegistrarDocumento, null);
    });

    btnVolverFrmEditar.addEventListener('click', function(e) {
      e.preventDefault();
      Utils.toggleSeccion(seccionTablaDocumentos, seccionFrmEditarDocumento);
      Utils.resetearFormulario(frmEditarDocumento, null);
    });
  });
</script>
<?= $this->endSection() ?>