<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrate</title>
</head>

<body>

  <div class="row">
    <div class="col-lg-6 col-12">
      <div class="card">
        <div class="card-header bg-primary text-white"><strong>Registrate</strong></div>
        <div class="card-body">
          <form id="frmRegistrarUsuario">
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
            <div class="form-group mt-4 mb-0">
              <input type="submit" class="btn btn-success btn-sm" id="btnGuardar" value="Guardar">
            </div>

            <div class="validaciones mt-2"></div>
          </form>
        </div>
      </div>
    </div>
  </div>

</body>

</html>