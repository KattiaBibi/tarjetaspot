class EnviarEmailAPI {

  async enviarVCard(datos) {
    let response = await fetch(`${BASE_URL}/api/v1/enviar-email/enviar-vcard`, {
      method: 'POST',
      body: datos
    });
    let json = await response.json();

    return json;
  }

}