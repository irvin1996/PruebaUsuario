
  // Funcion detalle Destinos
  $(document).on('click', '.show-modal', function() {

    var ventana = document.getElementById('miVentana'); // Accedemos al contenedor total
    var cont = document.getElementById('modalContenido'); // Accedemos al contenedor
    cont.style.marginTop = "40%";  // Definimos su posici�n vertical. La ponemos fija para simplificar el c�digo
    ventana.style.display = 'block'; // Y lo hacemos visible
  $('#nom').text($(this).data('lugar'));
    $('#pais').text($(this).data('paisdes'));
  $('#TourDescrip').text($(this).data('descdestino'));
  $('#fechaSalida').text($(this).data('fechaida'));
  $('#fechallegada').text($(this).data('fechallegada'));
  });


  function ocultarVentana()
  {
      var ventana = document.getElementById('miVentana'); // Accedemos al contenedor
      ventana.style.display = 'none'; // Y lo hacemos invisible
  }


  //Buscar
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


  //combo pais
  $(document).ready(function(){

$.get('/viajes/paises',function(data){
	var html_select='<option value="0">Seleccione Pais</option>';
for(var i=0; i<data.length; ++i)
html_select+='<option value="'+data[i].nombrePais+'">'+data[i].nombrePais+'</option>';
$('#combopais').html(html_select);
});
});


//Pais
// Funcion detalle Pais
$(document).on('click', '.show-modalPais', function() {
  var ventana = document.getElementById('miVentanaPais'); // Accedemos al contenedor total
  var cont = document.getElementById('modalContenidoP'); // Accedemos al contenedor
  cont.style.marginTop = "40%"; // Definimos su posici�n vertical. La ponemos fija para simplificar el c�digo
  ventana.style.display = 'block'; // Y lo hacemos visible
$('#nompais').text($(this).data('name'));
$('#fechacrea').text($(this).data('fechap'));
});


function ocultarVentanaPais()
{
    var ventana = document.getElementById('miVentanaPais'); // Accedemos al contenedor
    ventana.style.display = 'none'; // Y lo hacemos invisible
}



$(function(){
  $('#combopais').on('change',onSelectPaisChange);
});


//filtrado por paises en el listado destino-paises
$(document).ready(function($) {
    $('datatable').show();
    $('#combopais').change(function() {
        $('datatable').show();
        var selection = $(this).val();
        if (selection == 0) {
            $('tr').show();
        }
        else {
            var dataset = $('#datatable .contenidobusqueda').find('tr');
            // show all rows first
            dataset.show();
        }
        // filter the rows that should be hidden
        dataset.filter(function(index, item) {
            return $(item).find('#idpa').text().split(',').indexOf(selection) == -1;
        }).hide();
    });
});


//combo Destinos en listado cliente-Destinos

  //combo destinos
  $(document).ready(function(){

$.get('/viajes/destinos',function(data){
	var html_select='<option value="0">Seleccione Destino</option>';
for(var i=0; i<data.length; ++i)
html_select+='<option value="'+data[i].lugar+'">'+data[i].lugar+'</option>';
$('#comboDestino').html(html_select);
});
});


//filtrado por Destinos en el listado Clientes-Destinos
$(document).ready(function($) {
    $('datatable').show();
    $('#comboDestino').change(function() {
        $('datatable').show();
        var selection = $(this).val();
        if (selection == 0) {
            $('tr').show();
        }
        else {
            var dataset = $('#datatable .tbodybusqueda').find('tr');
            // show all rows first
            dataset.show();
        }
        // filter the rows that should be hidden
        dataset.filter(function(index, item) {
            return $(item).find('#idDe').text().split(',').indexOf(selection) == -1;
        }).hide();
    });
});
