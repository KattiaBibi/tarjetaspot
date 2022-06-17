class TipoRedSocialAPI {

  async index() {
    let response = await fetch(`${BASE_URL}/api/v1/tipos-red-social?length=0&start=0`, {
      method: 'GET'
    });

    Utils.validarResponse(response);
    
    let json = await response.json();

    return json;
  }
}