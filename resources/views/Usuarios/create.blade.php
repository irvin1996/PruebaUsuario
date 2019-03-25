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

               </div>

             </div>


             <div class="clearfix"></div>
             <div class="row">
               <div class="col-md-12 col-sm-12 col-xs-12">
                 <div class="x_panel">
                   <div class="x_title">
                     <h2>Insertar Usuario</h2>

                     <div class="clearfix"></div>
                   </div>
                   <div class="x_content">
                     <br />
                     <form name="formCrear" action="{{route('usuario.create')}}" method="post" data-parsley-validate class="form-horizontal form-label-left">


                       <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12" >Identificación: </span>
                         </label>
                         <div class="col-md-3 col-sm-3 col-xs-12">
                           <input type="checkbox" value="false" id="chkIdentificacion" name="chkIdentificacion" onclick="funcion()" />
                          <input type="text" value="{{old('identificacion')}}" placeholder="Identificación(Opcional)" id="identificacion" hidden name="identificacion" >

                              </div>
                       </div>
                       <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12" >Pasaporte: </span>
                         </label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                           <input type="checkbox" value="false" id="chkPasaporte" name="chkPasaporte" onclick="funcion()" />
                            <input type="text" name="pasaporte" value="{{old('pasaporte')}}" id="pasaporte" hidden placeholder="Pasaporte(Opcional)" />
                            <br>
                            <br>
                            <table>
                              <tr>
                                <td>
                                        <label hidden id="lblfechaEmi" >Fecha Emision &nbsp; </label>
                                </td>
                                <td>
                                  <input type="date" name="fechaEmision" id="fechaEmision" value="{{old('fechaEmision')}}" hidden  placeholder="Fecha Emision" />

                                </td>
                              </tr>
                              <tr>
                                <td>
                                         <label hidden id="lblfechaVen" >Fecha Vencimiento &nbsp; </label>
                                </td>
                                <td>
                                  <input type="date" name="fechaVencimiento" id="fechaVencimiento" value="{{old('fechaVencimiento')}}" hidden placeholder="Fecha Vencimiento"  />

                                </td>
                              </tr>
                            </table>


                          </div>





                       </div>

                       <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12" >Nombre: *</span>
                         </label>
                         <div class="col-md-3 col-sm-3 col-xs-12">
        <input type="text" required placeholder="Nombre" value="{{old('nombre')}}" id="nombre" name="nombre" >
                       </div>
                       </div>

                       <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12" >1° Apellido y 2° Apellido: *</span>
                         </label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" required placeholder="1° Apellido" id="apellido1" value="{{old('apellido1')}}" name="apellido1"> <input type="text" value="{{old('apellido2')}}" required placeholder="2° Apellido" id="apellido2" name="apellido2">
                       </div>
                       </div>


                       <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12" >Fecha de Nacimiento: *</span>
                         </label>
                         <div class="col-md-3 col-sm-3 col-xs-12">
                  <input type="date" required placeholder="Fecha de nacimiento" value="{{old('fechaNacimiento')}}" id="fechaNacimiento" name="fechaNacimiento">
                       </div>
                       </div>

                       <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12" >Teléfono: *</span>
                         </label>
                         <div class="col-md-3 col-sm-3 col-xs-12">
                      <input type="text" placeholder="(Opcional) 9999-9999" value="{{old('telefono')}}" id="telefono" name="telefono">
                       </div>
                       </div>

                       <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12" >Celular: *</span>
                         </label>
                         <div class="col-md-3 col-sm-3 col-xs-12">
                  <input type="text" required placeholder="9999-9999" value="{{old('celular')}}" pattern="\d{4}[\-]\d{4}" id="celular" name="celular">
                       </div>
                       </div>

                       <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12" >Correo: *</span>
                         </label>
                         <div class="col-md-3 col-sm-3 col-xs-12">
                           <input type="email" required placeholder="Correo Electrónico"value="{{old('correo')}}" id="correo" name="correo">
                       </div>
                       </div>

                       <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12" >Dirección: *</span>
                         </label>
                         <div class="col-md-3 col-sm-3 col-xs-12">
                      <textarea type="text" required placeholder="Dirección" id="direccion" name="direccion">{{old('direccion')}}</textarea>
                       </div>
                       </div>

                       <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12" >Rol: *</span>
                         </label>
                         <div class="col-md-3 col-sm-3 col-xs-12">
                           <select id="idRole" required name="idRole" class="input-sm">
                                           @foreach ($roles as $role)
                                           <option value="{{$role->id}}">{{$role->name}}</option>
                                           @endforeach
                             </select>
                       </div>
                       </div>


                       <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12" >Contraseña: *</span>
                         </label>
                         <div class="col-md-3 col-sm-3 col-xs-12">
                      <input type="password" required placeholder="Contraseña" value="{{old('password')}}" id="password" name="password">
                       </div>
                       </div>

                       <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12" >Confirmar Contraseña: *</span>
                         </label>
                         <div class="col-md-3 col-sm-3 col-xs-12">
                  <input type="password"  required placeholder="Confirmar Contraseña" value="{{old('password_confirm')}}" id="password-confirm" name="password_confirmation">
                       </div>
                       </div>

                       <div class="ln_solid"></div>
                       <div class="form-group">
                         <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                           @csrf
                           <button type="submit" class="btn btn-success">Guardar</button>
                             <a href="{{route('usuario.index')}}" class="btn btn-primary">Atrás</a>

                         </div>
                       </div>
  @include('sweetalert::alert')
                     </form>
                   </div>
                 </div>
               </div>
             </div>






           </div>

         @endsection
