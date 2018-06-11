@extends('layouts.master')

@section('content')
@include('layouts.errors')
<div class="row justify-content-center">
        <div class="col-10">
                <div class="card">
                        <div class="card-header card-header-success">
                            <h4 class="card-title">Editar Encuestador</h4>
                        </div>
                        <div class="card-body">
                            <form enctype="multipart/form-data" method='post' action="{{ route('encuestadores.update', ['id' => $encuestador->id]) }}">
                               {{ csrf_field() }}
                               {{ method_field('PATCH') }}
                                <div class="row">
                                        <div class="col-12 text-center mb-5 mt-5">

                                                <img class='img-perfil-profile' id='output' src="\storage/{{ $encuestador->img}}">

                                                <img class='img-perfil-profile hidden' id="defaultImgEdit" src="\images/default_user.jpg" alt="">



                                        </div>

                                        <input name="id" type="hidden" value="{{ $encuestador->id }}">


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="label-floating">Apellido</label>
                                        <input type="text" class="form-control" name='apellido' value="{{ $encuestador->apellido }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="label-floating">Nombre</label>
                                                <input type="text" class="form-control" name='nombre' value="{{ $encuestador->nombre }}">
                                            </div>
                                    </div>
                                    <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="label-floating">Dni</label>
                                                <input type="text" class="form-control" name='dni' value="{{ $encuestador->dni }}">
                                            </div>
                                    </div>
                                    <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="label-floating">Localidad</label>
                                                <select name="localidad" class="form-control">
                                                    <option value="" disabled selected>Seleccione una opción</option>
                                                    @foreach ($localidades as $localidad)
                                                <option value="{{ $localidad->id }}"  {{ $localidad->id == $encuestador->localidad_id ? 'selected' : '' }}>{{ $localidad->nombre }}</option>
                                                    @endforeach
                                                 </select>
                                            </div>
                                    </div>
                                    <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="label-floating">Cargo</label>
                                                <select name="cargo" class="form-control">

                                                <option value="Coordinador" {{ $encuestador->cargo == 'Coordinador' ? 'selected' : '' }} >Coordinador</option>
                                                    <option value="Encuestador" {{ $encuestador->cargo == 'Encuestador' ? 'selected' : '' }}>Encuestador</option>
                                                    <option value="Jefe de Equipo" {{ $encuestador->cargo == 'Jefe de Equipo' ? 'selected' : '' }}>Jefe de Equipo</option>
                                                    <option value="Jefe de Equipo Volan" {{ $encuestador->cargo == 'Jefe de Equipo Volan' ? 'selected' : '' }} >Jefe de Equipo Volan</option>
                                                    <option value="Recepcionista - Analista" {{ $encuestador->cargo == 'Recepcionista - Analista' ? 'selected' : '' }}>Recepcionista - Analista</option>
                                                    <option value="Subcoordinador" {{ $encuestador->cargo == 'Subcoordinador' ? 'selected' : '' }}>Subcoordinador</option>
                                                    <option value="Supervisor" {{ $encuestador->cargo == 'Supervisor' ? 'selected' : '' }}>Supervisor</option>
                                                </select>
                                            </div>
                                    </div>
                                    <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="label-floating">Encuesta</label>
                                                <select name="encuesta" class="form-control">

                                                        @foreach ($encuestas as $encuesta)
                                                        <option value="{{ $encuesta->id }}" {{ $encuestador->encuesta->nombre == $encuesta->nombre  ? 'selected' : '' }} >{{ $encuesta->nombre }}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <div class="form-group justify-content-center">
                                        <label for="exampleInputFile"> <i class="material-icons">
                                                unarchive
                                                </i> Imagen de perfil máximo 1200 x 1200 px</label>
                                        <input type="file" class="form-control-file" name='img' id="exampleInputFile" aria-describedby="fileHelp" onchange="loadFileEdit(event)">
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
