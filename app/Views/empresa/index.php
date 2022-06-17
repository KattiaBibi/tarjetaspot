<?= $this->extend('layouts/startbootstrap-sb-admin-gh-pages') ?>
<?= $this->section('content') ?>
<h1 class="mt-4">Empresas</h1>
<ol class="breadcrumb mb-4">
  <li class="breadcrumb-item"><a href="<?= base_url('inicio') ?>">Inicio</a></li>
  <li class="breadcrumb-item active">Empresas</li>
</ol>

<div id="seccionTablaEmpresa">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header bg-primary text-white"><strong>Tabla de Empresas</strong></div>
        <div class="card-body">
          <div class="mb-3">
            <button class="btn btn-success btn-sm" id="btnNuevoEmpresa">NUEVA EMPRESA</button>
          </div>
          <div class="table-responsive">
            <table class="table table-bordered table-sm text-center" id="tablaEmpresas" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nombre</th>
                  <th>Slug</th>
                  <th>Logo</th>
                  <th style="text-align: center;">Color Fondo</th>
                  <th>Estado</th>
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

<div id="seccionFrmRegistrarEmpresa" class="mb-3" style="display: none;">
  <div class="row">
    <div class="col-lg-6 col-12">
      <div class="card">
        <div class="card-header bg-primary text-white"><strong>Registrar Empresa</strong></div>
        <div class="card-body">
          <form id="frmRegistrarEmpresa">
            <div class="form-group">
              <label for="inputNombre">Nombre</label>
              <input class="form-control form-control-sm" name="nombre" id="inputNombre" type="text" />
            </div>
            <div class="form-group">
              <label for="inputSlug">Slug</label>
              <input class="form-control form-control-sm" name="slug" id="inputSlug" type="text" />
            </div>
            <div class="form-group">
              <label for="inputLogo"><strong>Logo</strong></label>
              <input type="file" name="logo" id="inputLogo" class="form-control">
              <div class="text-center py-3">
                <img id="vistaPreviaImagen" src="" alt="Vista Previa" style="max-width:250px" />
              </div>
            </div>
            <div class="form-group">
              <label for="inputColorDeFondo"><strong>Color de Fondo</strong> (Hexadecimal)</label>
              <input type="color" name="background_color" id="inputColorDeFondo" class="form-control form-control-sm">
            </div>
            <div class="form-group">
              <label for="inputEstado"><strong>Estado</strong></label>
              <select id="inputEstado" name="estado" class="form-control form-control-sm">
                <option value="">-- SELECCIONAR --</option>
                <option value="1" selected>ACTIVO</option>
                <option value="0">INACTIVO</option>
              </select>
            </div>
            <div class="form-group mt-4 mb-0">
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

<div id="seccionFrmEditarEmpresa" class="mb-3" style="display: none;">
  <div class="row">
    <div class="col-lg-6 col-12">
      <div class="card">
        <div class="card-header bg-primary text-white"><strong>Editar Empresa</strong></div>
        <div class="card-body">
          <form id="frmEditarEmpresa">
            <input type="hidden" id="_inputId">
            <div class="form-group">
              <label for="_inputNombre">Nombre</label>
              <input class="form-control" name="nombre" id="_inputNombre" type="text" />
            </div>
            <div class="form-group">
              <label for="_inputSlug">Slug</label>
              <input class="form-control" name="slug" id="_inputSlug" type="text" />
            </div>
            <div class="form-group">
              <label for="_inputLogo"><strong>Logo</strong></label>
              <input type="file" name="logo" id="_inputLogo" class="form-control">
              <div class="text-center py-3">
                <img id="_vistaPreviaImagen" src="" alt="Vista Previa" style="max-width:250px" />
              </div>
            </div>
            <div class="form-group">
              <label for="_inputColorDeFondo"><strong>Color de Fondo</strong> (Hexadecimal)</label>
              <input type="color" name="background_color" id="_inputColorDeFondo" class="form-control form-control-sm">
            </div>
            <div class="form-group">
              <label for="_inputEstado"><strong>Estado</strong></label>
              <select id="_inputEstado" name="estado" class="form-control form-control-sm">
                <option value="" selected>-- SELECCIONAR --</option>
                <option value="1">ACTIVO</option>
                <option value="0">INACTIVO</option>
              </select>
            </div>
            <div class="form-group mt-4 mb-0">
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
        <button class="btn btn-primary btn-sm btn-block" id="btnVerAgendaProfesional">Ver Agenda Profesional</button>
        <button class="btn btn-primary btn-sm btn-block" id="btnEditar">Editar</button>
        <button class="btn btn-primary btn-sm btn-block" id="btnEliminar">Eliminar</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('scripts') ?>
