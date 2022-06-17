class TipoCorreoElectronicoAPI {

  async index() {
    let response = await fetch(`${BASE_URL}/api/v1/tipos-correo-electronico?length=0&start=0`, {
      method: 'GET'
    });
    let json = await response.json();

    return json;
  }
}