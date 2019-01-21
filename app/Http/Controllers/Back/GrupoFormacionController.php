<?php

namespace App\Http\Controllers\Back;

use App\ {
    Services\Security,
    Http\Controllers\Controller,
    Http\Requests\GrupoFormacionRequest,
    Models\User,
    Models\Ministerio,
    Models\MinisterioDepartamento,
    Models\GrupoFormacion
};

class GrupoFormacionController extends Controller
{
    //use Indexable;

    /**
     * Create a new UserController instance.
     *
     * @param  \App\Repositories\UserRepository $repository
     */
    public function __construct()
    {
        //$this->repository = $repository;

        $this->table = 'grupos_formacion';
    }


     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grupos_formacion = GrupoFormacion::all();
        return view('back.discipulado.index', compact('grupos_formacion'));      
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $discipuladores = User::join('usuarios_ministerios','users.id_usuario', '=', 'usuarios_ministerios.id_usuario')
            ->select('users.id_usuario','users.name','usuarios_ministerios.id_ministerio as ministerio')
            ->where([
                        ['users.bo_activo', '=', 1],
                        ['users.bo_tripulante', '=', 1],
                        ['usuarios_ministerios.id_ministerio', '=', 1],
                        ['usuarios_ministerios.bo_activo', '=', 1],
                        ['usuarios_ministerios.bo_equipo_trabajo', '=', 1]
                    ])->get();
        return view('back.discipulado.create', compact('discipuladores'));      
    }

    /**
     * Display the post.
     *
     * @param  \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(GrupoFormacion $grupo_formacion)
    {
        return view('back.discipulado.edit', compact('grupo_formacion'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    /*protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }*/

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\GrupoFormacionRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(GrupoFormacionRequest $request)
    {
        $test = $request->input("contenido");
        file_put_contents('php://stderr', PHP_EOL.print_r(Security::validar($test, 'string'),true).PHP_EOL, FILE_APPEND);

        //file_put_contents('php://stderr', PHP_EOL.print_r($request->all(),true).PHP_EOL, FILE_APPEND);
        $grupo_formacion = GrupoFormacion::create([
            'id_ministerio' => 1,//Ministerio::find(1),
            'id_departamento' => null,
            'nr_cupo_maximo' => 10,
            'nr_cupo_minimo' => 1,
            'fc_estimada_inicio' => '2018-10-17',
            'fc_inicio' => '2018-10-17',
            'fc_estimada_fin' => '2018-10-17',
            'fc_fin' => '2018-10-17'
        ]);

        file_put_contents('php://stderr', PHP_EOL.print_r($grupo_formacion,true).PHP_EOL, FILE_APPEND);

        /*
        $request->merge(['user_id' => auth()->id()]);
        $request->merge(['active' => $request->has('active')]);

        $post = Post::create($request->all())
         */

        /*$grupo_formacion = GrupoFormacion::find(2);

        file_put_contents('php://stderr', PHP_EOL.print_r($grupo_formacion->ministerio->gl_nombre,true).PHP_EOL, FILE_APPEND);

        if(isset($grupo_formacion->departamento)){
            file_put_contents('php://stderr', PHP_EOL.print_r($grupo_formacion->departamento->gl_nombre,true).PHP_EOL, FILE_APPEND);
        }*/

        /*foreach (GrupoFormacion::all() as $grupo_formacion) {
            file_put_contents('php://stderr', PHP_EOL.print_r($grupo_formacion->id_grupo_formacion,true).PHP_EOL, FILE_APPEND);

        }*/

        $request->session ()->flash ('ok', __('Settings have been successfully saved. '));

        return redirect()->route('discipulado.index', ['page' => $request->page]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\GrupoFormacionRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GrupoFormacionRequest $request , $id)
    {
        /*
         //TODO: Actualizar para que soporte la creación del registor en la BD
        $configuracion = Configuracion::find($id);

        //Seteo de variables Basicas
        $html_descripcion = "";
        $tamano_columnas = 12;//Tamaño para videos sin descripcion (para transmisión en vivo)
        $video_base = (!empty($request->post('contenido')))?$request->post('contenido'):$this->_video_base;
        $mostrar_descripcion_video = (!empty($request->post('estado')))?$request->post('estado'):0;
        $titulo = (!empty($request->post('titulo')))?$request->post('titulo'):$this->_titulo;
        $fecha = (!empty($request->post('fecha')))?$request->post('fecha'):$this->_fecha;
        $categoria = (!empty($request->post('categoria')))?$request->post('categoria'):$this->_categoria;
        $descripcion = (!empty($request->post('descripcion')))?$request->post('descripcion'):$this->_descripcion;

        //iframe
        //return redirect('bar')->withErrors(['baz' => 'FAIL!']);

        //Validacion si el video debe mostrar una descripcion
        if($mostrar_descripcion_video==1){
            //Formateo de contenido para videos con descripcion
            $parametros = ["{TITULO}","{CATEGORIA}","{FECHA}","{CONTENIDO_DESCRIPCION}"];
            $datos_video = array($titulo,$fecha,$categoria,$descripcion);
            $html_descripcion = str_replace($parametros,$datos_video,$this->_html_descripcion);

            $tamano_columnas=7;
        }

        $configuracion->contenido   = $this->revisarString($video_base);
        $configuracion->titulo      = $this->revisarString($titulo);
        $configuracion->categoria   = $this->revisarString($categoria);
        $configuracion->fecha       = $this->revisarString($fecha);
        $configuracion->descripcion = $this->revisarString($descripcion);
        $configuracion->html        = $this->revisarString($html_descripcion);
        $configuracion->estado      = $this->revisarString($mostrar_descripcion_video);
        $configuracion->col         = $tamano_columnas;

        $configuracion->save();
         */
        $request->session ()->flash ('ok', __('Settings have been successfully saved. '));

        return redirect()->route('back.discipulado.index', ['page' => $request->page]);
    }

    /**
     * Remove the user from storage.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(GrupoFormacion $grupoFormacion)
    {
        //$user->delete ();

        return response ()->json ();
    }
}
