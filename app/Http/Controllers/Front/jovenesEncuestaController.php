<?php

namespace App\Http\Controllers\Front;

use DB;
use Redirect;
use Illuminate\Http\Request;
use App\Models\Configuracion;
use Carbon\Carbon;
use App\ {
    Services\Security,
    Services\Helper,
    Models\DatosJovenes,
    Models\DatosEncuestaJovenes,
    Models\Region,
    Models\Comuna,
    Http\Controllers\Controller
};

class jovenesEncuestaController extends Controller
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

        //return view('front.registro_jovenes', 
        return view('front.uc2.formularios.jovenes.encuesta', 
                    compact(
                        // 'paises',
                        // 'paisDefault',
                         'regiones',
                         'regionDefault',
                         'comunas',
                         'comunaDefault'
                    ));
    }

    public function registrarNuevaEncuesta(Request $request){
        //ini_set('display_errors', 0);
        //$input = $request->all();
        $correcto       = false;
        $json           = array("correcto"=>$correcto,"msj"=>"<b>Ocurrió un error inesperado.<br/>Por favor, intentelo nuevamente más tarde.<br/>Si el error persiste, contáctese con el administrador.</b>");
        
        $gl_rut             = Security::validar($request->gl_rut, 'string');             
        $gl_ciudad_verano   = Security::validar($request->gl_ciudad_verano, 'string');  
        $gl_participarias   = Security::validar($request->gl_participarias, 'string');  
        $gl_ciudad          = Security::validar($request->gl_ciudad, 'string');         
        $gl_dia_actividad   = Security::validar($request->gl_dia_actividad, 'string'); 
        $gl_fin_semestre    = Security::validar($request->gl_fin_semestre, 'string');   
        $gl_tematica_clubs  = Security::validar($request->gl_tematica_clubs, 'string'); 
        $gl_retiro          = Security::validar($request->gl_retiro, 'string');         
        $gl_dia_retiro      = Security::validar($request->gl_dia_retiro, 'string');     
        $gl_seminario       = Security::validar($request->gl_seminario, 'string');      
        $gl_dia_seminario   = Security::validar($request->gl_dia_seminario, 'string');  
        $gl_actividades     = Security::validar($request->gl_actividades, 'string');      
        
        if(DatosEncuestaJovenes::where('gl_rut', '=', $gl_rut)->exists()) {
            $json["msj"] = "<b>¡El rut ingresado ya existe!</b><br/> Es posible que hayas ingresado tus datos previamente.";
        }else{
            $datos_joven = array(
                "gl_rut"                =>   $gl_rut,
                "gl_ciudad_verano"      =>   $gl_ciudad_verano,
                "gl_participarias"      =>   $gl_participarias,
                "gl_ciudad"             =>   $gl_ciudad,
                "gl_dia_actividad"      =>   $gl_dia_actividad,
                "gl_fin_semestre"       =>   $gl_fin_semestre,
                "gl_tematica_clubs"     =>   $gl_tematica_clubs,
                "gl_retiro"             =>   $gl_retiro,
                "gl_dia_retiro"         =>   $gl_dia_retiro,
                "gl_seminario"          =>   $gl_seminario,
                "gl_dia_seminario"      =>   $gl_dia_seminario,
                'gl_actividades'        =>   $gl_actividades,
            );
    
            if(!DatosEncuestaJovenes::create($datos_joven)){
                App::abort(500, 'Error Inesperado, por favor, contáctese con soporte.');
            }else{
                $json["correcto"] = true;
                $json["msj"] = "¡Los datos fueron guardados correctamente!";
            } 
        }
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

    public function checkRut(Request $request){ 
        $result = "0";  
        if (DatosJovenes::where('gl_rut', '=', $request->rut)->count() > 0) {
            $result = "1"; 
        }
        return $result;
    }

    
}
