<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="<?= base_url('images/logo.png') ?>" type="image/x-icon">
  <title>Registrate</title>

  <link href="<?= base_url('css/styles.css') ?>" rel="stylesheet" />

  <!-- font-awesome css cdn -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

  <!-- Datatables css cdn -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" />

  <!-- Alertify css cdn -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />

  <!-- Alertify bootstrap theme css cdn -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />

  <!-- Select2 css cdn -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body style="display: flex; justify-content: center; align-items: center; height: 100vh;">

  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header bg-primary text-white"><strong>Registrate</strong></div>
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
            <div class="form-group mb-0">
              <button type="submit" form="frmRegistrarUsuario" id="btnGuardar" class="btn btn-sm btn-success">
                Registrarse
                <img src="https://c.tenor.com/I6kN-6X7nhAAAAAj/loading-buffering.gif" class="loader btnGuardarUsuario" style="width: 18px; display: none;">
              </button>
            </div>

            <div class="validaciones mt-2"></div>
          </form>
        </div>
      </div>
    </div>
  </div>


  <!-- Bootstrap JS -->
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

  <script src="<?= base_url('js/scripts.js') ?>"></script>

  <!-- Datatables js cdn -->
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

  <!-- Alertify js cdn -->
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

  <!-- Select2 js cdn -->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

  <!-- Select2 traduccion cdn -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/i18n/es.js"></script>

  <!-- Axios -->
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

  <script src="<?= base_url('js/configs.js') ?>"></script>
  <script src="<?= base_url('js/Utils.js') ?>"></script>

  <script>
    const BASE_URL = '<?= base_url() ?>';
  </script>

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