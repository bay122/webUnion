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
    Models\DatosMiembros,
    Models\DatosJovenes,
    Models\RangoLlegadaIglesia,
    Models\Region,
    Models\Comuna,
    Http\Controllers\Controller
};

class encuestaController extends Controller
{

    /**
     * Create a new encuestaController instance.
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
     *
     * @docs Recargar Cache: 
     *   https://stackoverflow.com/questions/32423034/reloading-env-variables-without-restarting-server-laravel-5-shared-hosting
     *
     * @docs Buscar en campo JSON
     *   https://www.startutorial.com/articles/view/how-to-search-json-data-in-mysql
     */
    public function registro()
    {
        $google_maps = FALSE;
        //$paises = Pais::all();
        //$paisDefault = Pais::$PAIS_CHILE;
        $regiones = Region::all();
        $regionDefault = Region::$REGION_VALPARAISO;
        //$comunas = Comuna::all();
        $comunas = Comuna::where('id_region', Region::$REGION_VALPARAISO)->get();
        $comunaDefault = Comuna::$COMUNA_VIÑA_DEL_MAR;

        $rangoLlegadaIglesia = RangoLlegadaIglesia::all();
        
        Helper::loadJavascript("front/encuestas/registro_encuesta.js");
        //Helper::loadJavascript("front/encuestas/registro_wizzard2.js");
        Helper::loadJavascript("front/encuestas/registro_wizard.js");
        Helper::loadJavascript("front/encuestas/date_selector.js");
        
        Helper::loadJavascriptFullPath("plugins/mapa/joii.min.js");
        Helper::loadJavascriptFullPath("plugins/mapa/jquery.typing-0.2.0.min.js");
        Helper::loadJavascriptFullPath("plugins/mapa/mapa.js");
        Helper::loadJavascriptFullPath("plugins/mapa/marcador.js");
        //Helper::loadJavascriptFullPath("plugins/mapa/places.js");

        Helper::loadCss("front/encuestas/registro_encuesta.css");

        return view('front.uc2.formularios.encuestas.registro', 
                    compact(
                        // 'paises',
                        // 'paisDefault',
                         'google_maps',
                         'regiones',
                         'regionDefault',
                         'comunas',
                         'comunaDefault',
                         'rangoLlegadaIglesia'
                    ));
    }

