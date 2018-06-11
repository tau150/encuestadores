@extends('layouts.master')

@section('content')
@include('layouts.errors')
<div class="row justify-content-center">
        <div class="col-10">
                <div class="card">
                        <div class="card-header card-header-success">
                            <h4 class="card-title">Nuevo Encuestador</h4>
                        </div>
                        <div class="card-body">
                            <form enctype="multipart/form-data" method='post' action='/encuestadores'>
                               {{ csrf_field() }}
                                <div class="row">
                                        <div class="col-12 text-center mb-5 mt-5">
                                                <img class='img-perfil-profile' id="defaultImg" src="\images/default_user.jpg" alt="">
                                                <img class='img-perfil-profile' id='output' src="">
                                            </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="label-floating">Apellido</label>
                                        <input type="text" class="form-control" name='apellido' value="{{ old('apellido') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="label-floating">Nombre</label>
                                                <input type="text" class="form-control" name='nombre' value="{{ old('nombre') }}">
                                            </div>
                                    </div>
                                    <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="label-floating">Dni</label>
                                                <input type="text" class="form-control" name='dni' value="{{ old('dni') }}">
                                            </div>
                                    </div>
                                    <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="label-floating">Localidad</label>
                                                <select name="localidad" class="form-control">
                                                    <option value="" disabled selected>Seleccione una opción</option>
                                                    @foreach ($localidades as $localidad)
                                                    <option value="{{ $localidad->id }}" {{ old('localidad') == $localidad->id ? 'selected' : '' }} >{{ $localidad->nombre }}</option>
                                                    @endforeach
                                                 </select>
                                            </div>
                                    </div>
                                    <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="label-floating">Cargo</label>
                                                <select name="cargo" class="form-control">
                                                    <option value="" disabled {{ old('cargo') == '' ? 'selected' : '' }}>Seleccione una opción</option>
                                                    <option value="Coordinador" {{ old('cargo') == 'Coordinador' ? 'selected' : '' }}>Coordinador</option>
                                                    <option value="Encuestador"  {{ old('cargo') == 'Encuestador' ? 'selected' : '' }}>Encuestador</option>
                                                    <option value="Jefe de Equipo"  {{ old('cargo') == 'Jefe de Equipo' ? 'selected' : '' }}>Jefe de Equipo</option>
                                                    <option value="Jefe de Equipo Volan" {{ old('cargo') == 'Jefe de Equipo Volan' ? 'selected' : '' }}>Jefe de Equipo Volan</option>
                                                    <option value="Recepcionista - Analista" {{ old('cargo') == 'Recepcionista - Analista' ? 'selected' : '' }}>Recepcionista - Analista</option>
                                                    <option value="Subcoordinador" {{ old('cargo') == 'Subcoordinador' ? 'selected' : '' }}>Subcoordinador</option>
                                                    <option value="Supervisor" {{ old('cargo') == 'Supervisor' ? 'selected' : '' }}>Supervisor</option>
                                                </select>
                                            </div>
                                    </div>
                                    <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="label-floating">Encuesta</label>
                                                <select name="encuesta" class="form-control">
                                                        <option value="" disabled selected>Seleccione una opción</option>
                                                        @foreach ($encuestas as $encuesta)
                                                        <option value="{{ $encuesta->id }}" {{ old('encuesta') == $encuesta->id ? 'selected' : '' }} >{{ $encuesta->nombre }}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <div class="form-group justify-content-center">
                                        <label for="exampleInputFile"> <i class="material-icons">
                                                unarchive
                                                </i> Imagen de perfil - máximo 1200 x 1200 px</label>
                                        <input type="file" class="form-control-file" name='img' id="exampleInputFile"  aria-describedby="fileHelp" onchange="loadFile(event)">
                                        </div>
                                    </div>

                                </div>
                                <div class="text-center mt-5">
                                        <button type="submit" class="btn btn-primary">Crear encuestador</button>
                                </div>
                            </form>
                        </div>
                    </div>
        </div>
    </div>
@endsection