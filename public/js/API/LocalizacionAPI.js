class LocalizacionAPI {

  async show(id) {
    let response = await fetch(`${BASE_URL}/api/v1/localizacion/${id}`, {
      method: 'GET'
    });
    let json = await response.json();

    return json;
  }

  async create(datos) {
    let response = await fetch(`${BASE_URL}/api/v1/localizacion`, {
      method: 'POST',
      body: datos
    });
    let json = await response.json();

    return json;
  }

  async update(id, datos) {
    let response = await fetch(`${BASE_URL}/api/v1/localizacion/${id}`, {
      method: 'POST',
      body: datos
    });
    let json = await response.json();

    return json;
  }

  async delete(id) {
    let response = await fetch(`${BASE_URL}/api/v1/localizacion/${id}`, {
      method: 'DELETE'
    });
    let json = await response.json();

    return json;
  }
}