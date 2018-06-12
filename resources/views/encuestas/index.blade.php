@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
                <div class="row justify-content-center">
                        <div class="col-4">
                                @include('flash::message')
                        </div>
                </div>
        </div>

        <div class="col-12">
            <div class="m-5 text-center">
                <a class="btn btn-primary a-btn" href="/encuestas/create">Nuevo </a>
            </div>
            <div class="card">
                <div class="card-header card-header-success">
                    <h3>Encuestas</h3>

                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th class="font-weight-bold" scope="col">Nombre</th>
                            <th class="font-weight-bold" scope="col">Descripción</th>
                            <th class="text-center font-weight-bold" scope="col" >Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($encuestas as $encuesta)
                            <tr>
                              <td>{{ $encuesta->nombre}}</td>
                              <td>{{ $encuesta->descripcion}}</td>

                              <td class='text-center'>
                                <a class='mr-3 delete-icon delete-encuesta {{ $encuesta->encuestadores->count() > 0 ? 'delete-disabled' : ''  }} ' data-identificador="{{ $encuesta->id }}"> <i class="material-icons text-danger">delete</i></a>
                              <a href="{{ route('encuestas.edit', ['id' => $encuesta->id])  }}"> <i class="material-icons text-info">edit</i></a>
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

