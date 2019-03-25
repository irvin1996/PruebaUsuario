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

    @include('sweetalert::alert')
           <div class="row">
             <div class="col-md-12 col-sm-12 col-xs-12">
               <div class="x_panel">
                 <div class="x_title">
                   <h2>Mantenimiento Usuarios - Clientes</h2>
                   <br>
                   <form action="{{route('usuario.createUD')}}" method="post">
                   <table id="" class="table table-striped table-bordered">
                     <thead>
                       <tr>
                         <th>Usuarios</th>
                         <th>Destinos</th>
                         <th class="text-center" width="150px">
                           Agregar
                         </th>
                       </tr>
                     </thead>


                     <tbody>
                       @csrf
                       <td>
                         <select id="usuarioId" required name="usuarioId" class="input-sm">
                                         @foreach ($usuario as $role)
                                         <option value="{{$role->id}}">{{$role->name}}</option>
                                         @endforeach
                           </select>
                         </td>
                           <td>
                             <select id="destinoId" required name="destinoId" class="input-sm">
                                             @foreach ($destino as $role)
                                             <option value="{{$role->id}}">{{$role->lugar}}</option>
                                             @endforeach
                               </select>
                             </td>
                             <td>
                               <center>
                                    <button type="submit" class="edit-modal btn btn-warning"> <i class="fa fa-edit"></i></button>
                             </center>
                               </td>
                     </tbody>
                   </table>
                 </form>
                   <div class="clearfix"></div>
                 </div>
                 <div class="x_content">

                   <table id="datatable" class="table table-striped table-bordered">
                     <thead>
                       <tr>
                         <th>Nombre</th>
                         <th>Destino</th>
                         <th>Cantidad de Viajes</th>
                         <th class="text-center" >
                           <a href="" class="btn btn-warnig" >Eliminar
                           </a>
                         </th>
                       </tr>
                     </thead>


                     <tbody>
                       @csrf
@foreach ($usuario as $us )
  @foreach ($us->destinos as $key )
  <tr>
    <td>{{$us->name}}</td>
<td>{{$key->lugar}}</td>
<td>{{$key->pivot->cantidad}}</td>
<td>Eliminar</td>
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
