class UsuarioAPI {

  async show(id) {
    let response = await fetch(`${BASE_URL}/api/v1/usuario/${id}`, {
      method: 'GET'
    });
    Utils.validarResponse(response);

    let json = await response.json();

    return json;
  }

  async create(datos) {
    let response = await fetch(`${BASE_URL}/api/v1/usuario`, {
      method: 'POST',
      body: datos
    });
    Utils.validarResponse(response);

    let json = await response.json();

    return json;
  }

  async update(id, datos) {
    let response = await fetch(`${BASE_URL}/api/v1/usuario/${id}`, {
      method: 'POST',
      body: datos
    });
    Utils.validarResponse(response);

    let json = await response.json();

    return json;
  }

  async delete(id) {
    let response = await fetch(`${BASE_URL}/api/v1/usuario/${id}`, {
      method: 'DELETE'
    });
    Utils.validarResponse(response);

    let json = await response.json();

    return json;
  }

  async setActualUserUpdate(id) {
    let response = await fetch(`${BASE_URL}/api/v1/usuario/setCompleteUpdate/${id}`, {
      method: 'GET'
    });
    Utils.validarResponse(response);

    let json = await response.json();

    return json;
  }

}