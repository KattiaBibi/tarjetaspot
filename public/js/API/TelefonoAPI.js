class TelefonoAPI {

  async show(id) {
    let response = await fetch(`${BASE_URL}/api/v1/telefono/${id}`, {
      method: 'GET'
    });
    let json = await response.json();

    return json;
  }

  async create(datos) {
    let response = await fetch(`${BASE_URL}/api/v1/telefono`, {
      method: 'POST',
      body: datos
    });
    let json = await response.json();

    return json;
  }

  async update(id, datos) {
    let response = await fetch(`${BASE_URL}/api/v1/telefono/${id}`, {
      method: 'POST',
      body: datos
    });
    let json = await response.json();

    return json;
  }

  async delete(id) {
    let response = await fetch(`${BASE_URL}/api/v1/telefono/${id}`, {
      method: 'DELETE'
    });
    let json = await response.json();

    return json;
  }
}