@extends('shared.layout')

@section('content')

<div class="row justify-content-center">
    @include('layouts.errors')
        <div class="col-10">
                <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Nuevo Usuario</h4>
                        </div>
                        <div class="card-body">
                            <form method='post' action='/register'>
                               {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="label-floating">Nombre y Apellido</label>
                                            <input type="text" class="form-control" name='name'>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Email</label>
                                            <input type="email" name='email'  class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="label-floating">Perfil</label>
                                            <select  class="form-control" name="role" id="">
                                                <option value="1">Consulta</option>
                                                <option value="2">Operador</option>
                                                <option value="3">Super Admin</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center mt-5">
                                        <button type="submit" class="btn btn-primary">Crear usuario</button>
                                </div>
                            </form>
                        </div>
                    </div>
        </div>
    </div>
@endsection