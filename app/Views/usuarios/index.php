<?= $this->extend('layouts/startbootstrap-sb-admin-gh-pages') ?>
<?= $this->section('content') ?>
<h1 class="mt-4">Usuarios</h1>
<ol class="breadcrumb mb-4">
  <li class="breadcrumb-item"><a href="<?= base_url('inicio') ?>">Inicio</a></li>
  <li class="breadcrumb-item active">Usuarios</li>
</ol>

<div id="seccionTablaUsuarios">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header bg-primary text-white"><strong>Tabla de Usuarios</strong></div>
        <div class="card-body">
          <?php if (session('usuarioLogueado.rol') === 'administrador') : ?>
            <div class="mb-3">
              <button class="btn btn-success btn-sm" id="btnNuevoUsuario">NUEVO USUARIO</button>
            </div>
          <?php endif; ?>
          <div class="table-responsive">
            <table class="table table-bordered table-sm text-center" id="tablaUsuarios" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Empresa</th>
                  <th>Email</th>
                  <th>Nombres</th>
                  <th>Apellidos</th>
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

<div id="seccionFrmRegistrarUsuario" class="mb-3" style="display: none;">
  <div class="row">
    <div class="col-lg-6 col-12">
      <div class="card">
        <div class="card-header bg-primary text-white"><strong>Registrar Usuario</strong></div>
        <div class="card-body">
          <form id="frmRegistrarUsuario">
            <div class="form-group">
              <label for="inputEmpresa"><strong>Empresa</strong></label>
              <select name="id_empresa" id="inputEmpresa" class="form-control form-control-sm">
                <option value="" selected>-- SELECCIONAR --</option>
              </select>
            </div>
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="small mb-1" for="inputNombres">Nombres</label>
                  <input class="form-control py-4" name="nombres" id="inputNombres" type="text" placeholder="Ingrese su nombre" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="small mb-1" for="inputApellidos">Apellidos</label>
                  <input class="form-control py-4" name="apellidos" id="inputApellidos" type="text" placeholder="Ingrese su apellido" />
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="small mb-1" for="inputEmail">Email</label>
              <input class="form-control py-4" name="email" id="inputEmail" type="email" aria-describedby="emailHelp" placeholder="Ingrese su email" />
            </div>
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="small mb-1" for="inputPassword">Contraseña</label>
                  <input class="form-control py-4" name="password" id="inputPassword" type="password" placeholder="Ingrese su contraseña" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="small mb-1" for="inputConfirmPassword">Confirmar Contraseña</label>
                  <input class="form-control py-4" name="confirm_password" id="inputConfirmPassword" type="password" placeholder="Confirmar Contraseña" />
                </div>
              </div>
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

<div id="seccionFrmEditarUsuario" class="mb-3" style="display: none;">
  <div class="row">
    <div class="col-lg-6 col-12">
      <div class="card">
        <div class="card-header bg-primary text-white"><strong>Registrar Usuario</strong></div>
        <div class="card-body">
          <form id="frmEditarUsuario">
            <input type="hidden" id="_inputId">
            <div class="form-group">
              <label for="_inputEmpresa"><strong>Empresa</strong></label>
              <select name="id_empresa" id="_inputEmpresa" class="form-control form-control-sm">
              </select>
            </div>
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="small mb-1" for="_inputNombres">Nombres</label>
                  <input class="form-control py-4" name="nombres" id="_inputNombres" type="text" placeholder="Ingrese su nombre" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="small mb-1" for="_inputApellidos">Apellidos</label>
                  <input class="form-control py-4" name="apellidos" id="_inputApellidos" type="text" placeholder="Ingrese su apellido" />
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="small mb-1" for="_inputEmail">Email</label>
              <input class="form-control py-4" name="email" id="_inputEmail" type="email" aria-describedby="emailHelp" placeholder="Ingrese su email" />
            </div>
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="small mb-1" for="_inputPassword">Contraseña</label>
                  <input class="form-control py-4" name="password" id="_inputPassword" type="password" placeholder="Solo si desea modificar" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="small mb-1" for="_inputConfirmPassword">Confirmar Contraseña</label>
                  <input class="form-control py-4" name="confirm_password" id="_inputConfirmPassword" type="password" placeholder="Solo si desea modificar" />
                </div>
              </div>
            </div>

            <div class="form-group" style="display: <?= (session('usuarioLogueado.rol') === 'administrador') ? 'block' : 'none'; ?>">
              <label for="_inputEstado"><strong>Estado</strong></label>
              <select id="_inputEstado" name="estado" class="form-control form-control-sm">
                <option value="">-- SELECCIONAR --</option>
                <option value="1" selected>ACTIVO</option>
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
        <button class="btn btn-primary btn-sm btn-block" id="btnEditar">Editar</button>
        <button class="btn btn-primary btn-sm btn-block" id="btnEdicionCompleta">Edición Completa</button>
        <button class="btn btn-primary btn-sm btn-block" id="btnVerTarjeta">Ver Tarjeta</button>
        <?php if (session('usuarioLogueado.rol') === 'admnistrador') : ?>
          <button class="btn btn-primary btn-sm btn-block" id="btnEliminar">Eliminar</button>
        <?php endif; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('scripts') ?>
