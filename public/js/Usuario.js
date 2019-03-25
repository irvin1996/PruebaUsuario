//Esconder Pasaporte checkbox
$(document).ready(function(){
  $('#chkPasaporte').on('change',function(){
    if (this.checked) {
     $("#fechaEmision").show();
      $("#fechaVencimiento").show();
            $("#pasaporte").show();
              $("#lblfechaEmi").show();
                $("#lblfechaVen").show();
    } else {
      $("#fechaEmision").hide();
       $("#fechaVencimiento").hide();
             $("#pasaporte").hide();
               $("#lblfechaEmi").hide();
                 $("#lblfechaVen").hide();
    }
  })
});

//Esconder identificacion checkbox
$(document).ready(function(){
  $('#chkIdentificacion').on('change',function(){
    if (this.checked) {
     $("#identificacion").show();
    } else {
      $("#identificacion").hide();
    }
  })
});


    function doSearch()
    {
      var tableReg = document.getElementById('table');
      var searchText = document.getElementById('btnABuscar').value.toLowerCase();
      var cellsOfRow="";
      var found=false;
      var compareWith="";
      // Recorremos todas las filas con contenido de la tabla
      for (var i = 1; i < tableReg.rows.length; i++)
      {
        cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
        found = false;
        // Recorremos todas las celdas
        for (var j = 0; j < cellsOfRow.length && !found; j++)
        {
          compareWith = cellsOfRow[j].innerHTML.toLowerCase();
          // Buscamos el texto en el contenido de la celda
          if (searchText.length == 0 || (compareWith.indexOf(searchText) > -1))
          {
            found = true;
          }
        }
        if(found)
        {
          tableReg.rows[i].style.display = '';
        } else {
          // si no ha encontrado ninguna coincidencia, esconde la
          // fila de la tabla
          tableReg.rows[i].style.display = 'none';
        }
      }
    }

//Modal Detalles Usuario
    $(document).on('click', '.show-modalUsu', function() {

      var ventana = document.getElementById('miVentanaUsu'); // Accedemos al contenedor total
      var cont = document.getElementById('modalContenidoU'); // Accedemos al contenedor
      cont.style.marginTop = "40%"; // Definimos su posici�n vertical. La ponemos fija para simplificar el c�digo
      ventana.style.display = 'block'; // Y lo hacemos visible
      $('#i').text($(this).data('id'));
      $('#nom').text($(this).data('name'));
      $('#feNa').text($(this).data('fechanacimiento'));
      $('#celu').text($(this).data('celular'));
      $('#tel').text($(this).data('telefono'));
      $('#emai').text($(this).data('email'));
          $('#direc').text($(this).data('direccion'));
    });


    function ocultarVentanaUsu()
    {
        var ventana = document.getElementById('miVentanaUsu'); // Accedemos al contenedor
        ventana.style.display = 'none'; // Y lo hacemos invisible
    }




  //Combo de roles
  $(document).ready(function(){
	$.get('Usuarios/roles',function(data){
	var html_select='<option value="0">Seleccione un Rol</option>';
	for(var i=0; i<data.length; ++i)
	html_select+='<option value="'+data[i].id+'">'+data[i].name+'</option>';
	$('#idRole').html(html_select);
	});
	});
