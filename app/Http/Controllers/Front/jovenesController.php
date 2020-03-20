<?php

namespace App\Http\Controllers\Front;

use DB;
use Redirect;
use Illuminate\Http\Request;
use App\Models\Configuracion;
use App\ {
    Services\Security,
    Services\Helper,
    Models\DatosJovenes,
    Models\Region,
    Models\Comuna,
    Http\Controllers\Controller
};

class jovenesController extends Controller
{

    /**
     * Create a new jovenesController instance.
     *
     * @return void
    */
    public function __construct()
    {
    }

    /**
     * Display a listing of the posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function registro()
    {
        //$paises = Pais::all();
        //$paisDefault = Pais::$PAIS_CHILE;
        $regiones = Region::all();
        $regionDefault = Region::$REGION_VALPARAISO;
        //$comunas = Comuna::all();
        $comunas = Comuna::where('id_region', Region::$REGION_VALPARAISO)->get();
        $comunaDefault = Comuna::$COMUNA_VIÑA_DEL_MAR;
        
        Helper::loadJavascript("front/Jovenes/registro_jovenes.js");
        //Helper::loadCss("back/IntegrantesGrupoFormacion/integrantes.css");

        return view('front.registro_jovenes', 
                    compact(
                        // 'paises',
                        // 'paisDefault',
                         'regiones',
                         'regionDefault',
                         'comunas',
                         'comunaDefault'
                    ));
    }

    public function registrarNuevoJoven(Request $request){
        //ini_set('display_errors', 0);
        //$input = $request->all();
        $correcto       = false;
        $json           = array("correcto"=>$correcto,"msj"=>"ERROR EN REGISTRO");

        $gl_nombres     = null;
        $gl_apellidos   = null;
        $gl_rut         = null;
        $fc_nacimiento  = null;
        $nr_telefono    = null;
        $gl_email       = null;
        $id_region      = null;
        $id_comuna      = null;
        $gl_ciudad      = null;
        $gl_calle       = null;
        $nr_calle       = null;

        /**
         * validar campos obligatorios
         */
        if($request->input("gl_nombres")){
            $gl_nombres = Security::validar($request->input("gl_nombres"), 'string');
        }
        else{
            $json["msj"] = "El campo nombre es un campo obligatorio.";
            return response()->json($json);
        }
        if($request->input("gl_apellidos")){
            $gl_apellidos = Security::validar($request->input("gl_apellidos"), 'string');
        }
        else{
            $json["msj"] = "El campo apellido es un campo obligatorio.";
            return response()->json($json);
        }
        if($request->input("fc_nacimiento")){
            $fc_nacimiento = Security::validar($request->input("fc_nacimiento"), 'date');
        }
        else{
            $json["msj"] = "El campo nacimiento es un campo obligatorio.";
            return response()->json($json);
        }
        if($request->input("nr_telefono")){
            $nr_telefono = Security::validar($request->input("nr_telefono"), 'string');
        }
        else{
            $json["msj"] = "El campo telefono es un campo obligatorio.";
            return response()->json($json);
        }
        if($request->input("gl_email")){
            $gl_email = Security::validar($request->input("gl_email"), 'string');
        }
        else{
            $json["msj"] = "El campo email es un campo obligatorio.";
            return response()->json($json);
        }
        if($request->input("gl_rut")){
            if(Security::validaRut($request->input("gl_rut"))){
                $gl_rut = Security::validar($request->input("gl_rut"), 'string');
                if (DatosJovenes::where('gl_rut', '=', $gl_rut)->exists()) {
                    $json["msj"] = "<b>¡El rut ingresado ya existe!</b><br/> Es posible que hayas ingresado tus datos previamente.";
                    return response()->json($json);
                }
            }
            else{
                $json["msj"] = "El rut ingresado es incorrecto.";
                return response()->json($json);
            }
        }
        if($request->input("region")){
            $id_region = Security::validar($request->input("region"), 'numero');
        }
        if($request->input("comuna")){
            $id_comuna = Security::validar($request->input("comuna"), 'numero');
        }
        if($request->input("gl_ciudad")){
            $gl_ciudad = Security::validar($request->input("gl_ciudad"), 'string');
        }
        if($request->input("gl_calle")){
            $gl_calle = Security::validar($request->input("gl_calle"), 'string');
        }
        if($request->input("nr_calle")){
            $nr_calle = Security::validar($request->input("nr_calle"), 'string');
        }

        $joven = new DatosJovenes();
        
        $joven->gl_rut          =   $gl_rut;
        $joven->gl_nombres      =   $gl_nombres;
        $joven->gl_apellidos    =   $gl_apellidos;
        $joven->fc_nacimiento   =   $fc_nacimiento;
        $joven->nr_telefono     =   $nr_telefono;
        $joven->gl_email        =   $gl_email;
        $joven->id_region       =   $id_region;
        $joven->id_comuna       =   $id_comuna;
        $joven->gl_ciudad       =   $gl_ciudad;
        $joven->gl_calle        =   $gl_calle;
        $joven->nr_calle        =   $nr_calle;

        if(!$joven->save()){
            App::abort(500, 'Error Inesperado, por favor, contáctese con soporte.');
        }else{
            $json["correcto"] = true;
            $json["msj"] = "¡Los datos fueron guardados correctamente!";
        }

        /*$data = array(
            "gl_nombres" => $gl_nombres,
            "gl_apellido" => $gl_apellidos,
            "gl_rut" => $gl_rut,
            "fc_nacimiento" => $fc_nacimiento,
            "nr_telefono" => $nr_telefono,
            "gl_email" => $gl_email,
            "region" => $id_region,
            "comuna" => $id_comuna,
            "gl_ciudad" => $gl_ciudad,
            "gl_calle" => $gl_calle,
            "nr_calle" => $nr_calle,
        );

        $json["data"] = $data;*/
        
        return response()->json($json);
    }

    public function filtrarComuna(Request $request){
        //ini_set('display_errors', 0);
        //$input = $request->all();
        $correcto = false;
        $json     = array(
                        "correcto" => $correcto,
                        "msj" => "Ocurrió un error inesperado. Por favor, intentelo nuevamente más tarde."
                    );
        if($request->input("id_region")){
            $id_region = Security::validar($request->input("id_region"), 'numero');
            $comunas = Comuna::where('id_region', $id_region)->get();
            $json["comunas"] = $comunas;
            $json["correcto"] = true;
            $json["msj"] = "comunas cargadas correctamente";
        }else{
            $json["msj"] = "Debe seleccionar una región";
        }
        /*$params         = Array("grupo_formacion"=>$request->input("id_grupo"));
        $nombreArchivo  = "Asistentes_Grupo_Formacion_" . date('d_m_Y') . ".xls";
        $excel          = $this->_crearExcel($params); //EN ESTA FUNCIÓN CREO EL HTML
        if(!empty($excel)){
            $correcto = true;
        }
        $json   = Array("correcto"=>$correcto,"nombre"=>$nombreArchivo);*/
        
        return response()->json($json);
    }


    
}
