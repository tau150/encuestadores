@extends('layouts.master')

@section('content')
@include('layouts.errors')
<div class="row justify-content-center">
        <div class="col-10">
                <div class="card">
                        <div class="card-header card-header-success">
                            <h4 class="card-title">Editar Encuesta</h4>
                        </div>
                        <div class="card-body">
                            <form enctype="multipart/form-data" method='post' action="{{ route('encuestas.update', ['id' => $encuesta->id]) }}">
                               {{ csrf_field() }}
                               {{ method_field('PATCH') }}
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="label-floating">Nombre</label>
                                        <input type="text" class="form-control" name='nombre' value="{{ $encuesta->nombre }}">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                            <div class="form-group">
                                                <label class="label-floating">Descripción</label>
                                                <input type="text" class="form-control" name='descripcion' value="{{ $encuesta->descripcion }}">
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
