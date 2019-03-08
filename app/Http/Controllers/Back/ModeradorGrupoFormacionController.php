<?php

namespace App\Http\Controllers\Back;

use DB;
use Redirect;
use Request;
use App\ {
    Services\Security,
    Http\Controllers\Controller,
    Http\Requests\ModeradorGrupoFormacionRequest,
    Http\Requests\ModeradorGrupoFormacionUpdateRequest,
    Models\GrupoFormacionUsuario,
    Models\User,
    Models\UsuarioMinisterio,
    Models\UsuarioContacto,
    Models\UsuarioDatos,
    Models\Ministerio,
    Models\MinisterioDepartamento,
    Models\Pais,
    Models\Region,
    Models\Comuna
};

class ModeradorGrupoFormacionController extends Controller
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


     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        $id_ministerio = 1;
        
        return view('back.discipulado.moderador.index', compact('discipuladores', 'id_ministerio'));
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    	$paises = Pais::all();
    	$paisDefault = Pais::$PAIS_CHILE;
		$regiones = Region::all();
		$regionDefault = Region::$REGION_VALPARAISO;
		$comunas = Comuna::all();
		$comunaDefault = Comuna::$COMUNA_VIÑA_DEL_MAR;
        $bo_moderador = true;

        Helper::loadJavascript("back/GrupoFormacion/integrantes_index.js");
        Helper::loadCss("back/IntegrantesGrupoFormacion/integrantes.css");
        
    	//return view('back.discipulado.moderador.create', compact('paises', 'regiones', 'comunas','paisDefault', 'regionDefault', 'comunaDefault'));
        return view('back.discipulado.asistentes.create', 
        			  compact('paises',
        			  		  'regiones', 
        			  		  'comunas',
        			  		  'paisDefault',
        			  		  'regionDefault',
        			  		  'comunaDefault',
        			  		  'bo_moderador'
        			  ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\GrupoFormacionRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(ModeradorGrupoFormacionRequest $request)
    {
        // file_put_contents('php://stderr', PHP_EOL.print_r($usuario,true).PHP_EOL, FILE_APPEND);

        $bo_moderador           =   Security::validar($request->input("bo_moderador")       , 'numero');
        $gl_nombres             =   Security::validar($request->input("nombres")            , 'string');
        $gl_apellido_paterno    =   Security::validar($request->input("apellido_paterno")   , 'string');
        $gl_apellido_materno    =   Security::validar($request->input("apellido_materno")   , 'string');
        $gl_email               =   Security::validar($request->input("email")              , 'string');
        $gl_sexo                =   Security::validar($request->input("gl_sexo")            , 'string');
        $gl_telefono            =   Security::validar($request->input("telefono")           , 'string');
        $gl_rut                 =   Security::validar($request->input("rut")                , 'string');
        $fc_nacimiento          =   Security::validar($request->input("fc_nacimiento")      , 'date');//TODO: validar date
        $fc_llegada_iglesia     =   Security::validar($request->input("fc_llegada_iglesia") , 'date');//TODO: validar date
        $id_pais_origen         =   Security::validar($request->input("pais_origen")        , 'string');
        $id_region              =   Security::validar($request->input("region")             , 'string');
        $id_nacionalidad        =   Security::validar($request->input("nacionalidad")       , 'string');
        $id_comuna              =   Security::validar($request->input("comuna")             , 'string');
        $gl_direccion           =   Security::validar($request->input("direccion")          , 'string');
        
        
        DB::beginTransaction();

        try {
            $role = "user";
            $bo_tripulante = false;
            $bo_equipo_trabajo = false;
            
            if($bo_moderador){
                $role = "tripulante";
                $bo_tripulante = true;
                $bo_equipo_trabajo = true;
            }

            $usuario = User::create([
                'name' => $gl_nombres.' '.$gl_apellido_paterno.' '.$gl_apellido_materno,
                'email' => $gl_email,
                //'password' => 
                //'remember_token' => 
                'role' => 'tripulante',
                'confirmed' => false,
                //'confirmation_code' => 
                'valid' => false,
                'bo_bloqueado' => false,
                'bo_tripulante' => true,
                'bo_corporacion' => false,
                'bo_activo' => true,
                //'created_at' => 
                //'updated_at' => 
            ]);

            $datos_usuario = UsuarioDatos::create([
                //'id_usuarios_datos' => $id_usuarios_datos,
                'id_usuario' => $usuario->id_usuario,
                'gl_rut' => $gl_rut,
                'gl_nombres' => $gl_nombres,
                'gl_apellido_paterno' => $gl_apellido_paterno,
                'gl_apellido_materno' => $gl_apellido_materno,
                'id_region' => $id_region,
                'id_comuna' => $id_comuna,
                'fc_llegada_iglesia' => $fc_llegada_iglesia,
                'fc_nacimiento' => $fc_nacimiento,
                'id_pais_origen' => $id_pais_origen,
                'id_nacionalidad' => $id_nacionalidad,
                'gl_sexo' => $gl_sexo,
                //'created_at' => $created_at,
                //'updated_at' => $updated_at,
            ]);
            
            $datos_contacto_usuario = UsuarioContacto::create([
                //'id_usuario_contacto' => $id_usuario_contacto,
                'id_usuario' => $usuario->id_usuario,
                'id_usuario_tipo_contacto' => UsuarioContacto::$TIPO_CONTACTO_TELEFONO_MOVIL,
                'bo_activo' => true,
                'gl_json_dato_contacto' => json_encode([["gl_telefono"=>$gl_telefono, "bo_activo"=>true, "bo_principal"=>true]]),
                //'created_at' => $created_at,
                //'updated_at' => $updated_at,
            ]);
            
            $datos_contacto_usuario = UsuarioContacto::create([
                //'id_usuario_contacto' => $id_usuario_contacto,
                'id_usuario' => $usuario->id_usuario,
                'id_usuario_tipo_contacto' => UsuarioContacto::$TIPO_CONTACTO_DIRECCION,
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
            
            $usuario_ministerio = UsuarioMinisterio::create([
                //'id_usuario_ministerio' => $id_usuario_ministerio,
                'id_usuario' => $usuario->id_usuario,
                'id_ministerio' => Ministerio::$MINISTERIO_DISCIPULADO_FUNDAMENTAL,
                //'id_ministerio_departamento' => $id_ministerio_departamento,
                'bo_directiva' => false,//$bo_directiva,
                'bo_participante' => false,//$bo_participante,
                'bo_equipo_trabajo' => true,//$bo_equipo_trabajo,
                'bo_activo' => true,//$bo_activo,
                'fc_inicio' => date("Y-m-d H:i:s"),//$fc_inicio,
                'fc_fin' => null,//$fc_fin,
                //'created_at' => $created_at,
                //'updated_at' => $updated_at,
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

            file_put_contents('php://stderr', PHP_EOL."Error Inesperado".print_r($e->getMessage(),true).PHP_EOL, FILE_APPEND);

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

        return redirect()->route('discipulado.asistentes.index');
    }

    /**
     * Display the post.
     *
     * @param  \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(GrupoFormacion $grupo_formacion)
    {
        //return view('back.discipulado.moderador.edit', compact('user'));
        return view('back.discipulado.asistentes.edit', compact('grupo_formacion'));
    }

    /**
     * Display the user.
     *
     * @param  \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id_discipulador)
    {
        $discipulador = GrupoFormacionUsuario::findOrFail($id_discipulador);
        return view('back.discipulado.moderador.edit', compact('discipulador'));
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ModeradorRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ModeradorGrupoFormacionUpdateRequest $request , $id)
    {
        DB::beginTransaction();

        try {
            $discipulador = GrupoFormacionUsuario::findOrFail($id);
            $discipulador->bo_moderador  = Security::validar($request->input("bo_moderador"), 'numero');
            $id_grupo_formacion = $discipulador->grupo_formacion->id_grupo_formacion;//parametro para regresar en navegacion
            $discipulador->save();
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

            file_put_contents('php://stderr', PHP_EOL.print_r("Ocurrió un error inesperado: ",true).PHP_EOL, FILE_APPEND);
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

        // If we reach here, then
        // data is valid and working.
        // Commit the queries!
        DB::commit();

        $request->session ()->flash ('ok', __('The data has been updated successfully. '));

        return redirect()->route('discipulado.asistentes.index', ['page' => $id_grupo_formacion]);
    }

    /**
     * Remove the user from storage.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $request)
    {
        //$user->delete ();

        return response ()->json ();
    }
}
