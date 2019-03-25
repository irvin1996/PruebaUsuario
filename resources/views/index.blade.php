@extends('layouts.admin')
@section('contenido')



                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

@guest
  sin usuario
@endguest
@auth

                    <h2>  Bienvenido{{ Auth::user()->name.' '.Auth::user()->email }}</h2>



                  <br>

                                      <h2>  Bienvenido{{ Auth::user()->name.' '.Auth::user()->email }}</h2>
								 Bienvenido{{ Auth::user()->name.' '.Auth::user()->email }}

@endauth

  @csrf
@endsection
