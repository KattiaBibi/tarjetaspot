<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="icon" href="<?= base_url('images/logo.png') ?>" type="image/x-icon">
  <title>Registrate</title>
  <link href="<?= base_url('css/styles.css') ?>" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
  <div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
      <main>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5">
              <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                  <h3 class="text-center font-weight-light my-4">Registrate</h3>
                </div>
                <div class="card-body">
                  <form id="frmRegistrarUsuario">
                    <div class="form-row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="small mb-1" for="inputNombres">Nombres</label>
                          <input class="form-control py-4" name="nombres" id="inputNombres" type="text" placeholder="Ingrese su nombre" data-label-validation="nombres" />
                          <div class="show-validation-message"></div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="small mb-1" for="inputApellidos">Apellidos</label>
                          <input class="form-control py-4" name="apellidos" id="inputApellidos" type="text" placeholder="Ingrese su apellido" data-label-validation="apellidos" />
                          <div class="show-validation-message"></div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="small mb-1" for="inputEmail">Email</label>
                      <input class="form-control py-4" name="email" id="inputEmail" type="email" aria-describedby="emailHelp" placeholder="Ingrese su email" data-label-validation="email" />
                      <div class="show-validation-message"></div>
                    </div>
                    <div class="form-row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="small mb-1" for="inputPassword">Contraseña</label>
                          <input class="form-control py-4" name="password" id="inputPassword" type="password" placeholder="Ingrese su contraseña" data-label-validation="password" />
                          <div class="show-validation-message"></div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="small mb-1" for="inputConfirmPassword">Confirmar Contraseña</label>
                          <input class="form-control py-4" name="confirm_password" id="inputConfirmPassword" type="password" placeholder="Confirmar Contraseña" data-label-validation="confirm_password" />
                          <div class="show-validation-message"></div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                      <a class="small" href="<?= base_url('ingresar') ?>">Ingresar</a>
                      <button type="submit" form="frmRegistrarUsuario" id="btnGuardar" class="btn btn-primary">
                        Registrarse
                        <img src="https://c.tenor.com/I6kN-6X7nhAAAAAj/loading-buffering.gif" class="loader btnGuardarUsuario" style="width: 18px; display: none;">
                      </button>
                    </div>

                    <div class="validaciones mt-2"></div>
                  </form>
                </div>
                <div class="card-footer text-center">
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
    <div id="layoutAuthentication_footer">
      <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid">
          <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Todos los derechos reservados &copy; compusistel.com <?= date('Y') ?></div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="js/scripts.js"></script>

  <script>
    const BASE_URL = '<?= base_url() ?>';
  </script>

  <script src="<?= base_url('js/Utils.js') ?>"></script>
  <script src="<?= base_url('js/API/AccesoAPI.js') ?>"></script>

  <script>
    $(document).ready(function() {

      frmRegistrarUsuario.addEventListener('submit', function(e) {
        e.preventDefault();
        let data = new FormData(this);
        data.append('estado', 1);

        btnGuardar.disabled = true;
        document.querySelector('.loader.btnGuardarUsuario').style.display = 'inline-block';

        axios.post(`${BASE_URL}/api/v1/registrate`, data)
          .then(function(response) {
            alertify.success('¡Registrado con exito!');
            window.location.replace('ingresar');
          })
          .catch(function(error) {
            console.log(error);
            if (error.response && error.response.status === 400) {
              Utils.showValidationMessages('#frmRegistrarUsuario', error.response.data.messages);
            }
          })
          .then(() => {
            btnGuardar.disabled = false;
            document.querySelector('.loader.btnGuardarUsuario').style.display = 'none';
          });

      });

    });
  </script>
</body>

</html>