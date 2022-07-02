$.extend( true, $.fn.dataTable.defaults, {
  "language": {
      "decimal": ",",
      "thousands": ".",
      "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
      "infoPostFix": "",
      "infoFiltered": "(filtrado de un total de _MAX_ registros)",
      "loadingRecords": "Cargando...",
      "lengthMenu": "Mostrar _MENU_ registros",
      "paginate": {
          "first": "Primero",
          "last": "Último",
          "next": "Siguiente",
          "previous": "Anterior"
      },
      "processing": "Procesando...",
      "search": "Buscar:",
      "searchPlaceholder": "Término de búsqueda",
      "zeroRecords": "No se encontraron resultados",
      "emptyTable": "Ningún dato disponible en esta tabla",
      "aria": {
          "sortAscending":  ": Activar para ordenar la columna de manera ascendente",
          "sortDescending": ": Activar para ordenar la columna de manera descendente"
      },
      //only works for built-in buttons, not for custom buttons
      "buttons": {
          "create": "Nuevo",
          "edit": "Cambiar",
          "remove": "Borrar",
          "copy": "Copiar",
          "csv": "fichero CSV",
          "excel": "tabla Excel",
          "pdf": "documento PDF",
          "print": "Imprimir",
          "colvis": "Visibilidad columnas",
          "collection": "Colección",
          "upload": "Seleccione fichero...."
      },
      "select": {
          "rows": {
              _: '%d filas seleccionadas',
              0: 'clic fila para seleccionar',
              1: 'una fila seleccionada'
          }
      }
  }
} );