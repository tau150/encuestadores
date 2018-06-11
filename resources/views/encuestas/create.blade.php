@extends('layouts.master')

@section('content')

@include('layouts.errors')
<div class="row justify-content-center">
        <div class="col-10">
                <div class="card">
                        <div class="card-header card-header-success">
                            <h4 class="card-title">Nueva Encuesta</h4>
                        </div>
                        <div class="card-body">
                            <form method='post' action='/encuestas'>
                               {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="label-floating">Nombre</label>
                                            <input type="text" class="form-control" name='nombre'>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Desccripción</label>
                                            <input type="text" name='descripcion'  class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center mt-5">
                                        <button type="submit" class="btn btn-primary">Crear Encuesta</button>
                                </div>
                            </form>
                        </div>
                    </div>
        </div>
    </div>
@endsection