<script src="<?= base_url('js/API/UsuarioAPI.js') ?>"></script>
<script src="<?= base_url('js/API/EmpresaAPI.js') ?>"></script>
<script>
  $(document).ready(function() {
    const USUARIO_API = new UsuarioAPI();
    const EMPRESA_API = new EmpresaAPI();

    EMPRESA_API.searchByNombre('#inputEmpresa');
    EMPRESA_API.searchByNombre('#_inputEmpresa');

    const DATATABLE_USUARIOS = $('#tablaUsuarios').DataTable({
      searching: false,
      ordering: false,
      processing: true,
      serverSide: true,
      ajax: {
        url: `${BASE_URL}/api/v1/usuarios`,
        type: "GET",
        data: function(d) {
          return $.extend({}, d, {
            "filters": {
              "rol": "usuario",
            }
          });
        }
      },
      columns: [{
          data: "id"
        },
        {
          data: "nombre_empresa"
        },
        {
          data: "email"
        },
        {
          data: "nombres"
        },
        {
          data: "apellidos"
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
    $('#tablaUsuarios tbody').on('click', '.btn-acciones', function() {
      fila = Utils.obtenerFilaSeleccionada(DATATABLE_USUARIOS, this);
    });

    frmRegistrarUsuario.addEventListener('submit', function(e) {
      e.preventDefault();
      btnGuardar.disabled = true;

      let usuario = new FormData(this);

      USUARIO_API.create(usuario).then(json => {
        btnGuardar.disabled = false;
        if (json.status === 200) {
          alertify.success('Guardado');
          DATATABLE_USUARIOS.ajax.reload();
          Utils.resetearFormulario(frmRegistrarUsuario, null);
          Utils.toggleSeccion(seccionTablaUsuarios, seccionFrmRegistrarUsuario);
        } else if (json.status === 400) {
          Utils.mostrarValidaciones(json, frmRegistrarUsuario);
        }
      });
    });

    btnEditar.addEventListener('click', function(e) {
      _btnGuardar.disabled = true;
      $('#modalAcciones').modal('hide');
      Utils.toggleSeccion(seccionTablaUsuarios, seccionFrmEditarUsuario);

      USUARIO_API.show(fila.id).then(json => {
        _btnGuardar.disabled = false;
        _inputId.value = json.data.id;
        if (json.data.id_empresa != null) {
          Utils.establecerOpcionSelect2("#_inputEmpresa", {
            id: json.data.id_empresa,
            text: json.data.nombre_empresa
          });
        }
        _inputNombres.value = json.data.nombres;
        _inputApellidos.value = json.data.apellidos;
        _inputEmail.value = json.data.email;
        $('#_inputEstado').val(json.data.estado);
      });
    });

    frmEditarUsuario.addEventListener('submit', function(e) {
      e.preventDefault();
      _btnGuardar.disabled = true;

      let usuario = new FormData(this);
      usuario.append('_method', 'PUT');

      USUARIO_API.update(_inputId.value, usuario).then(json => {
        _btnGuardar.disabled = false;
        if (json.status === 200) {
          alertify.success('Guardado');
          DATATABLE_USUARIOS.ajax.reload();
          Utils.resetearFormulario(frmEditarUsuario, null);
          Utils.toggleSeccion(seccionTablaUsuarios, seccionFrmEditarUsuario);
        } else if (json.status === 400) {
          Utils.mostrarValidaciones(json, frmEditarUsuario);
        }
      });
    });

    $('#btnEliminar').on('click', function() {
      $('#modalAcciones').modal('hide');
      alertify.confirm("Eliminar", "¿Esta seguro de eliminar?",
        function() {
          USUARIO_API.delete(fila.id).then(json => {
            if (json.status === 200) {
              DATATABLE_USUARIOS.ajax.reload();
              alertify.success('Eliminado');
            } else if (json.status === 404) {
              alert(`No se encontro un usuario con el id: ${fila.id}`);
            }
          });
        },
        function() {});
    });

    btnEdicionCompleta.addEventListener('click', function(e) {
      window.location.replace(`/usuario/set-actual-user-update/${fila.id}`);
    });

    btnVerTarjeta.addEventListener('click', function(e) {
      $('#modalAcciones').modal('hide');
      window.open(`${BASE_URL}/usuario/ver-tarjeta/${fila.id}`, '_blank');
    });

    $('#btnNuevoUsuario').on('click', function(e) {
      Utils.toggleSeccion(seccionTablaUsuarios, seccionFrmRegistrarUsuario);
    });

    btnVolverFrmRegistrar.addEventListener('click', function(e) {
      e.preventDefault();
      Utils.toggleSeccion(seccionTablaUsuarios, seccionFrmRegistrarUsuario);
      Utils.resetearFormulario(frmRegistrarUsuario, ['#inputEmpresa']);
    });

    btnVolverFrmEditar.addEventListener('click', function(e) {
      e.preventDefault();
      Utils.toggleSeccion(seccionTablaUsuarios, seccionFrmEditarUsuario);
      Utils.resetearFormulario(frmEditarUsuario, ['#_inputEmpresa']);
    });

  });
</script>
<?= $this->endSection(); ?>