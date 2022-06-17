class CorreoElectronicoAPI {

  async show(id) {
    let response = await fetch(`${BASE_URL}/api/v1/correo-electronico/${id}`, {
      method: 'GET'
    });
    let json = await response.json();

    return json;
  }

  async create(datos) {
    let response = await fetch(`${BASE_URL}/api/v1/correo-electronico`, {
      method: 'POST',
      body: datos
    });
    let json = await response.json();

    return json;
  }

  async update(id, datos) {
    let response = await fetch(`${BASE_URL}/api/v1/correo-electronico/${id}`, {
      method: 'POST',
      body: datos
    });
    let json = await response.json();

    return json;
  }

  async delete(id) {
    let response = await fetch(`${BASE_URL}/api/v1/correo-electronico/${id}`, {
      method: 'DELETE'
    });
    let json = await response.json();

    return json;
  }
}