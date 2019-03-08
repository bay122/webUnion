<?php

namespace App\Http\Controllers\Back;

use DB;
use Redirect;
use Request;
use App\ {
	Services\Access,
    Services\Security,
    Services\Helper,
    Http\Controllers\Controller,
    Http\Requests\GrupoFormacionRequest,
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
		Access::checkPerfil();//hacerlo asi? usar un middleware? 
        $grupos_formacion = GrupoFormacion::all()->where("bo_estado", true);
        $id_ministerio = 1;
        
        //$this->include_javascript[] = "back/GrupoFormacion/index.js";

        Helper::loadJavascript("back/GrupoFormacion/index.js");
        Helper::loadCss("back/GrupoFormacion/index.css");

        return view('back.discipulado.index', compact('grupos_formacion', 'id_ministerio'));
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

        if(!$discipuladores->isEmpty()){
        	//file_put_contents('php://stderr', PHP_EOL . print_r($discipuladores, TRUE). PHP_EOL, FILE_APPEND);
        	$tipos_grupo_formacion = GrupoFormacionTipo::all();
	        $tipos_sexo = GrupoFormacionTipoSexo::all();

	        return view('back.discipulado.create', compact('discipuladores', 'tipos_grupo_formacion', 'tipos_sexo'));      
        }else{
        	file_put_contents('php://stderr', PHP_EOL . print_r("No existen discipuladores", TRUE). PHP_EOL, FILE_APPEND);
        	request()->session()->flash('warning', __('No existen discipuladores'));
        	return $this->index();
        }
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
        $id_ministerio 			= 	Security::validar($request->input("ministerio")			, 'numero');
        $nr_cupo_maximo 		= 	Security::validar($request->input("nr_cupo_maximo")		, 'numero');
        $nr_cupo_minimo 		= 	Security::validar($request->input("nr_cupo_minimo")		, 'numero');
        $fc_estimada_inicio 	= 	Security::validar($request->input("fc_estimada_inicio")	, 'string');//TODO: validar date
        $fc_estimada_fin 		= 	Security::validar($request->input("fc_estimada_fin")	, 'string');//TODO: validar date
        $id_usuario_moderador 	= 	Security::validar($request->input("discipulador")		, 'numero');

        $hr_inicio 				= 	Security::validar($request->input("hr_inicio")			, 'string');
		$hr_fin 				= 	Security::validar($request->input("hr_fin")				, 'string');
		$nr_dia_semana 			= 	Security::validar($request->input("nr_dia_semana")		, 'numero');
    	$fc_inicio 				=	Security::validar($request->input("fc_inicio")			, 'string');//TODO: validar date
    	$fc_fin 				= 	Security::validar($request->input("fc_fin")				, 'string');//TODO: validar date

        $id_grupo_formacion_tipo		= 	Security::validar($request->input("id_grupo_formacion_tipo")		, 'numero', 'nullable');
        $id_grupo_formacion_tipos_sexo	= 	Security::validar($request->input("id_grupo_formacion_tipos_sexo")	, 'numero', 'nullable');


        DB::beginTransaction();
        
        try {
        	$datos_grupo_formacion = [
	            'id_ministerio' => Ministerio::$MINISTERIO_DISCIPULADO_FUNDAMENTAL,//Ministerio::find(1),
	            //'id_departamento' => null,
	            'nr_cupo_maximo' 		=> $nr_cupo_maximo,//10,
	            'nr_cupo_minimo' 		=> $nr_cupo_minimo,//1,
	            'fc_estimada_inicio'	=> $fc_estimada_inicio,
	            'fc_estimada_fin' 		=> $fc_estimada_fin,
	            'hr_inicio' 			=> $hr_inicio,
				'hr_fin' 				=> $hr_fin,
				'nr_dia_semana' 		=> $nr_dia_semana,
				'id_grupo_formacion_tipo' => $id_grupo_formacion_tipo,
				'id_grupo_formacion_tipos_sexo' => $id_grupo_formacion_tipos_sexo,
				'id_usuario_crea' 		=> auth()->id(),
	        ];

	        if(!empty($request->input("fc_inicio"))){
	        	$datos_grupo_formacion["fc_inicio"] = $fc_inicio;
	        }
	        if(!empty($request->input("fc_fin"))){
	        	$datos_grupo_formacion["fc_fin"] = $fc_fin;
	        }

	        $grupo_formacion = GrupoFormacion::create($datos_grupo_formacion);

	        file_put_contents('php://stderr', PHP_EOL.print_r($grupo_formacion->id_grupo_formacion,true).PHP_EOL, FILE_APPEND);

	        $encargado_grupo_formacion = GrupoFormacionUsuario::create([
	        	'id_grupo_formacion' => $grupo_formacion->id_grupo_formacion,
				'id_usuario' => $id_usuario_moderador,
				'fc_ingreso' => $fc_estimada_inicio,
				'bo_moderador' => true,
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
		     * 		https://laravel.com/docs/5.4/requests#old-input
		     * 		https://stackoverflow.com/a/19839060
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

        return redirect()->route('discipulado.index', ['page' => $request->page]);
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
     * Display the post.
     *
     * @param  \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id_grupo_formacion)
    {
    	$grupo_formacion = GrupoFormacion::findOrFail($id_grupo_formacion);

    	$discipuladores = User::join('usuarios_ministerios','users.id_usuario', '=', 'usuarios_ministerios.id_usuario')
            ->select('users.id_usuario','users.name','usuarios_ministerios.id_ministerio as ministerio')
            ->where([
                        ['users.bo_activo', '=', 1],
                        ['users.bo_tripulante', '=', 1],
                        ['usuarios_ministerios.id_ministerio', '=', 1],
                        ['usuarios_ministerios.bo_activo', '=', 1],
                        ['usuarios_ministerios.bo_equipo_trabajo', '=', 1]
                    ])->get();

        $tipos_grupo_formacion = GrupoFormacionTipo::all();
        $tipos_sexo = GrupoFormacionTipoSexo::all();

        return view('back.discipulado.edit', compact('grupo_formacion', 'discipuladores', 'tipos_grupo_formacion', 'tipos_sexo'));
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
        //Ejemplo:
        //$video_base = (!empty($request->post('contenido')))?$request->post('contenido'):$this->_video_base;
        
        DB::beginTransaction();

        try {
	        $grupo_formacion = GrupoFormacion::findOrFail($id);
	        
	        $grupo_formacion->nr_cupo_maximo 		= 	Security::validar($request->input("nr_cupo_maximo")		, 'numero');
	        $grupo_formacion->nr_cupo_minimo 		= 	Security::validar($request->input("nr_cupo_minimo")		, 'numero');
	        $grupo_formacion->hr_inicio 			= 	Security::validar($request->input("hr_inicio")			, 'numero');//CAMPO FALTANTE
			$grupo_formacion->hr_fin 				= 	Security::validar($request->input("hr_fin")				, 'numero');//CAMPO FALTANTE
			$grupo_formacion->nr_dia_semana 		= 	Security::validar($request->input("nr_dia_semana")		, 'numero');//CAMPO FALTANTE
	        $grupo_formacion->fc_estimada_inicio 	= 	Security::validar($request->input("fc_estimada_inicio")	, 'string');
	        $grupo_formacion->fc_estimada_fin 		= 	Security::validar($request->input("fc_estimada_fin")	, 'string');
	        
	        if(!empty($request->input("fc_inicio"))){
	        	$grupo_formacion->fc_inicio =	Security::validar($request->input("fc_inicio"), 'string');//CAMPO FALTANTE
	        }
	        if(!empty($request->input("fc_fin"))){
	        	$grupo_formacion->fc_fin = 	Security::validar($request->input("fc_fin"), 'string');//CAMPO FALTANTE
	        }

			$grupo_formacion->id_usuario_actualiza = auth()->id();//registro quien realizó el cambio

	        $grupo_formacion->id_grupo_formacion_tipo		= 	Security::validar($request->input("id_grupo_formacion_tipo")		, 'numero', 'nullable');//CAMPO FALTANTE
	        $grupo_formacion->id_grupo_formacion_tipos_sexo	= 	Security::validar($request->input("id_grupo_formacion_tipos_sexo")	, 'numero', 'nullable');//CAMPO FALTANTE

	        $bo_finalizado = Security::validar($request->input("bo_finalizado"), 'numero');//CAMPO FALTANTE
	        if($bo_finalizado){
				$grupo_formacion->bo_activo = false;

				if($grupo_formacion->integrantes->count()>0){

					foreach ($grupo_formacion->integrantes as $integrante) {						
						$integrante_actual = GrupoFormacionUsuario::where('id_grupo_formacion', $grupo_formacion->id_grupo_formacion)
											 ->where('id_usuario', $integrante->usuario->id_usuario)
											 ->where('bo_activo', 1)->first();

						$integrante_actual->bo_activo = false;//Marco como finalizada la actividad de este usuario en este grupo
						$integrante_actual->fc_salida = date("Y-m-d H:i:s");//actualizo la fecha de salida

						$json_otros_datos = array();
						
						if(!empty($integrante_actual->json_otros_datos)){
							$json_otros_datos = json_decode($integrante_actual->json_otros_datos, true);
						}

						$json_otros_datos["gl_motivo_salida"] = "SE FINALIZA EL DISCIPULADO";//guardo el motivo de la salida
						$integrante_actual->json_otros_datos = json_encode($json_otros_datos);
						$integrante_actual->id_usuario_actualiza = auth()->id();//registro quien realizó el cambio
						
						$integrante_actual->save();//guardo los cambios
					}
				}
	        }
	        
	        $id_nuevo_moderador 	= 	Security::validar($request->input("discipulador")			, 'numero');
	        $motivo_salida 			= 	Security::validar($request->input("motivo_salida")			, 'string');
	        
	        $id_moderador_actual = $grupo_formacion->moderadores->first()->usuario->id_usuario;
			if($id_moderador_actual != $id_nuevo_moderador && $id_nuevo_moderador > 0){
				/**
				 * @README: Cambiar un moderador no es lo mismo que eliminarlo.
				 * - Al cambiarlo, el registro queda en la base de datos y puede verse en el historial, y se registra como que finalizo
				 * el servicio en este grupo.
				 * - Al eliminarlo, el registro se "elimina" de la base de datos, no se listará en el historial que se entenderá
				 * 	 como un registro ingresado erroneamente.
				 */
				$moderador_actual = GrupoFormacionUsuario::where('id_grupo_formacion', $grupo_formacion->id_grupo_formacion)
									 ->where('id_usuario', $id_moderador_actual)
									 ->where('bo_activo', 1)->first();

				$moderador_actual->bo_activo = false;//Marco como finalizada la actividad de este usuario en este grupo
				$moderador_actual->fc_salida = date("Y-m-d H:i:s");//actualizo la fecha de salida
				$json_otros_datos = array();
				if(!empty($moderador_actual->json_otros_datos)){
					$json_otros_datos = json_decode($moderador_actual->json_otros_datos, true);
				}
				$json_otros_datos["gl_motivo_salida"] = $motivo_salida;//guardo el motivo de la salida
				$moderador_actual->json_otros_datos = json_encode($json_otros_datos);
				$moderador_actual->id_usuario_actualiza = auth()->id();//registro quien realizó el cambio
				
				$moderador_actual->save();//guardo los cambios

				//creo el nuevo moderador del grupo
		        $nuevo_encargado_grupo_formacion = GrupoFormacionUsuario::create([
		        	'id_grupo_formacion' => $grupo_formacion->id_grupo_formacion,
					'id_usuario' => $id_nuevo_moderador,
					'fc_ingreso' => date("Y-m-d H:i:s"),
					'bo_moderador' => true,
					//'fc_salida' => date("Y-m-d H:i:s"),
					//'json_otros_datos' => $json_otros_datos,
					'id_usuario_crea' => auth()->id(),//$id_usuario_crea,
					//'bo_activo' => true,
					//'bo_estado' => true,
					//'id_usuario_actualiza' => $id_usuario_actualiza,
					//'created_at' => $created_at,
					//'updated_at' => $updated_at,
		        ]);
			}

	        $grupo_formacion->save();


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
		     * 		https://laravel.com/docs/5.4/requests#old-input
		     * 		https://stackoverflow.com/a/19839060
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

        return redirect()->route('discipulado.index', ['page' => $request->page]);
    }

    /**
     * Remove the user from storage.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($grupoFormacion)
    {
        //$user->delete ();
		DB::beginTransaction();

        try {
        	
	        $grupo_formacion = GrupoFormacion::findOrFail($grupoFormacion);

	        $grupo_formacion->bo_estado = false; //Se marca campo como eliminado, pero se conserva en la BD.
	        $grupo_formacion->id_usuario_actualiza = auth()->id();//registro quien realizó el cambio
	        
			if($grupo_formacion->integrantes->count()>0){

				foreach ($grupo_formacion->integrantes as $integrante) {
					$integrante_actual = GrupoFormacionUsuario::where('id_grupo_formacion', $grupo_formacion->id_grupo_formacion)
										 ->where('id_usuario', $integrante->usuario->id_usuario)
										 ->where('bo_activo', 1)->first();

					$integrante_actual->bo_activo = false;//Marco como finalizada la actividad de este usuario en este grupo
					$integrante_actual->fc_salida = date("Y-m-d H:i:s");//actualizo la fecha de salida

					$json_otros_datos = array();
					
					if(!empty($integrante_actual->json_otros_datos)){
						$json_otros_datos = json_decode($integrante_actual->json_otros_datos, true);
					}

					$json_otros_datos["gl_motivo_salida"] = "SE ELIMINA EL DISCIPULADO";//guardo el motivo de la salida
					$integrante_actual->json_otros_datos = json_encode($json_otros_datos);
					$integrante_actual->id_usuario_actualiza = auth()->id();//registro quien realizó el cambio
					
					$integrante_actual->save();//guardo los cambios
				}
			}

	        $grupo_formacion->save();
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
		     * 		https://laravel.com/docs/5.4/requests#old-input
		     * 		https://stackoverflow.com/a/19839060
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