    public function registrarNuevaRespuesta(Request $request){
        //file_put_contents('php://stderr', PHP_EOL . print_r("PROCESANDO ENCUESTA...", TRUE). PHP_EOL, FILE_APPEND);
        //ini_set('display_errors', 0);
        //$input = $request->all();
        $correcto       = false;
        $json           = array("correcto"=>$correcto,"msj"=>"<b>Ocurrió un error inesperado.<br/>Por favor, intentelo nuevamente más tarde.<br/>Si el error persiste, contáctese con el administrador.</b>");

        $gl_sexo                     = NULL;
        $gl_nombres                  = NULL;
        $gl_apellidos                = NULL;
        $gl_rut                      = NULL;
        $fc_nacimiento               = NULL;
        $nr_telefono                 = NULL;
        $gl_email                    = NULL;
        $id_region                   = NULL;
        $gl_nombre_region            = NULL;
        $id_comuna                   = NULL;
        $gl_nombre_comuna            = NULL;
        $gl_ciudad                   = NULL;
        $gl_barrio                   = NULL;
        $gl_direccion                = NULL;
        $street_number               = NULL;
        $route                       = NULL;
        $locality                    = NULL;
        $administrative_area_level_1 = NULL;
        $postal_code                 = NULL;
        $country                     = NULL;
        $gl_calle                    = NULL;
        $nr_calle                    = NULL;
        $gl_latitud                  = NULL;
        $gl_longitud                 = NULL;
        $id_llegada_iglesia          = NULL;
        $gl_llegada_iglesia          = NULL;
        $id_tipo_participacion       = NULL;
        $gl_tipo_participacion       = NULL;
        $bo_participa_ministerio     = NULL;
        $gl_ministerio               = NULL;
        $bo_vive_con_ninos           = NULL;
        $nr_vive_con_ninos           = NULL;
        $bo_vive_con_adolescentes    = NULL;
        $nr_vive_con_adolescentes    = NULL;
        $_uc_hpot                    = NULL;
        $recap                       = NULL;
        $id_datos_jovenes            = NULL;

        $json["request"]=$request->all();

        $recap = Security::validar($request->input("recap"), 'string');

        //Cargo el resultado del captcha
        $result_recaptcha = Security::validarReCaptcha($recap, 'registro_encuesta');

        //file_put_contents('php://stderr', PHP_EOL . print_r("VALIDANDO ENCUESTA...", TRUE). PHP_EOL, FILE_APPEND);

        //Valido si pasó el captcha
        if($result_recaptcha["status"] != "ERROR"){
            //Valido el input honeypot para verificar que no sea un bot
            if(empty($request->input("_uc_hpot"))){
                if(!empty($request->input("gl_email"))){
                    $gl_email = Security::validar($request->input("gl_email"), 'string');

                    if (!filter_var($gl_email, FILTER_VALIDATE_EMAIL)) {
                        $json["msj"] = "El email ingresado es incorrecto.";
                    }
                    else {
                        //Valido que el mail no se encuentre registrado como spam
                        $spam = DatosMiembros::where('gl_email', $gl_email)->where("bo_spam", 1)->exists();
                        if($spam){
                            //Si es spam, devuelvo mensaje de error
                            $json["msj"] = "Lo sentimos, por motivos de seguridad, su solicitud fue rechazada.";
                        }
                        else{
                            //Verifico si ha alcanzado el limite de mensajes por hora
                            $recent_contacts = DatosMiembros::where('gl_email', $gl_email)->where('created_at', '>', Carbon::now()->subHours(1)->toDateTimeString())->get();
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
                                /*else if(empty($request->input("fc_nacimiento"))){
                                    $json["msj"] = "El campo nacimiento es un campo obligatorio.";
                                }
                                else if(empty($request->input("nr_telefono"))){
                                    $json["msj"] = "El campo telefono es un campo obligatorio.";
                                }
                                else if(empty($request->input("gl_rut"))){
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
                                        if(!empty($gl_rut) && DatosMiembros::where('gl_rut', '=', $gl_rut)->exists()) {
                                            $json["msj"] = "<b>¡El rut ingresado ya existe!</b><br/> Es posible que hayas ingresado tus datos previamente.";
                                        }
                                        else{
                                             $json["correcto"] = TRUE;                           
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

        //file_put_contents('php://stderr', PHP_EOL . print_r("VALIDACIÓN FINALIZADA...", TRUE). PHP_EOL, FILE_APPEND);


        if($json["correcto"]){   
            //file_put_contents('php://stderr', PHP_EOL . print_r("PROCESANDO DATOS...", TRUE). PHP_EOL, FILE_APPEND);

            //Lo cambio a false para detectar errores en inserción
            $json["correcto"] = False;        

            $gl_nombres     = Security::validar($request->input("gl_nombres"),   'string');
            $gl_apellidos   = Security::validar($request->input("gl_apellidos"), 'string');

            if(!empty($request->input("gl_sexo"))){
                $gl_sexo = Security::validar($request->input("gl_sexo"), 'string');
            }
            if(!empty($request->input("gl_rut"))){
                $gl_rut = Security::validar($request->input("gl_rut"), 'string');
                //verifico si el rut ya fue ingresado
                if(DatosJovenes::where('gl_rut', '=', $gl_rut)->exists()) {
                    $id_datos_jovenes = @DatosJovenes::where('gl_rut', '=', $gl_rut)->first()->id_datos_jovenes;
                }
            }
            if(!empty($request->input("fc_nacimiento"))){
                $fc_nacimiento = Security::validar($request->input("fc_nacimiento"), 'date');
            }
            if(!empty($request->input("nr_telefono"))){
                $nr_telefono = Security::validar($request->input("nr_telefono"), 'string');
            }
            if(!empty($request->input("gl_email"))){
                $gl_email = Security::validar($request->input("gl_email"), 'string');
            }
            if(!empty($request->input("region"))){
                $id_region = Security::validar($request->input("region"), 'numero');
                $gl_nombre_region = @Region::where('id_region', '=', $id_region)->first()->gl_nombre_corto;
            }
            if(!empty($request->input("comuna"))){
                $id_comuna = Security::validar($request->input("comuna"), 'numero');
                $gl_nombre_comuna = @Comuna::where('id_comuna', '=', $id_comuna)->first()->gl_nombre_comuna;
            }
            if(!empty($request->input("gl_ciudad"))){
                $gl_ciudad = Security::validar($request->input("gl_ciudad"), 'string');
            }
            if(!empty($request->input("gl_barrio"))){
                $gl_barrio = Security::validar($request->input("gl_barrio"), 'string');
            }
            if(!empty($request->input("gl_direccion"))){
                $gl_direccion = Security::validar($request->input("gl_direccion"), 'string');
            }
            if(!empty($request->input("street_number"))){
                $street_number = Security::validar($request->input("street_number"), 'string');
            }
            if(!empty($request->input("route"))){
                $route = Security::validar($request->input("route"), 'string');
            }
            if(!empty($request->input("locality"))){
                $locality = Security::validar($request->input("locality"), 'string');
            }
            if(!empty($request->input("administrative_area_level_1"))){
                $administrative_area_level_1 = Security::validar($request->input("administrative_area_level_1"),'string');
            }
            if(!empty($request->input("postal_code"))){
                $postal_code = Security::validar($request->input("postal_code"), 'string');
            }
            if(!empty($request->input("country"))){
                $country = Security::validar($request->input("country"), 'string');
            }
            if(!empty($request->input("gl_calle"))){
                $gl_calle = Security::validar($request->input("gl_calle"), 'string');
            }
            if(!empty($request->input("nr_calle"))){
                $nr_calle = Security::validar($request->input("nr_calle"), 'string');
            }
            if(!empty($request->input("gl_latitud"))){
                $gl_latitud = Security::validar($request->input("gl_latitud"), 'string');
            }
            if(!empty($request->input("gl_longitud"))){
                $gl_longitud = Security::validar($request->input("gl_longitud"), 'string');
            }
            if(!empty($request->input("id_llegada_iglesia"))){
                $id_llegada_iglesia = Security::validar($request->input("id_llegada_iglesia"), 'numero');
                $gl_llegada_iglesia = @RangoLlegadaIglesia::where('id_llegada_iglesia', '=', $id_llegada_iglesia)->first()->gl_nombre;

            }

            $id_tipo_participacion = Security::validar($request->input("id_tipo_participacion"), 'numero');
            if(intval($id_tipo_participacion) == 1){
                $gl_tipo_participacion = 'Online y Presencial';
            }else{
                $gl_tipo_participacion = 'Solo Online';
            }            

            //if(!empty($request->input("bo_participa_ministerio"))){
            //}
            $bo_participa_ministerio = Security::validar($request->input("bo_participa_ministerio"), 'numero');

            if(!empty($request->input("gl_ministerio"))){
                $gl_ministerio = Security::validar($request->input("gl_ministerio"), 'string');
            }

            //if(!empty($request->input("bo_vive_con_ninos"))){
            //}
            $bo_vive_con_ninos = Security::validar($request->input("bo_vive_con_ninos"), 'numero');
            if(!empty($request->input("nr_vive_con_ninos"))){
                $nr_vive_con_ninos = Security::validar($request->input("nr_vive_con_ninos"), 'numero');
            }

            //if(!empty($request->input("bo_vive_con_adolescentes"))){
            //}
            $bo_vive_con_adolescentes = Security::validar($request->input("bo_vive_con_adolescentes"), 'numero');
            if(!empty($request->input("nr_vive_con_adolescentes"))){
                $nr_vive_con_adolescentes = Security::validar($request->input("nr_vive_con_adolescentes"), 'numero');
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

            $json_direccion_gm = array("direccion_gm" => array(
                "street_number" => $street_number,
                "route" => $route,
                "locality"  => $locality,
                "administrative_area_level_1"   => $administrative_area_level_1,
                "postal_code"   => $postal_code,
                "country"   => $country,
            ));
   
            $datos_miembro = array(
                "gl_sexo"                  => $gl_sexo,
                "gl_nombres"               => $gl_nombres,
                "gl_apellidos"             => $gl_apellidos,
                "gl_rut"                   => $gl_rut,
                "fc_nacimiento"            => $fc_nacimiento,
                "nr_telefono"              => $nr_telefono,
                "gl_email"                 => $gl_email,
                "id_region"                => $id_region,
                "gl_nombre_region"         => $gl_nombre_region,
                "id_comuna"                => $id_comuna,
                "gl_nombre_comuna"         => $gl_nombre_comuna,
                "gl_ciudad"                => $gl_ciudad,
                "gl_barrio"                => $gl_barrio,
                "gl_direccion"             => $gl_direccion,
                "json_otros_datos"         => $json_direccion_gm,
                "gl_calle"                 => $gl_calle,
                "nr_calle"                 => $nr_calle,
                "gl_latitud"               => $gl_latitud,
                "gl_longitud"              => $gl_longitud,
                "id_llegada_iglesia"       => $id_llegada_iglesia,
                "gl_llegada_iglesia"       => $gl_llegada_iglesia,
                "id_tipo_participacion"    => $id_tipo_participacion,
                "gl_tipo_participacion"    => $gl_tipo_participacion,
                "bo_participa_ministerio"  => $bo_participa_ministerio,
                "gl_ministerio"            => $gl_ministerio,
                "bo_vive_con_ninos"        => $bo_vive_con_ninos,
                "nr_vive_con_ninos"        => $nr_vive_con_ninos,
                "bo_vive_con_adolescentes" => $bo_vive_con_adolescentes,
                "nr_vive_con_adolescentes" => $nr_vive_con_adolescentes,
                "id_datos_jovenes"         => $id_datos_jovenes,
                "bo_validar"               => $bo_validar,
            );
            //file_put_contents('php://stderr', PHP_EOL . print_r("GUARDANDO DATOS...", TRUE). PHP_EOL, FILE_APPEND);

            if(!DatosMiembros::create($datos_miembro)){
                App::abort(500, 'Error Inesperado, por favor, contáctese con soporte.');
            }else{
                $json["correcto"] = true;
                $json["msj"] = "¡Los datos fueron guardados correctamente!";
            }   

        }
        
        
        return response()->json($json);
    }
}
