@extends('layouts.admin')
@section('titulo','País')
@section('contenido')
  <div class="">
             <div class="page-title">
               <div class="title_left">
                 <h3>Viajes Positivos</h3>
                 <br>
                 <div class="col-md-8 col-sm-8 ">
                @include('partials.errors')
               </div>
                 @include('sweetalert::alert')

               </div>

             </div>


             <div class="clearfix"></div>
             <div class="row">
               <div class="col-md-12 col-sm-12 col-xs-12">
                 <div class="x_panel">
                   <div class="x_title">
                     <h2>Editar Usuario</h2>

                     <div class="clearfix"></div>
                   </div>
                   <div class="x_content">
                     <br />
                     <form name="formEdit" action="{{route('usuario.edit',['id'=>$usuario->id])}}" method="post" data-parsley-validate class="form-horizontal form-label-left">


                       <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12" >Identificación: </span>
                         </label>
                         <div class="col-md-3 col-sm-3 col-xs-12">
                          <input type="text" value="{{$usuario->identificacion}}" placeholder="Identificación(Opcional)" id="identificacionE"  name="identificacionE" >
                         </div>
                       </div>
                       <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12" >Pasaporte: </span>
                         </label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                           @if ($usuario->idPasaporte!=null)
                           @foreach ($pasa as $kePa )
                               @if ($usuario->idPasaporte==$kePa->id)
                                 <input type="text" name="pasaporteE" value="{{$kePa->numeroPasaporte}}" id="pasaporteE"  placeholder="Pasaporte(Opcional)" />
                                 <br>
                                 <br>
                                 <table>
                                   <tr>
                                     <td>
                                             <label  id="lblfechaEmiE" >Fecha Emision &nbsp; </label>
                                     </td>
                                     <td>
                                       <input type="date" name="fechaEmisionE" id="fechaEmisionE" value="{{$kePa->fechaEmision}}"   placeholder="Fecha Emision" />

                                     </td>
                                   </tr>
                                   <tr>
                                     <td>
                                              <label  id="lblfechaVenE" >Fecha Vencimiento &nbsp; </label>
                                     </td>
                                     <td>
                                       <input type="date" name="fechaVencimientoE" id="fechaVencimientoE" value="{{$kePa->fechaVencimiento}}"  placeholder="Fecha Vencimiento"  />

                                     </td>
                                   </tr>
                                 </table>

                               @endif
                             @endforeach
                           @else
                             <input type="text" name="pasaporteE" value="" id="pasaporteE"  placeholder="Pasaporte(Opcional)" />
                             <br>
                             <br>
                             <table>
                               <tr>
                                 <td>
                                         <label  id="lblfechaEmiE" >Fecha Emision &nbsp; </label>
                                 </td>
                                 <td>
                                   <input type="date" name="fechaEmisionE" id="fechaEmisionE" value=""   placeholder="Fecha Emision" />

                                 </td>
                               </tr>
                               <tr>
                                 <td>
                                          <label  id="lblfechaVenE" >Fecha Vencimiento &nbsp; </label>
                                 </td>
                                 <td>
                                   <input type="date" name="fechaVencimientoE" id="fechaVencimientoE" value=""  placeholder="Fecha Vencimiento"  />

                                 </td>
                               </tr>
                             </table>

                           @endif

                              </div>
                       </div>

                       <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12" >Nombre: *</span>
                         </label>
                         <div class="col-md-3 col-sm-3 col-xs-12">
                           <input type="text" required value="{{$usuario->name}}" placeholder="Nombre" id="nombreE" name="nombreE" >
                       </div>
                       </div>

                       <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12" >1° Apellido y 2° Apellido: *</span>
                         </label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                           <input type="text" required value="{{$usuario->apellido1}}" placeholder="1° Apellido" id="apellido1E" name="apellido1E"> <input type="text" required value="{{$usuario->apellido2}}" placeholder="2° Apellido" id="apellido2E" name="apellido2E">
                       </div>
                       </div>


                       <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12" >Fecha de Nacimiento: *</span>
                         </label>
                         <div class="col-md-3 col-sm-3 col-xs-12">
                <input type="date"  required placeholder="Fecha de nacimiento" value="{{$usuario->fechaNacimiento}}" id="fechaNacimientoE" name="fechaNacimientoE">
                     </div>
                       </div>

                       <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12" >Teléfono: *</span>
                         </label>
                         <div class="col-md-3 col-sm-3 col-xs-12">
                    <input type="text" value="{{$usuario->telefono}}" placeholder="(Opcional) 9999-9999"  id="telefonoE" name="telefonoE">
                     </div>
                       </div>

                       <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12" >Celular: *</span>
                         </label>
                         <div class="col-md-3 col-sm-3 col-xs-12">
                           <input type="text" value="{{$usuario->celular}}" required placeholder="9999-9999" pattern="\d{4}[\-]\d{4}" id="celularE" name="celularE">
                       </div>
                       </div>

                       <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12" >Correo: *</span>
                         </label>
                         <div class="col-md-3 col-sm-3 col-xs-12">
                        <input type="email" value="{{$usuario->email}}" required placeholder="Correo Electrónico" id="correoE" name="correoE">
                       </div>
                       </div>

                       <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12" >Dirección: *</span>
                         </label>
                         <div class="col-md-3 col-sm-3 col-xs-12">
                    <textarea type="text" required placeholder="Dirección" id="direccionE" name="direccionE">{{$usuario->direccion}}</textarea>
                       </div>
                       </div>

                       <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12" >Rol: *</span>
                         </label>
                         <div class="col-md-3 col-sm-3 col-xs-12">
                           <select id="idRoleE" required name="idRoleE" class="input-sm">

                             @foreach ($roll as $role)
                           <option value="{{$role->id}}" {{$usuario->idRole==$role->id?"selected":""}} >{{$role->name}}</option>
                             @endforeach


                             </select>
                       </div>
                       </div>


                       <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12" >Contraseña: *</span>
                         </label>
                         <div class="col-md-3 col-sm-3 col-xs-12">
                      <input type="password" required placeholder="Contraseña" id="password" name="password">
                       </div>
                       </div>

                       <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12" >Confirmar Contraseña: *</span>
                         </label>
                         <div class="col-md-3 col-sm-3 col-xs-12">
                  <input type="password"  required placeholder="Confirmar Contraseña" id="password-confirm" name="password_confirmation">
                       </div>
                       </div>

                         <input type="hidden" name="id" value="{{$usuario->id}}"/>
                       <div class="ln_solid"></div>
                       <div class="form-group">
                         <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                           @csrf
                           <button type="submit" class="btn btn-success">Actualizar</button>
                             <a href="{{route('usuario.index')}}" class="btn btn-primary">Atrás</a>

                         </div>
                       </div>
                     </form>
                   </div>
                 </div>
               </div>
             </div>






           </div>

         @endsection
