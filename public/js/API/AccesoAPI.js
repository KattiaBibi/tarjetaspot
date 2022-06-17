class AccesoAPI {

  async login(datos) {
    let response = await fetch(`${BASE_URL}/api/v1/acceso/login`, {
      method: 'POST',
      body: datos
    });
    let json = await response.json();

    return json;
  }
}