<script src="<?= base_url('js/API/EmpresaAPI.js') ?>"></script>
<script>
  $(document).ready(function() {

    inputLogo.addEventListener('change', function(e) {
      Utils.readURL(this, '#vistaPreviaImagen');
    });

    _inputLogo.addEventListener('change', function(e) {
      Utils.readURL(this, '#_vistaPreviaImagen');
    });

    const EMPRESA_API = new EmpresaAPI();

    const DATATABLE_EMPRESA = $('#tablaEmpresas').DataTable({
      searching: false,
      ordering: false,
      processing: true,
      serverSide: true,
      ajax: {
        url: `${BASE_URL}/api/v1/empresas`,
        type: "GET",
        data: function(d) {
          return $.extend({}, d, {
            "filters": {
              "": "",
            }
          });
        }
      },
      columns: [{
          data: "id"
        },
        {
          data: "nombre"
        },
        {
          data: "slug"
        },
        {
          defaultContent: "",
          render: function(data, type, row, meta) {
            if (type === 'display') {
              return `<a href="${BASE_URL}/${row.logo}" target="_blank">Ver logo</a>`;
            }
          }
        },
        {
          defaultContent: "",
          render: function(data, type, row, meta) {
            if (type === 'display') {
              return `<div class="d-inline-block" style="width: 30px; height: 30px; border-radius: 50%; background-color: ${row.background_color}"></div>`;
            }
          }
        },
        {
          defaultContent: "",
          render: function(data, type, row, meta) {
            if (type === 'display') {
              return (row.estado === '1') ? 'ACTIVO' : 'INACTIVO';
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
    $('#tablaEmpresas tbody').on('click', '.btn-acciones', function() {
      fila = Utils.obtenerFilaSeleccionada(DATATABLE_EMPRESA, this);
    });

    frmRegistrarEmpresa.addEventListener('submit', function(e) {
      e.preventDefault();
      btnGuardar.disabled = true;

      let empresa = new FormData(this);

      EMPRESA_API.create(empresa).then(json => {
        btnGuardar.disabled = false;
        if (json.status === 200) {
          alertify.success('Guardado');
          DATATABLE_EMPRESA.ajax.reload();
          Utils.resetearFormulario(frmRegistrarEmpresa, null);
          Utils.toggleSeccion(seccionTablaEmpresa, seccionFrmRegistrarEmpresa);
        } else if (json.status === 400) {
          Utils.mostrarValidaciones(json, frmRegistrarEmpresa);
        }
      });
    });

    btnEditar.addEventListener('click', function(e) {
      _btnGuardar.disabled = true;
      $('#modalAcciones').modal('hide');
      Utils.toggleSeccion(seccionTablaEmpresa, seccionFrmEditarEmpresa);

      EMPRESA_API.show(fila.id).then(json => {
        _btnGuardar.disabled = false;
        _inputId.value = json.data.id;
        _inputNombre.value = json.data.nombre;
        _inputSlug.value = json.data.slug;
        _vistaPreviaImagen.setAttribute('src', `${BASE_URL}/${json.data.logo}`);
        _inputColorDeFondo.value = json.data.background_color;
        $('#_inputEstado').val(json.data.estado);
      });
    });

    frmEditarEmpresa.addEventListener('submit', function(e) {
      e.preventDefault();
      _btnGuardar.disabled = true;

      let empresa = new FormData(this);
      empresa.append('_method', 'PUT');

      EMPRESA_API.update(_inputId.value, empresa).then(json => {
        _btnGuardar.disabled = false;
        if (json.status === 200) {
          alertify.success('Guardado');
          DATATABLE_EMPRESA.ajax.reload();
          Utils.resetearFormulario(frmEditarEmpresa, null);
          Utils.toggleSeccion(seccionTablaEmpresa, seccionFrmEditarEmpresa);
        } else if (json.status === 400) {
          Utils.mostrarValidaciones(json, frmEditarEmpresa);
        }
      });
    });

    btnEliminar.addEventListener('click', function() {
      $('#modalAcciones').modal('hide');
      alertify.confirm("Eliminar", "¿Esta seguro de eliminar?",
        function() {
          EMPRESA_API.delete(fila.id).then(json => {
            if (json.status === 200) {
              DATATABLE_EMPRESA.ajax.reload();
              alertify.success('Eliminado');
            } else if (json.status === 404) {
              alert(`No se encontro un empresa con el id: ${fila.id}`);
            }
          });
        },
        function() {});
    });

    btnVerAgendaProfesional.addEventListener('click', function(e) {
      $('#modalAcciones').modal('hide');
      window.open(`${BASE_URL}/${fila.slug}`, '_blank');
    });

    btnNuevoEmpresa.addEventListener('click', function(e) {
      Utils.toggleSeccion(seccionTablaEmpresa, seccionFrmRegistrarEmpresa);
    });

    btnVolverFrmRegistrar.addEventListener('click', function(e) {
      e.preventDefault();
      vistaPreviaImagen.setAttribute('src', `#`);
      Utils.toggleSeccion(seccionTablaEmpresa, seccionFrmRegistrarEmpresa);
      Utils.resetearFormulario(frmRegistrarEmpresa, null);
    });

    btnVolverFrmEditar.addEventListener('click', function(e) {
      e.preventDefault();
      _vistaPreviaImagen.setAttribute('src', `#`);
      Utils.toggleSeccion(seccionTablaEmpresa, seccionFrmEditarEmpresa);
      Utils.resetearFormulario(frmEditarEmpresa, null);
    });

  });
</script>
<?= $this->endSection(); ?>