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

             <br>
             <div class="col-md-12 col-sm-12 col-xs-12">
               <div class="x_panel">
                 <div class="x_title">
                   <h2>Listado Clientes - Destinos</h2>



                   <div class="clearfix"></div>
                 </div>
                 <div class="x_content">
                   <div class="col-sm-6">

                   <label>
                     Destinos:

                     <select name="comboDestino" id="comboDestino" class="input-sm" >
                    <option value="0">Seleccione Destino </option>

                    </select>
                    </label>
                <br>
                <br>

                   </div>

                   <table id="datatable" class="table table-striped table-bordered">
                     <thead>
                       <tr>
                         <th>Nombre</th>
                         <th>Destino</th>
                         <th>Cantidad de Viajes</th>
                          </tr>
                     </thead>

          <tbody  class="tbodybusqueda">
                       @csrf
  @foreach ($usuario as $us )
  @foreach ($us->destinos as $key )
  <tr>
    <td>{{$us->name}}</td>
  <td id="idDe">{{$key->lugar}}</td>
  <td>{{$key->pivot->cantidad}}</td>

  </tr>
  @endforeach
  @endforeach

                     </tbody>
                   </table>
                 </div>
               </div>
             </div>





           </div>
         </div>


         @endsection
