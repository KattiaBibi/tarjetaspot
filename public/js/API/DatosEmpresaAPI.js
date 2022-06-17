class DatosEmpresaAPI {

  async show(id_usuario) {
    let response = await fetch(`${BASE_URL}/api/v1/datos-empresa/${id_usuario}`, {
      method: 'GET'
    });
    Utils.validarResponse(response);
    
    let json = await response.json();

    return json;
  }

  async create(datos) {
    let response = await fetch(`${BASE_URL}/api/v1/datos-empresa`, {
      method: 'POST',
      body: datos
    });
    Utils.validarResponse(response);

    let json = await response.json();

    return json;
  }

  async update(id_usuario, datos) {
    let response = await fetch(`${BASE_URL}/api/v1/datos-empresa/${id_usuario}`, {
      method: 'POST',
      body: datos
    });
    Utils.validarResponse(response);

    let json = await response.json();

    return json;
  }
}