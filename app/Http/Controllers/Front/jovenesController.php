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

        //return view('front.registro_jovenes', 
        return view('front.uc2.formularios.jovenes.registro', 
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
        $json           = array("correcto"=>$correcto,"msj"=>"<b>Ocurrió un error inesperado.<br/>Por favor, intentelo nuevamente más tarde.<br/>Si el error persiste, contáctese con el administrador.</b>");

        $gl_rut         = NULL;
        $gl_nombres     = NULL;
        $gl_apellidos   = NULL;
        $fc_nacimiento  = NULL;
        $nr_telefono    = NULL;
        $gl_email       = NULL;
        $id_region      = NULL;
        $id_comuna      = NULL;
        $gl_ciudad      = NULL;
        $gl_calle       = NULL;
        $nr_calle       = NULL;

        $json["request"]=$request->all();

        $recap = Security::validar($request->input("recap"), 'string');

        //Cargo el resultado del captcha
        $result_recaptcha = Security::validarReCaptcha($recap, 'registro_jovenes');

        //Valido si pasó el captcha
        if($result_recaptcha["status"] != "ERROR"){
            //Valido el input honeypot para verificar que no sea un bot
            if(empty($request->input("_uc_hpot"))){
                if(empty($request->input("gl_email"))){
                    $json["msj"] = "El campo email es un campo obligatorio.";
                }
                else{
                    $gl_email = Security::validar($request->input("gl_email"), 'string');

                    if (!filter_var($gl_email, FILTER_VALIDATE_EMAIL)) {
                        $json["msj"] = "El email ingresado es incorrecto.";
                    }
                    else {
                        //Valido que el mail no se encuentre registrado como spam
                        $spam = DatosJovenes::where('gl_email', $gl_email)->where("bo_spam", 1)->exists();
                        if($spam){
                            //Si es spam, devuelvo mensaje de error
                            $json["msj"] = "Lo sentimos, por motivos de seguridad, su solicitud fue rechazada.";
                        }
                        else{
                            //Verifico si ha alcanzado el limite de mensajes por hora
                            $recent_contacts = DatosJovenes::where('gl_email', $gl_email)->where('created_at', '>', Carbon::now()->subHours(1)->toDateTimeString())->get();
                            if($recent_contacts->count() > 2){
                                //Si supero el limite, devuelvo mensaje de error
                                $json["msj"] = "Ha enviado demaciados mensajes, por favor, intentelo nuevamente más tarde.";
                            }
                            else{
                                /**
                                 * validar campos obligatorios
                                 */
                                if(empty($request->input("gl_nombres"))){
                                    $json["msj"] = "El campo nombre es un campo obligatorio.";
                                }
                                else if(empty($request->input("gl_apellidos"))){
                                    $json["msj"] = "El campo apellido es un campo obligatorio.";
                                }
                                else if(empty($request->input("fc_nacimiento"))){
                                    $json["msj"] = "El campo nacimiento es un campo obligatorio.";
                                }
                                else if(empty($request->input("nr_telefono"))){
                                    $json["msj"] = "El campo telefono es un campo obligatorio.";
                                }
                                /*else if(empty($request->input("gl_rut"))){
                                    $json["msj"] = "El campo rut es un campo obligatorio.";   
                                }*/
                                else{
                                    $gl_rut = Security::validar($request->input("gl_rut"), 'string');

                                    //verifico si el rut es inválido
                                    if(!empty($gl_rut) && !Security::validaRut($gl_rut)){
                                        $json["msj"] = "El rut ingresado es incorrecto.";
                                    }
                                    else{
                                        //verifico si el rut ya fue ingresado
                                        if(DatosJovenes::where('gl_rut', '=', $gl_rut)->exists()) {
                                            $json["msj"] = "<b>¡El rut ingresado ya existe!</b><br/> Es posible que hayas ingresado tus datos previamente.";
                                        }
                                        else{
                                            $gl_nombres = Security::validar($request->input("gl_nombres"), 'string');
                                            $gl_apellidos = Security::validar($request->input("gl_apellidos"), 'string');
                                            $fc_nacimiento = Security::validar($request->input("fc_nacimiento"), 'date');
                                            $nr_telefono = Security::validar($request->input("nr_telefono"), 'string');
                                            
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

                                            //Verifico si, a pesar de haber pasado el captcha
                                            //obtuvo una puntuación baja o si su mail no tiene un dominio habitual.
                                            //Si su puntuación es baja (WARNING) o utiliza un correo con un dominio
                                            //poco habitual, se marca mensaje para revisión.
                                            $dominios_comunes = array(
                                                "@gmail.com", 
                                                "@outlook.com", 
                                                "@hotmail.com", 
                                                "@yahoo.com", 
                                                "@alumnos.uv.cl"
                                            );

                                            $bo_validar = FALSE;
                                            $dominio = substr($gl_email, strpos($gl_email,'@'));
                                            if($result_recaptcha["status"] == "WARNING" || 
                                                !in_array($dominio, $dominios_comunes)){
                                                $bo_validar = TRUE;
                                            }
                                            
                                            $datos_joven = array(
                                                "gl_rut"          =>   $gl_rut,
                                                "gl_nombres"      =>   $gl_nombres,
                                                "gl_apellidos"    =>   $gl_apellidos,
                                                "fc_nacimiento"   =>   $fc_nacimiento,
                                                "nr_telefono"     =>   $nr_telefono,
                                                "gl_email"        =>   $gl_email,
                                                "id_region"       =>   $id_region,
                                                "id_comuna"       =>   $id_comuna,
                                                "gl_ciudad"       =>   $gl_ciudad,
                                                "gl_calle"        =>   $gl_calle,
                                                "nr_calle"        =>   $nr_calle,
                                                'bo_validar'      =>   $bo_validar,
                                            );

                                            if(!DatosJovenes::create($datos_joven)){
                                                App::abort(500, 'Error Inesperado, por favor, contáctese con soporte.');
                                            }else{
                                                $json["correcto"] = true;
                                                $json["msj"] = "¡Los datos fueron guardados correctamente!";
                                            }                                   
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
            else{
                //si cayo en el honeypot, rechazo la solicitud
                $json["msj"] = "Lo sentimos, por motivos de seguridad, su solicitud fue rechazada.";
            }
        }
        else{
            //Si no paso el captcha, devuelvo el error.
            $json["msj"] = __($result_recaptcha["msg"]);
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
