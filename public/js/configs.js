// CONFIGURACION PREDETERMINADA PARA TODOS LOS SELECT2
$.fn.select2.defaults.set('language', 'es');

// CONFIGURACION PREDETERMINADA PARA TODOS LOS DATATABLES
$.extend(true, $.fn.dataTable.defaults, {
  language: {
    "decimal": "",
    "emptyTable": "No hay datos disponibles en la tabla",
    "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
    "infoEmpty": "Mostrando 0 a 0 de 0 entradas",
    "infoFiltered": "(filtrado de _MAX_ entradas totales)",
    "infoPostFix": "",
    "thousands": ",",
    "lengthMenu": "Mostrar entradas de _MENU_",
    "loadingRecords": "Cargando...",
    "processing": "Procesando...",
    "search": "Buscar:",
    "zeroRecords": "No se encontraron registros coincidentes",
    "paginate": {
      "first": "Primero",
      "last": "Ultimo",
      "next": "&raquo;",
      "previous": "&laquo;"
    },
    "aria": {
      "sortAscending": ": activar para ordenar la columna ascendente",
      "sortDescending": ": activar para ordenar la columna descendente"
    }
  },
  pageLength: 25
});