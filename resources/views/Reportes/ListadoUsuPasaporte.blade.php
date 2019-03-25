@extends('layouts.admin')
@section('titulo','País')
@section('contenido')
<div class="">
  <br>
    <section class="content-header">
      <h1>
        Viajes Positivos
      </h1>

    </section>
    <br>
    <br>

  @if(Session::has('info'))
          <div class="row">
              <div class="col-md-4">
                  <p class="alert alert-info">{{Session::get('info')}}</p>
              </div>
          </div>
  @endif
  <br>
    @include('sweetalert::alert')
           <div class="row">
             <div class="col-md-12 col-sm-12 col-xs-12">
               <div class="x_panel">
                 <div class="x_title">
                   <h2>Listado Usuarios</h2>
                   <br><br>
                   <label>
                     Busqueda de Usuarios por fecha de pasaporte a vencer en 1 mes
                   </label>
<br>
              <label> Fecha:
                    <input type="date"  required placeholder="Fecha Vencimiento" id="FechaVencimiento" name="FechaVencimiento" >
              </label>


     &nbsp;&nbsp;<button type="submit" class="btn btn-success">Buscar</button>
                   <div class="clearfix"></div>
                 </div>
                 <div class="x_content">

                   <table id="datatable" class="table table-striped table-bordered">
                     <thead>
                       <tr>
                            <th>Nombre</th>
                         <th>Pasaporte</th>

                         <th>Fecha Vencimiento</th>

                         <th>Ver</th>
                       </tr>
                     </thead>


                     <tbody>


                       @csrf
                       @foreach ($usa as $item)
                        @foreach ($pasaporte as $key )
                          @if ($item->idPasaporte==$key->id)
                            <tr class="usuario{{$item->id}}">
                              <td>{{$item->name}}</td>
                              <td>{{$key->numeroPasaporte}}</td>
                              <td>{{date('d-m-Y',strtotime($key->fechaVencimiento))}}</td>
                              <td>
                                <a href="#" class="show-modalUsu btn btn-info" data-id="{{$item->identificacion}}"  data-name="{{$item->name}}" data-fechanacimiento="{{$item->fechaNacimiento}}" data-celular="{{$item->celular}}" data-telefono="{{$item->telefono}}" data-email="{{$item->email}}"  data-direccion="{{$item->direccion}}">
                                    <i class="fa fa-eye"></i>
                                </a>

                              </td>
                            </tr
                          @endif

                         @endforeach
                       @endforeach

                     </tbody>
                   </table>
                 </div>
               </div>
             </div>





           </div>
         </div>


            <div id="miVentanaUsu" class="modalPrueba"   >
              <div class="modal-dialog" role="document">
                <div id="modalContenidoU" class="modal-content">
                  <div class="modal-header">
                        <h5 class="modal-title"><b>Detalle Usuario</h5>
                        <button type="button" onclick="ocultarVentanaUsu();" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label for="">Identificación:</label>
                    <b id="i"/>
                  </div>
                  <div class="form-group">
                    <label for="">Nombre:</label>
                    <b id="nom"/>
                  </div>
                  <div class="form-group">
                    <label for="">Fecha Nacimiento:</label>
                    <b id="feNa"/>
                  </div>
                  <div class="form-group">
                    <label for="">Telefono:</label>
                    <b id="tel"/>
                  </div>
                  <div class="form-group">
                    <label for="">Celular:</label>
                    <b id="celu"/>
                  </div>

                  <div class="form-group">
                    <label for="">Correo:</label>
                    <b id="emai"/>
                  </div>
                  <div class="form-group">
                    <label for="">Direccion:</label>
                    <b id="direc"/>
                  </div>
              </div>

            </div>
            </div>

            </div>

         @endsection
