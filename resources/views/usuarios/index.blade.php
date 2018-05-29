@extends('shared.layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="m-5 text-center">
                <a class="btn btn-primary a-btn" href="/usuarios/create">Nuevo </a>
            </div>
                <table class="table table-striped">
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
                                  <a class='mr-3' href=""> <i class="material-icons">delete</i></a>
                                  <a href=""> <i class="material-icons">edit</i></a>
                              </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
        </div>
    </div>
@endsection

