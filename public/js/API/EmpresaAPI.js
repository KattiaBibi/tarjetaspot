class EmpresaAPI {

  async show(id) {
    let response = await fetch(`${BASE_URL}/api/v1/empresa/${id}`, {
      method: 'GET'
    });
    let json = await response.json();

    return json;
  }

  async create(datos) {
    let response = await fetch(`${BASE_URL}/api/v1/empresa`, {
      method: 'POST',
      body: datos
    });
    let json = await response.json();

    return json;
  }

  async update(id, datos) {
    let response = await fetch(`${BASE_URL}/api/v1/empresa/${id}`, {
      method: 'POST',
      body: datos
    });
    let json = await response.json();

    return json;
  }

  async delete(id) {
    let response = await fetch(`${BASE_URL}/api/v1/empresa/${id}`, {
      method: 'DELETE'
    });
    let json = await response.json();

    return json;
  }

  searchByNombre(control) {
    return $(`${control}`).select2({
      width: '100%',
      placeholder: 'Buscar',
      allowClear: true,
      ajax: {
        url: `${BASE_URL}/api/v1/empresa/searchByNombre`,
        dataType: 'json',
        type: 'get',
        delay: 250,
        data: function (params) {
          let query = {
            search: params.term,
            page: params.page || 1
          }

          return query;
        },
        processResults: function (data, params) {
          console.log(data);

          return {
            results: data.results,
            pagination: data.pagination
          };
        },
        cache: true
      }
    });
  }
}