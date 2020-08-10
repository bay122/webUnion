<?php

namespace App\Http\Controllers\Front;

use App\ {
    Http\Controllers\Controller
};
use Illuminate\Http\Request;
use App\Models\Configuracion;
use App\Models\ImagenesCarrusel;
class UCController extends Controller
{

    /**
     * Create a new UCController instance.
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
    public function index()
    {
        $configuracion = Configuracion::find(1);
        $imagenes = ImagenesCarrusel::all();

        return view('front.index',compact('configuracion','imagenes','id'));
    }

    /**
     * Display a listing of the posts.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function ministerios()
    {
        $lorem = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";
        $category1 = (object)array(
            "image" => (object)array("route" => "images/categories/EDITORIAL.jpg"),
            "title" => "Ministerio Familia",
            "name" => "Familia",
            "description" => $lorem
        );
        $category2 = (object)array(
            "image" => (object)array("route" => "images/categories/NOTAS.jpg"),
            "title" => "Ministerio Enseñanza",
            "name" => "Enseñanza",
            "description" => $lorem
        );
        $category3 = (object)array(
            "image" => (object)array("route" => "images/categories/MINISTERIOS.jpg"),
            "title" => "Ministerio Misiones",
            "name" => "Misiones",
            "description" => $lorem
        );
        $category4 = (object)array(
            "image" => (object)array("route" => "images/categories/MISIONES.jpg"),
            "title" => "Ministerio Servicios Transversales",
            "name" => "Servicios Transversales",
            "description" => $lorem
        );

        $categories = array($category1,$category2,$category3,$category4);
        return view('front.informacion.ministerios', ['ministerios' => $categories]);
    }*/

    public function categorias($carpeta, $nombre_imagen, $titulo)
    {
        $resp = (object)array(
            "image" => (object)array("route" => "images/categories/ministerios/".$carpeta."/".$nombre_imagen.".jpg"),
            "title" => $titulo,
            "name" => $titulo,
            "description" => $this->descriptions($nombre_imagen)
        );
        return $resp;
    } 

