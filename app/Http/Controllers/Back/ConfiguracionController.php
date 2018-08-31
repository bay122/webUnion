<?php

namespace App\Http\Controllers\back;

use App\ {
    Http\Controllers\Controller
   
};
use Illuminate\Http\Request;
use App\Models\Configuracion;

class ConfiguracionController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $configuracion = Configuracion::find(1);
        return view('back.videos.index',compact('configuracion','id'));
           
    }


     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , $id)
    {

        //Actualizar
        $configuracion = Configuracion::find($id);
        $configuracion->contenido=$request->post('contenido');
        $configuracion->descripcion=$request->post('descripcion');

        if($request->post('estado')==1){

            $col=7;
        }else{
            $col=12;

        }
        
        $configuracion->estado=$request->post('estado');
        $configuracion->col=$col;

        $configuracion->save();

       
       // return view('back.videos.index',compact('configuracion'));
        return redirect()->route('videos.index');
    }

    

   
}
