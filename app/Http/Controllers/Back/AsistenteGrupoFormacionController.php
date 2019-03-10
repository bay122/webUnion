<?php

namespace App\Http\Controllers\Back;

use DB;
use Redirect;
use Illuminate\Http\Request;
use App\ {
    Services\Security,
    Services\Helper,
    Http\Controllers\Controller,
    //Http\Requests\ModeradorGrRequest,
    Http\Requests\IntegranteGrupoFormacionRequest,
    Models\User,
    Models\UsuarioDatos,
    Models\UsuarioContacto,
    Models\UsuarioMinisterio,
    Models\Ministerio,
    Models\MinisterioDepartamento,
    Models\GrupoFormacion,
    Models\GrupoFormacionTipo,
    Models\GrupoFormacionTipoSexo,
    Models\GrupoFormacionUsuario,
    Models\Pais,
    Models\Region,
    Models\Comuna
};

class AsistenteGrupoFormacionController extends Controller
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

        $this->table = 'users';
    }


       /*** INTEGRANTES ***/

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //public function index(GrupoFormacion $grupoFormacion)
    public function index($grupoFormacion)
    {
        $grupo_formacion = GrupoFormacion::findOrFail($grupoFormacion);

        $estado_cupo = 'Completo';
        $estado_cupo_color = 'danger';
        $info_box_color = 'red';

        if($grupo_formacion->asistentes->count() < ($grupo_formacion->nr_cupo_maximo - 3)){
	    	$estado_cupo = 'Disponible';
        	$estado_cupo_color = 'success';
        	$info_box_color = 'green';
        }
	    elseif($grupo_formacion->asistentes->count() >= ($grupo_formacion->nr_cupo_maximo - 3) &&
	        $grupo_formacion->asistentes->count() < ($grupo_formacion->nr_cupo_maximo)){
	    	$estado_cupo = 'Disponible';
        	$estado_cupo_color = 'warning';
        	$info_box_color = 'yellow';
	    }

	    $porcentaje_cupo = (($grupo_formacion->asistentes->count()*100)/$grupo_formacion->nr_cupo_maximo);

	    $sexo_integrantes_color = 'default';
	    if($grupo_formacion->tipo_sexo->gl_nombre == 'Masculino'){
	    	$sexo_integrantes_color = 'primary';
	    }
	    elseif($grupo_formacion->tipo_sexo->gl_nombre == 'Femenino'){
	    	$sexo_integrantes_color = 'pink';
	    }
	    elseif($grupo_formacion->tipo_sexo->gl_nombre == 'Mixto'){
	    	$sexo_integrantes_color = 'purple';
	    }

        Helper::loadJavascript("back/GrupoFormacion/integrantes_index.js");
        Helper::loadCss("back/IntegrantesGrupoFormacion/integrantes.css");
        
        return view('back.discipulado.asistentes.index', compact(
															'grupo_formacion',
															'estado_cupo',
															'estado_cupo_color',
															'info_box_color',
															'porcentaje_cupo',
															'sexo_integrantes_color'
        			));//compact('grupos_formacion', 'id_ministerio'));      
    }

     /**
     * Search resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function buscar(Request $request)//$data)
    {
        $result = ["result" => true, "usuario" => null];
        try{
            $gl_mail = Security::validar($request->input("email"), 'string');
            
            $usuario = User::where('email', $gl_mail)->first();
            
            if(!empty($usuario)){
                file_put_contents('php://stderr', PHP_EOL.print_r($usuario,true).PHP_EOL, FILE_APPEND);
                $datos_generales = $usuario->datos;
                $datos_usuario = [
                    "id_usuario"        => $usuario->id_usuario,
                ];
                if(!empty($datos_generales)){
                    $datos_usuario["nombres"]            = $datos_generales->gl_nombres;
                    $datos_usuario["apellido_paterno"]   = $datos_generales->gl_apellido_paterno;
                    $datos_usuario["apellido_materno"]   = $datos_generales->gl_apellido_materno;
                    $datos_usuario["gl_sexo"]            = $datos_generales->gl_sexo;
                    $datos_usuario["rut"]                = $datos_generales->gl_rut;
                    $datos_usuario["fc_nacimiento"]      = $datos_generales->fc_nacimiento;
                    $datos_usuario["fc_llegada_iglesia"] = $datos_generales->fc_llegada_iglesia;
                    
                    if(!empty($datos_generales->pais_origen)){
                        $datos_usuario["pais_origen"] = $datos_generales->pais_origen->id_pais;   
                    }
                    if(!empty($datos_generales->region)){
                        $datos_usuario["region"] = $datos_generales->region->id_region;   
                    }
                    if(!empty($datos_generales->nacionalidad)){
                        $datos_usuario["nacionalidad"] = $datos_generales->nacionalidad->id_pais;   
                    }
                    if(!empty($datos_generales->comuna)){
                        $datos_usuario["comuna"] = $datos_generales->comuna->id_comuna;   
                    }
                }
                

                //@TODO: parsear:
                //    telefono: "[{"gl_telefono":"","bo_activo":true,"bo_principal":true}]"
                if($usuario->datos_contacto->count() > 0){
                    foreach($usuario->datos_contacto as $dato_contacto){
                        if($dato_contacto->id_usuario_tipo_contacto == UsuarioContacto::$TIPO_CONTACTO_TELEFONO_FIJO){
                            $datos_usuario["telefono"] = $dato_contacto->gl_json_dato_contacto;
                        }
                        elseif($dato_contacto->id_usuario_tipo_contacto == UsuarioContacto::$TIPO_CONTACTO_TELEFONO_MOVIL){
                            $datos_usuario["telefono"] = $dato_contacto->gl_json_dato_contacto;
                        }
                        elseif($dato_contacto->id_usuario_tipo_contacto == UsuarioContacto::$TIPO_CONTACTO_DIRECCION){
                            $datos_usuario["direccion"] = $dato_contacto->gl_json_dato_contacto;
                        }
                    }
                }

                $result["usuario"] = $datos_usuario;
                
            }
        }catch(\Exception $e)
        {
            file_put_contents('php://stderr', PHP_EOL.print_r($e->getMessage(),true).PHP_EOL, FILE_APPEND);
            $result["result"] = false;
            $result["mensaje"] = "Ocurrió un error desconocido, si el error persiste contactese con soporte.";
        }
        return response()->json($result);
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($grupoFormacion)
    {        
        $paises = Pais::all();
        $paisDefault = Pais::$PAIS_CHILE;
        $regiones = Region::all();
        $regionDefault = Region::$REGION_VALPARAISO;
        $comunas = Comuna::all();
        $comunaDefault = Comuna::$COMUNA_VIÑA_DEL_MAR;
        $id_grupo_formacion = $grupoFormacion;
        $grupo_formacion = GrupoFormacion::find($grupoFormacion);//findOrFail

        $box_color = 'box-danger';
        $info_box_color = 'red';

        if($grupo_formacion->asistentes->count() < ($grupo_formacion->nr_cupo_maximo - 3)){
	    	$box_color = 'box-success';
	    	$info_box_color = 'green';
        }
	    elseif($grupo_formacion->asistentes->count() >= ($grupo_formacion->nr_cupo_maximo - 3) &&
	            $grupo_formacion->asistentes->count() < ($grupo_formacion->nr_cupo_maximo)){
	    	$box_color = 'box-warning';
	    	$info_box_color = 'yellow';
	    }

	    $porcentaje_cupo = (($grupo_formacion->asistentes->count()*100)/$grupo_formacion->nr_cupo_maximo);
	    
	    Helper::loadJavascript("back/GrupoFormacion/integrantes_index.js");
        Helper::loadCss("back/IntegrantesGrupoFormacion/integrantes.css");
        
        return view('back.discipulado.asistentes.create',
        			 compact('paises',
        			 		 'regiones',
        			 		 'comunas',
        			 		 'paisDefault',
        			 		 'regionDefault',
        			 		 'comunaDefault',
        			 		 'id_grupo_formacion',
        			 		 'grupo_formacion',
        			 		 'box_color',
        			 		 'info_box_color',
        			 		 'porcentaje_cupo'
        			));
    }

    /**
     * Display the post.
     *
     * @param  \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(GrupoFormacion $grupo_formacion)
    {
        return view('back.discipulado.asistentes.edit', compact('grupo_formacion'));
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
     * @param  \Illuminate\Http\IntegranteGrupoFormacionRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(IntegranteGrupoFormacionRequest $request)
    {
        //file_put_contents('php://stderr', PHP_EOL.print_r($request->all(),true).PHP_EOL, FILE_APPEND);
        
        $id_grupo_formacion     =   Security::validar($request->input("id_grupo_formacion") , 'numero');
        $bo_moderador           =   Security::validar($request->input("bo_moderador")       , 'numero');
        $gl_nombres             =   Security::validar($request->input("nombres")            , 'string');
        $gl_apellido_paterno    =   Security::validar($request->input("apellido_paterno")   , 'string');
        $gl_apellido_materno    =   Security::validar($request->input("apellido_materno")   , 'string');
        $gl_email               =   Security::validar($request->input("email")              , 'string');
        $gl_sexo                =   Security::validar($request->input("gl_sexo")            , 'string');
        $gl_telefono            =   Security::validar($request->input("telefono")           , 'string');
        $gl_rut                 =   Security::validar($request->input("rut")                , 'string');
        $fc_nacimiento          =   Security::validar($request->input("fc_nacimiento")      , 'date');
        $nr_edad                =   Security::validar($request->input("edad")               , 'numero');
        //$fc_llegada_iglesia     =   Security::validar($request->input("fc_llegada_iglesia") , 'date');
        $id_pais_origen         =   Security::validar($request->input("pais_origen")        , 'string');
        $id_region              =   Security::validar($request->input("region")             , 'string');
        $id_nacionalidad        =   Security::validar($request->input("nacionalidad")       , 'string');
        $id_comuna              =   Security::validar($request->input("comuna")             , 'string');
        $gl_direccion           =   Security::validar($request->input("direccion")          , 'string');

        $bo_discipulado_previo  =   Security::validar($request->input("bo_discipulado_previo"), 'numero');
        $gl_discipulador_anterior=  Security::validar($request->input("gl_discipulador_anterior"), 'string');
        $bo_iglesia_anterior    =   Security::validar($request->input("bo_iglesia_anterior"), 'numero');
        $gl_otra_iglesia        =   Security::validar($request->input("gl_otra_iglesia"), 'string');
        $gl_observaciones       =   Security::validar($request->input("gl_observaciones"), 'string');

        $fc_llegada_iglesia     =   Security::validar($request->input("fc_llegada_iglesia") , 'numero');
        $gl_llegada_iglesia = "";

        switch ($fc_llegada_iglesia) {
            case 1:
                $gl_llegada_iglesia = "menos de 1 año";
                break;
            case 2:
                $gl_llegada_iglesia = "1 año";
                break;
            case 3:
                $gl_llegada_iglesia = "2 a 3 años";
                break;
            case 4:
                $gl_llegada_iglesia = "más de 4 años";
                break;
        }

        $json_otros_datos = [
            "nr_edad"               => $nr_edad,
            'fc_llegada_iglesia'    => $fc_llegada_iglesia,
            'gl_llegada_iglesia'    => $gl_llegada_iglesia,
            'bo_discipulado_previo' => $bo_discipulado_previo,
            'gl_discipulador_anterior' => $gl_discipulador_anterior,
            'bo_iglesia_anterior'   => $bo_iglesia_anterior,
            'gl_otra_iglesia'       => $gl_otra_iglesia,
            'gl_observaciones'      => $gl_observaciones,
        ];
        

        $grupo_formacion        = GrupoFormacion::findOrFail($id_grupo_formacion);

        
        DB::beginTransaction();

        //TODO: agregar tipo de discipulado (jovenes, adulto, damas)
        //TODO: agregar diferenciación de edades
        //Se discipulo antes?
            //Si: ->con quien?

        try {
            $role = "user";
            $bo_tripulante = false;
            $bo_equipo_trabajo = false;
            
            if($bo_moderador){
                $role = "tripulante";
                $bo_tripulante = true;
                $bo_equipo_trabajo = true;
            }

            //@TODO: realizar insert validando si existe id_usuario proveniente de función buscar
            //$usuario = User::create([
            $usuario = User::updateOrCreate(['email' => $gl_email],
            	[
                'name' => $gl_nombres.' '.$gl_apellido_paterno.' '.$gl_apellido_materno,
                //'password' => 
                //'remember_token' => 
                'role' => $role,
                'confirmed' => false,
                //'confirmation_code' => 
                'valid' => false,
                'bo_bloqueado' => false,
                'bo_tripulante' => $bo_tripulante,
                'bo_corporacion' => false,
                'bo_activo' => true,
                //'created_at' => 
                //'updated_at' => 
            ]);

            $datos_usuario = UsuarioDatos::updateOrCreate(['id_usuario' => $usuario->id_usuario],[
                //'id_usuarios_datos' => $id_usuarios_datos,
                //'id_usuario' => $usuario->id_usuario,
                'gl_rut' => $gl_rut,
                'gl_nombres' => $gl_nombres,
                'gl_apellido_paterno' => $gl_apellido_paterno,
                'gl_apellido_materno' => $gl_apellido_materno,
                'id_region' => $id_region,
                'id_comuna' => $id_comuna,
                //'fc_llegada_iglesia' => $fc_llegada_iglesia,
                'fc_nacimiento' => $fc_nacimiento,
                'id_pais_origen' => $id_pais_origen,
                'id_nacionalidad' => $id_nacionalidad,
                'gl_sexo' => $gl_sexo,
                'json_otros_datos' => json_encode($json_otros_datos),
                //'created_at' => $created_at,
                //'updated_at' => $updated_at,
            ]);
            
            $datos_contacto_usuario = UsuarioContacto::updateOrCreate(['id_usuario' => $usuario->id_usuario, 'id_usuario_tipo_contacto' => UsuarioContacto::$TIPO_CONTACTO_TELEFONO_MOVIL],[
                //'id_usuario_contacto' => $id_usuario_contacto,
                //'id_usuario' => $usuario->id_usuario,
                //'id_usuario_tipo_contacto' => UsuarioContacto::$TIPO_CONTACTO_TELEFONO_MOVIL,
                'bo_activo' => true,
                'gl_json_dato_contacto' => json_encode([["gl_telefono"=>$gl_telefono, "bo_activo"=>true, "bo_principal"=>true]]),
                //'created_at' => $created_at,
                //'updated_at' => $updated_at,
            ]);
            
            $datos_contacto_usuario = UsuarioContacto::updateOrCreate(['id_usuario' => $usuario->id_usuario,
                'id_usuario_tipo_contacto' => UsuarioContacto::$TIPO_CONTACTO_DIRECCION],[
                //'id_usuario_contacto' => $id_usuario_contacto,
                //'id_usuario' => $usuario->id_usuario,
                //'id_usuario_tipo_contacto' => UsuarioContacto::$TIPO_CONTACTO_DIRECCION,
                'bo_activo' => true,
                'gl_json_dato_contacto' => json_encode([["gl_direccion"=>$gl_direccion, "bo_activo"=>true, "bo_principal"=>true]]),
                //'created_at' => $created_at,
                //'updated_at' => $updated_at,
            ]);

            /**
             * TODO: ¿Como se comporta el modelo de BD cuando alguien finaliza el discipulado y se vuelve discipulador?
             * ->fc_inicio/fc_fin
             * Imagino que se crea un UsuarioMinisterio diferente, aun que el ministerio sea el mismo, el rol que cumple es diferente
             * y cada registro guardara los datos correspondientes al proceso en cuestion.
             * si el usuario abandona un discipulado o grupo de formación, tendrá fecha de fin y ese registro pasará a estar inactivo.
             * en ese caso quizas seria bueno agregar un campo nuevo, para los casos en donde se desea eliminar (como bo_eliminado o algo asi)
             * aun que quizas sea suficiente con bo que registra el usuario
             */
            
            $usuario_ministerio = UsuarioMinisterio::updateOrCreate(['id_usuario' => $usuario->id_usuario,
                'id_ministerio' => Ministerio::$MINISTERIO_DISCIPULADO_FUNDAMENTAL],[
                //'id_usuario_ministerio' => $id_usuario_ministerio,
                //'id_usuario' => $usuario->id_usuario,
                //'id_ministerio' => Ministerio::$MINISTERIO_DISCIPULADO_FUNDAMENTAL,
                //'id_ministerio_departamento' => $id_ministerio_departamento,
                'bo_directiva' => false,//$bo_directiva,
                'bo_participante' => false,//$bo_participante,
                'bo_equipo_trabajo' => $bo_equipo_trabajo,//$bo_equipo_trabajo,
                'bo_activo' => true,//$bo_activo,
                'fc_inicio' => $grupo_formacion->fc_estimada_inicio,//$fc_inicio,
                'fc_fin' => null,//$fc_fin,
                //'created_at' => $created_at,
                //'updated_at' => $updated_at,
            ]);

            $encargado_grupo_formacion = GrupoFormacionUsuario::create([
                'id_grupo_formacion' => $grupo_formacion->id_grupo_formacion,
                'id_usuario' => $usuario->id_usuario,
                'fc_ingreso' => date("Y-m-d H:i:s"),
                'bo_moderador' => $bo_moderador,
                //'json_otros_datos' => $json_otros_datos,
                'id_usuario_crea' => auth()->id(),//$id_usuario_crea,
                //'created_at' => $created_at
            ]);

        } catch(ValidationException $e)
        {
            // Rollback and then redirect
            // back to form with errors
            DB::rollback();
            return Redirect::back()
                ->withErrors( $e->getMessage() )
                ->withInput();
        } catch(\Exception $e)
        {
             // Rollback and then redirect
            // back to form with errors
            DB::rollback();

            file_put_contents('php://stderr', PHP_EOL.print_r($e->getMessage(),true).PHP_EOL, FILE_APPEND);

            // Back to form with errors
            /**
             * Docs:
             *      https://laravel.com/docs/5.4/requests#old-input
             *      https://stackoverflow.com/a/19839060
             */
            return Redirect::back()
                ->withErrors( "Ocurrió un error inesperado. Si el error persiste, contactese con soporte." )
                ->withInput();
        }

        //file_put_contents('php://stderr', PHP_EOL.print_r($request->all(),true).PHP_EOL, FILE_APPEND);
        

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

        // If we reach here, then
        // data is valid and working.
        // Commit the queries!
        DB::commit();

        $request->session ()->flash ('ok', __('The data has been updated successfully. '));

        return redirect()->route('discipulado.asistentes.index', ['page' => $id_grupo_formacion]);
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
        $request->session ()->flash ('ok', __('The data has been updated successfully. '));

        return redirect()->route('back.discipulado.asistentes.index', ['page' => $request->page]);
    }

    /**
     * Remove the user from storage.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_grupo_formacion_usuario)//$id_integrante, $id_grupo_formacion)
    {
        //$user->delete ();        
        DB::beginTransaction();

        try {
            /*$integrante_actual = GrupoFormacionUsuario::where('id_grupo_formacion', $id_grupo_formacion)
                                 ->where('id_usuario', $id_integrante)
                                 ->where('bo_activo', 1)->first();*/
            $integrante_actual = GrupoFormacionUsuario::find($id_grupo_formacion_usuario);
            if($integrante_actual->bo_activo){
                $integrante_actual->bo_activo = false;//Marco como finalizada la actividad de este usuario en este grupo
                $integrante_actual->fc_salida = date("Y-m-d H:i:s");//actualizo la fecha de salida

                $json_otros_datos = array();
                
                if(!empty($integrante_actual->json_otros_datos)){
                    $json_otros_datos = json_decode($integrante_actual->json_otros_datos, true);
                }

                $json_otros_datos["gl_motivo_salida"] = "SE ELIMINA EL INTEGRANTE";//guardo el motivo de la salida
                $integrante_actual->json_otros_datos = json_encode($json_otros_datos);
                $integrante_actual->id_usuario_actualiza = auth()->id();//registro quien realizó el cambio
                
                $integrante_actual->save();//guardo los cambios
            }
            
        } catch(ValidationException $e)
        {
            // Rollback and then redirect
            // back to form with errors
            DB::rollback();
            return response ($e->getMessage(), 400);
        } catch(\Exception $e)
        {
             // Rollback and then redirect
            // back to form with errors
            DB::rollback();

            file_put_contents('php://stderr', PHP_EOL.print_r("Ocurrió un error inesperado: ",true).PHP_EOL, FILE_APPEND);
            file_put_contents('php://stderr', PHP_EOL.print_r($e->getMessage(),true).PHP_EOL, FILE_APPEND);

            // Back to form with errors
            /**
             * Docs:
             *      https://laravel.com/docs/5.4/requests#old-input
             *      https://stackoverflow.com/a/19839060
             */
            return response ("Ocurrió un error inesperado. Si el error persiste, contactese con soporte.", 500);
        }

        // If we reach here, then
        // data is valid and working.
        // Commit the queries!
        DB::commit();

        return response ("Registro eliminado exitosamente", 200);
    }
}
