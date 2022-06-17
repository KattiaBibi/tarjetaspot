<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Ingresar</title>
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
                  <h3 class="text-center font-weight-light my-4">Ingresar</h3>
                </div>
                <div class="card-body">
                  <form id="frmAcceso">
                    <div class="form-group">
                      <label class="small mb-1" for="inputEmail">Email</label>
                      <input class="form-control py-4" id="inputEmail" type="email" placeholder="Ingresa tu email" />
                    </div>
                    <div class="form-group">
                      <label class="small mb-1" for="inputPassword">Contraseña</label>
                      <input class="form-control py-4" id="inputPassword" type="password" placeholder="Ingresa tu contraseña" />
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" />
                        <label class="custom-control-label" for="rememberPasswordCheck">Recordar contraseña</label>
                      </div>
                    </div>
                    <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                      <a class="small" href="#">¿Olvidates tu contraseña?</a>
                      <input type="submit" class="btn btn-primary" value="Ingresar">
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
            <div class="text-muted">Copyright &copy; Your Website 2021</div>
            <div>
              <a href="#">Privacy Policy</a>
              &middot;
              <a href="#">Terms &amp; Conditions</a>
            </div>
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
      const ACCESO_API = new AccesoAPI();
      frmAcceso.addEventListener('submit', function(e) {
        e.preventDefault();
        let datos = {
          email: inputEmail.value,
          password: inputPassword.value
        }
        ACCESO_API.login(JSON.stringify(datos)).then(json => {
          console.log(json);
          if (json.status === 200) {
            $(".validaciones").html(`<div class="alert alert-success text-center" role="alert">
                      Acceso autorizado, rederigiendo...
                    </div>`);
            setTimeout(function() {
              window.location.replace(`${BASE_URL}/inicio`);
            }, 1500);
          } else if (json.status === 400) {
            Utils.mostrarValidaciones(json, frmAcceso);
          }
        });
      });
    });
  </script>
</body>

</html>