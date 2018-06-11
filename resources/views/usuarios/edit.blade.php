@extends('layouts.master')

@section('content')

<div class="row justify-content-center">
    @include('layouts.errors')
        <div class="col-10">
                <div class="card">
                        <div class="card-header card-header-success">
                            <h4 class="card-title">Editar Usuario</h4>
                        </div>
                        <div class="card-body">
                        <form method='post' action="{{ route('usuarios.update', ['id' => $usuario->id]) }}">
                               {{ csrf_field() }}
                               {{ method_field('PATCH') }}

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="label-floating">Nombre y Apellido</label>
                                        <input type="text" class="form-control" name='name' value="{{ $usuario->name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Email</label>
                                        <input type="email" name='email'  class="form-control" value="{{ $usuario->email }} ">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="label-floating">Perfil</label>
                                            <select  class="form-control" name="role" id="">
                                            <option value="1" {{ $usuario->role_id == 1 ? 'selected' : '' }}>Consulta</option>
                                                <option value="3" {{ $usuario->role_id == 3 ? 'selected' : '' }}>Operador</option>
                                                <option value="2" {{ $usuario->role_id == 2 ? 'selected' : '' }}>Super Admin</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center mt-5">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
        </div>
    </div>
@endsection