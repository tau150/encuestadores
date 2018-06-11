<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Encuesta;
use App\Http\Requests\EncuestaRequest;

class EncuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $encuestas = Encuesta::all();
        return view('encuestas.index', compact('encuestas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view('encuestas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EncuestaRequest $request)
    {
            $encuesta =   Encuesta::create([
            'nombre' => request('nombre'),
            'descripcion'=> request('descripcion'),
        ]);

        return redirect('/encuestas');
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
        $encuesta = Encuesta::find($id);

        return view('encuestas.edit', compact('encuesta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EncuestaRequest $request, $id)
    {

        $encuesta = Encuesta::find($id);

        $encuesta->nombre = request('nombre');
        $encuesta->descripcion = request('descripcion');


        $encuesta->save();

        flash('Encuesta actualizada con éxito.')->success();

        return redirect('/encuestas');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $encuesta = Encuesta::find($id);

        if( $encuesta->encuestadores->count() > 0  ) {
            return('not allowed');
        }else{
            $encuesta->delete();
        }
    }
}
