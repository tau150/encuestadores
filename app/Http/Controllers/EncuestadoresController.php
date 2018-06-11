<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Encuestador;
use App\Localidad;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Encuestadores;
use App\Http\Requests\EncuestadoresEdit;


class EncuestadoresController extends Controller
{


    public function __constructor()
    {

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function indexPublic()
    {
        $encuestadores = Encuestador::all()->sortByDesc('created_at');

        return view('encuestadores.public', compact('encuestadores'));
    }

    public function index()

    {

        $encuestadores = Encuestador::Latest()->get();

        return view('encuestadores.index', compact('encuestadores'));
    }

    public function apiIndex()
    {
        return Encuestador::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $localidades = Localidad::all();

        return view('encuestadores.create', compact('localidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Encuestadores $request)
    {


        if( request('img') == null ){
            $path = 'profiles/default_user.jpg';
        }else{
            $image = $request->file('img');
            $ext= $image->extension();
            $name= ucfirst(request('apellido')).'_'.ucfirst(request('nombre')).'.'.$ext;
            $path = request('img')->storeAs('profiles',$name, 'public');
        }


      $encuestador =   Encuestador::create([
            'apellido' => request('apellido'),
            'nombre'=> request('nombre'),
            'dni' => request('dni'),
            'localidad_id' => request('localidad'),
            'cargo' => request('cargo'),
            'encuesta' => request('encuesta'),
            'img' => $path
        ]);

        flash('Encuestador creado con éxito.')->success();

        return redirect('/encuestadores');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $localidades = Localidad::all();
        $encuestador= Encuestador::findOrFail($id);


        return view('encuestadores.edit', compact('localidades', 'encuestador'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Encuestadores $request, $id)
    {

        $encuestador = Encuestador::find($id);

        if(  request('img') != null ){

            if( $encuestador->img != 'profiles/default_user.jpg' ){
                Storage::delete('public/'. $encuestador->img);
            }

            $image = $request->file('img');

            $ext= $image->extension();
            $name= ucfirst(request('apellido')).'_'. ucfirst(request('nombre')).'.'.$ext;
            $path = request('img')->storeAs('profiles', $name, 'public');
            $encuestador->img = $path;

        }



        $encuestador->apellido = request('apellido');
        $encuestador->nombre = request('nombre');
        $encuestador->dni = request('dni');
        $encuestador->localidad_id = request('localidad');
        $encuestador->cargo = request('cargo');
        $encuestador->encuesta = request('encuesta');


        $encuestador->save();

        flash('Encuestador actualizado con éxito.')->success();


        return redirect('/encuestadores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $encuestador = Encuestador::find($id);

        if( $encuestador->img != 'profiles/default_user.jpg' ){
            Storage::delete('public/'. $encuestador->img);
        }

        $encuestador->delete();
    }
}
