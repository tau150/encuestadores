@extends('layouts.master')

@section('content')
    <div class="row justify-content-center">
            <div class="col-4">
                    @include('flash::message')
            </div>
    </div>
    <div class="row">

        <div class="col-12">

            <div class="m-5 text-center">
                <a class="btn btn-primary a-btn" href="/usuarios/create">Nuevo </a>
            </div>
            <div class="card">
                <div class="card-header card-header-success">
                    <h3>Usuarios</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-usuarios">
                        <thead>
                          <tr>
                            <th class="font-weight-bold" scope="col">Nombre</th>
                            <th class="font-weight-bold" scope="col">email</th>
                            <th class="font-weight-bold" scope="col">Rol asignado</th>
                            <th class="text-center font-weight-bold" scope="col">Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $usuario)
                            <tr>
                              <td>{{ $usuario->name}}</td>
                              <td>{{ $usuario->email}}</td>
                              <td>{{ $usuario->role->nombre}}</td>
                              <td class='text-center'>
                              <a class='mr-3 delete-icon delete-usuario' data-identificador="{{ $usuario->id }}"> <i class="material-icons text-danger">delete</i></a>
                              <a href="{{ route('usuarios.edit', ['id' => $usuario->id])  }}"> <i class="material-icons text-info">edit</i></a>
                              </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>


        </div>
    </div>
@endsection