    /**
     * Display a listing of the posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function ministerios()
    {   
        $carpeta = "familiares";
        $familiar1 = $this->categorias($carpeta,"ninos_adolescentes","MINISTERIO DE NIÑOS Y ADOLESCENTES");
        $familiar2 = $this->categorias($carpeta, "intermedios","JÓVENES INTERMEDIOS");
        $familiar3 = $this->categorias($carpeta, "jovenes_adultos","JÓVENES ADULTOS");
        $familiar4 = $this->categorias($carpeta, "matrimonios","MATRIMONIOS");
        $familiar5 = $this->categorias($carpeta, "damas","DAMAS");
        $familiar6 = $this->categorias($carpeta, "varones","VARONES");
        $familiar7 = $this->categorias($carpeta, "años_dorados","AÑOS DORADOS");
        $familiares = array($familiar1,$familiar2,$familiar3,$familiar4,$familiar5,$familiar6,$familiar7);

        $carpeta = "ensenanzas";
        $ensenanza1 = $this->categorias($carpeta,"discipulado_fundamental","DISCIPULADO FUNDAMENTAL");
        $ensenanza2 = $this->categorias($carpeta,"comunidad_de_vida","COMUNIDAD DE VIDA");
        //$ensenanza3 = $this->categorias($carpeta,"icm","INSTITUTO DE CAPACITACIÓN MINISTERIAL (ICM)");
        $ensenanza4 = $this->categorias($carpeta,"pcm","PROGRAMA DE CAPACITACIÓN MINISTERIA");
        //$ensenanzas = array($ensenanza1,$ensenanza2,$ensenanza3,$ensenanza4);
        $ensenanzas = array($ensenanza1,$ensenanza2,$ensenanza4);

        $carpeta = "misiones";
        $mision1 = $this->categorias($carpeta,"en_accion","MINISTERIO EN ACCIÓN");
        $mision2 = $this->categorias($carpeta,"misiones_transculturales","MISIONES TRANSCULTURALES");
        $misiones = array($mision1,$mision2);

        $carpeta = "servicios_transversales";
        $s_transversal1 = $this->categorias($carpeta,"musica","MINISTERIO DE MÚSICA");
        $s_transversal2 = $this->categorias($carpeta,"oracion","ORACIÓN");
        $s_transversal3 = $this->categorias($carpeta,"anfitriones","ANFITRIONES");
        $s_transversal4 = $this->categorias($carpeta,"medios","COMUNICACIÓN Y MEDIOS");
        $s_transversales = array($s_transversal1,$s_transversal2,$s_transversal3,$s_transversal4);
        
        $categorias = array($familiares, $ensenanzas, $misiones, $s_transversales);
        $encabezados = array("FAMILIARES", "ENSEÑANZAS", "MISIONES", "SERVICIOS TRANSVERSALES");     
       
        return view('front.informacion.ministerios', compact('encabezados', 'categorias'));
    }


    public function descriptions($description)
    {
        if($description == 'ninos_adolescentes'){
             $description = "
                                <h4>MINISTERIO DE NIÑOS Y ADOLESCENTES</h4>
                                El Ministerio de Niños y Adolescentes tiene como misión colaborar con los padres en la evangelización de sus hijos. Para cumplir este objetivo contamos con un equipo de maestros y ayudantes capacitados que trabajan con los distintos grupos de acuerdo a sus edades y necesidades. 
                                <br>
                                <strong>¡Cada edad tiene su espacio!</strong>
                                <br>
                                Además, durante la predicación el día domingo los niños entre los 2 y14 años se distribuyen en clases para compartir y aprender de la Palabra de Dios.
                                Durante el año tenemos distintas actividades recreativas, entre las cuales destacan Fiesta de la Vida y campamentos para hombres y mujeres.
                               ";
        }
        elseif($description == 'intermedios'){
             $description = "
                        <h4>JÓVENES INTERMEDIOS</h4>
                        El grupo adulto joven está orientado a quienes que ya terminaron su educación superior o están en una edad similar, y ya se encuentran insertos en el mundo laboral.
                        <br>
                        Este ministerio tiene como misión enseñar la Palabra de Dios mediante la presentación de temas expositivos o temáticos, animando a llevar una vida que refleje las enseñanzas de Cristo.
                        <br>
                        Cada viernes nos reunimos para alabar a Dios y estudiar Su Palabra juntos, compartir en base a las Escrituras.
                        <br>
                        Durante el año tenemos otras actividades, entre las que destaca café concert denominado “Desde Chile A Las Naciones”, evento realizado en conjunto con el Ministerio de Misiones.
                        <br>
                        En forma mensual, organizamos con Jóvenes Adolescentes e Intermedios, un “After Jóvenes”, instancia para disfrutar juntos y reunir fondos para apoyar el trabajo misionero de nuestros hermanos que han salido a diferentes países.
                        <br>
                            <strong>¡Te esperamos cada viernes a las 19:45 hrs!</strong>
                       
                      ";
        }
        elseif($description == 'jovenes_adultos'){
            $description = "
                            <h4>ADULTO JOVEN</h4>
                            Nuestro objetivo es promover que los jóvenes conozcan cada día más a Cristo a través de una relación personal con Él, que sus vidas sean transformadas por medio de la Palabra y que puedan conocer a otros creyentes.
                            <br>
                            <strong>¡Te esperamos cada viernes a las 19:45 hrs!</strong>
                            
                           ";
        }
        elseif($description == 'matrimonios'){
            $description = "
                        <h4>MATRIMONIOS</h4>
                        “Uno solo puede ser vencido, pero dos pueden resistir. ¡La cuerda de tres hilos no se rompe fácilmente!” – Eclesiastés 4:12
                        <br>
                        Queremos que aprenda a confiar tanto en Dios que sea capaz de sustentar todo su matrimonio, paternidad y su familia en las manos de Dios. Por eso, los apoyamos mediante oración y consejería.
                        <br>
                        Es importante estar motivando constantemente a los matrimonios a orar y crear las condiciones que les permitan sentirse cómodos cuando hablan con Dios, más aún si se trata de exponer nuestros problemas y dificultades.
                        <br>
                       <strong>Los esperamos el tercer sábado de cada mes, a las 18:30 hrs, en Etchevers 42.</strong>
                        
                       ";
        }
        elseif($description == 'damas'){
             $description = "
                    <h4>DAMAS</h4>
                    <strong>Nuestra cita es cada jueves de 15:00 a 19:00 hrs.</strong> Comenzamos con un entretenido taller de manualidades que consiste en tejido, bordado, decupage, entre otros. Luego, compartimos juntas el estudio bíblico y disfrutamos de una rica once.
                    <br>
                    El Ministerio de Damas está dirigido a mujeres, sin restricción de edad, orientado tanto a mujeres de la congregación como de otras partes.
                    
                 ";
        }
        elseif($description == 'varones'){
            $description = "
                    <h4>VARONES</h4>
                    Nuestro objetivo es ser un canal de apoyo en la práctica de las disciplinas básicas –oración y estudio de la Biblia– y su aplicación en el quehacer cotidiano. Buscamos, además, generar lazos de apoyo y oportunidades de compartir con otros la transformación de vida posible en Cristo.
                    <br>
                    <strong>Te esperamos cada viernes a las 20:00 hrs, en nuestra sede ubicada en Quinta 343, Viña del Mar.</strong>
                    
                   ";
        }
        elseif($description == 'años_dorados'){
            $description =  "
                             <h4>AÑOS DORADOS</h4>
                             Es el espacio en el que nuestros adultos mayores se juntan para compartir la palabra de Dios y orar juntos, así como también intercambiar experiencias y disfrutar de sana comunión con actividades durante el año.
                             <br>
                             Si tienes más de 50 primaveras, estás cordialmente invitado a participar con nosotros, <strong>lunes por medio, a partir de las 16:00 hrs.</strong>
                             <br><br>
                            ";
        }
        elseif($description == 'discipulado_fundamental'){
            $description = "
                            <h4>DISCIPULADO FUNDAMENTAL</h4>
                            Los Discipulados Fundamentales son grupos pequeños de personas que se reúnen semanalmente con el propósito de estudiar la Biblia juntos y crecer en la comunión y la oración, aprendiendo así a ser discípulos de Cristo. Los grupos son distribuidos de acuerdo a edad y género y tienen una duración de dos años. Inscripciones los meses de Marzo y Julio.
                            <br>
                            Nuestro propósito es glorificar a Dios proporcionando un espacio de acompañamiento y crecimiento en Cristo, por medio del estudio de las Escrituras y búsqueda de Dios en comunidad.
                            <br>
                            ¡Esperamos que unirte a un grupo sea de mucha bendición para ti!
                            <br>";
                            /*<br>
                            <strong>Contacto: gruposdevida@unioncristiana.cl</strong>
                           ";*/
        }
        elseif($description == 'comunidad_de_vida'){
            $description = "
                            <h4>Comunidad de Vida</h4>
                            Ministerio que combina el estudio de la Biblia, la predicación del evangelio y el amor al prójimo de una manera práctica. Se realizan estudios bíblicos semanalmente en grupos de hasta 15 personas, en reuniones con una duración aproximada de 2 horas, utilizando el método inductivo para dicho estudio. A la vez, cada grupo realiza salidas para predicar el evangelio y para practicar misericordia en medio de nuestra comunidad.
                            <br>";
                            /*<br>
                            <strong>Contacto: estudiomisional@unioncristiana.cl</strong>
                           ";*/
        }
        /*elseif($description == 'icm'){
            $description = "
                            <h4>INSTITUTO DE CAPACITACIÓN MINISTERIAL (ICM)</h4>
                            La misión de ICM es entregar formación teológica, bíblica y ministerial a los miembros de la congregación, con el fin de capacitarlos para asumir diferentes roles de liderazgo servicial. Actualmente, consta con dos programas de estudio: Programa de Capacitación Ministerial (P.C.M.) y Certificación en Teología (MOCLAM).
                            <br>
                            <br>
                            <strong>Contacto: capacitacion@unioncristiana.cl</strong>
                           ";
        }*/
        elseif($description == 'pcm'){
            $description = "
                            <h4>PROGRAMA DE CAPACITACIÓN MINISTERIAL</h4>
                            El Programa de Capacitación Ministerial, es un plan de estudios enfocado en brindar conocimientos bíblicos y doctrinales fundamentales para el desarrollo del quehacer ministerial. Este programa inicial es un requisito para todo miembro que se encuentra sirviendo formalmente en un ministerio dentro de la congregación.
                            <br>
                            La Certificación en Teología, es un plan de estudios enfocado en profundizar conocimientos de Teología Bíblica, Teología Sistemática y Pensamiento Cristiano. Gracias al acuerdo con Moore College Latinoamérica, el certificado cuenta con el reconocimiento internacional de esta institución teológica.
                           ";
        }
        elseif($description == 'en_accion'){
            $description = "
                            <h4>MINISTERIO EN ACCIÓN</h4>
                            El Ministerio de Misericordia en Acción tiene como propósito Amar a Dios y amar al prójimo por medio del Servicio y la misericordia. Esto se materializa en ir en ayuda de las personas que están pasando algún tipo de necesidad.
                           ";
        }
        elseif($description == 'misiones_transculturales'){
            $description = "
                            <h4>MISIONES TRANSCULTURALES</h4>
                            “Somos un ministerio conformado por personas que aman a Dios y a su prójimo, y consecuencia de este amor quieren dar a conocer el nombre de Dios en todo lugar y en todo tiempo”
                            <br>
                            Trabajamos para desarrollar este objetivo e impactar a nivel local, nacional y transcultural.
                            <br>
                            Durante el año desarrollamos actividades evangelísticas tanto en nuestra región como fuera de ella a través de viajes misioneros: reuniones de oración, un evento misionero anual y misioneros fuera del país extendiendo el reino de Dios.
                            <br>";
                            /*<br>
                            ¡Te invitamos a participar! Escríbenos a: <strong>misiones@unioncristiana.cl</strong>
                           ";*/
        }
        elseif($description == 'musica'){
            $description = "
                            <h4>MINISTERIO DE MÚSICA</h4>
                            El ministerio de música es un equipo de personas dispuestas al servicio de la congregación con el propósito de glorificar a Dios a través de canciones centradas en el evangelio y Su palabra.
                            <br>
                            El objetivo principal es reconocer por medio de la alabanza cantada quién es Dios y junto a esto animar a la iglesia a rendirse a Cristo y Su señorío.
                            <br>";
                            /*<br>
                            <strong>Contacto: musica@unioncristiana.cl</strong>
                           ";*/
        }
        elseif($description == 'oracion'){
            $description = "
                            <h4>ORACIÓN</h4>
                            “El ministerio de oración, es un ministerio que está al servicio de Dios y de la iglesia. Siguiendo el propósito de amar a Dios y al prójimo por medio de la Oración. Esto se materializa orando para agradecer y glorificar a Dios e interceder por las peticiones del prójimo.”
                           ";
        }
        elseif($description == 'anfitriones'){
            $description = "
                            <h4>ANFITRIONES</h4>
                            “Somos un ministerio guiado por el amor de Cristo, que tiene como objetivo servir al prójimo,  recibir, acoger, integrar; además, poner en práctica nuestros talentos y dones a disposición de las necesidades de la iglesia”
                            <br>
                            ¡Nuestro llamado en la congregación es servir!
                            <br>";
                            /*<br>
                            <strong>Contacto: anfitriones@unioncristiana.cl</strong>
                           ";*/
        }
        elseif($description == 'medios'){
            $description = "
                            <h4>COMUNICACIÓN Y MEDIOS</h4>
                            Como iglesia deseamos enseñar la palabra de Dios y difundirla tanto en nuestra ciudad como en el país. En este sentido, usamos los medios tecnológicos que están a nuestro alcance, con el propósito de glorificar a Dios y que más personas lo conozcan.
                            <br>
                            Comunicación y medios está conformado por voluntarios que sirven a Dios y a la congregación a través de áreas como diseño gráfico, multimedia, audiovisual y plataformas digitales.
                            <br>
                            Cada domingo tenemos transmisión en directo a las 11:30 hrs. Más detalles en la sección VIDEOS
                            <br>";
                            /*<br>
                            <strong>Contacto: medios@unioncristiana.cl</strong>
                           ";*/
        }
        return $description;
    }

    /**
     * Display a listing of the posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function nosotros()
    {
        return view('front.informacion.nosotros');
    }

    /**
     * Display a listing of the posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function declaracionDeFe()
    {
        return view('front.informacion.declaracion_de_fe');
    }
}
