<?php

namespace App\Http\Controllers\back;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

use App\ {
    Services\Access,
    Services\Security,
    Services\Helper,
    Http\Requests\VideoRequest,
    Http\Controllers\Controller,
    Models\Configuracion,
    Models\ImagenesCarrusel
   
};

//use Illuminate\Http\Request;

class ConfiguracionController extends Controller
{
    private $_html_descripcion = '<div class="padding-five fl-left bg-gray width-100"><div class="blog-details text-center"><h2 class="alt-font font-weight-600 title-small text-mid-gray margin-six no-margin-bottom text-uppercase entry-title blog-layout-title"><a rel="bookmark">{TITULO}</a></h2><div class="margin-two-bottom no-margin-lr letter-spacing-2 text-extra-small text-uppercase border-bottom-mid-gray padding-one-bottom xs-margin-six display-inline-block"><ul class="post-meta-box meta-box-style2 blog-layout-meta"><li><a rel="category tag" class="text-link-light-gray blog-layout-meta-link" href="#">{CATEGORIA}</a></li><li class="published">{FECHA}</li></ul></div><p class="margin-four-bottom xs-margin-eight-bottom sm-margin-five-bottom width-80 sm-width-100 margin-lr-auto entry-summary" id="descripcion">{CONTENIDO_DESCRIPCION}</p></div></div>';
    private $_titulo = "Ácimos";
    private $_fecha = "25 Abril 2018";
    private $_categoria = "1° Corintios 5:6-8";
    private $_descripcion = "6 No es buena vuestra jactancia. ¿No sabéis que un poco de levadura leuda toda la masa?<br/>7 Limpiaos, pues, de la vieja levadura, para que seáis nueva masa, sin levadura como sois; porque nuestra pascua, que es Cristo, ya fue sacrificada por nosotros.<br/>8 Así que celebremos la fiesta, no con la vieja levadura, ni con la levadura de malicia y de maldad, sino con panes sin levadura, de sinceridad y de verdad.<br/>";
    private $_video_base = '<iframe width="560" height="315" src="https://www.youtube.com/embed/YhEdhOr15UM" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
    private $_livestream_video = '<iframe id="ls_embed_1539530465" src="https://livestream.com/accounts/2823533/events/8412479/player?width=960&height=540&enableInfoAndActivity=true&defaultDrawer=feed&autoPlay=true&mute=false" width="960" height="540" frameborder="0" scrolling="no" allowfullscreen> </iframe>';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $configuracion = Configuracion::find(1);

        //TODO: cambiar la bd para que soporte por separado titulo, detalle, fecha y descripcion
        /*try{
            $str = $configuracion->descripcion;
            $t = explode('id="descripcion">',$str);
            if(isset($t[1])){
                $d = explode('</p>',$t[1]);
                $descripcion = $d[0];
            }else{
                $descripcion = $configuracion->descripcion;    
            }
        }catch(Exception $e){
            $descripcion = $configuracion->descripcion;
        }*/

        return view('back.videos.index',compact('configuracion','id'));//, 'descripcion'
           
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function carrusel()
    {
        $imagenes = ImagenesCarrusel::all();
        Helper::loadJavascript("back/HomeConfig/index.js");
        //file_put_contents('php://stderr', PHP_EOL . print_r(Storage::allFiles("images"), TRUE). PHP_EOL, FILE_APPEND);
        return view('back.home_config.carrusel.index',compact('imagenes'));
           
    }

    /**
     * [actualizar_imagenes description]
     * @param  Request $request [description]
     * @return [type]           [description]
     * @docs https://laravel.com/docs/5.5/requests#files
     *       https://laravel.com/docs/5.5/filesystem
     *       https://programacionymas.com/blog/subir-imagen-usando-ajax-y-laravel
     */
    public function actualizar_imagenes(Request $request)
    {
        //file_put_contents('php://stderr', PHP_EOL . print_r($request->all(), TRUE). PHP_EOL, FILE_APPEND);
        //
        $extensiones_validas = ['jpeg', 'jpg', 'png', 'JPEG', 'JPG', 'PNG'];
        $size_limit = 2097152; //2Mb

        $imagenes_actualizadas = $request->img_carrusel;
        $imagenes_carrusel = ImagenesCarrusel::all();
        foreach ($imagenes_carrusel as $imagen) {
        	$file_name = "img_carrusel_".$imagen->id_imagen;
        	if(isset($imagenes_actualizadas[$imagen->id_imagen])){
        		$file = $imagenes_actualizadas[$imagen->id_imagen];
	        	$extension = $file->getClientOriginalExtension();
	    		$path = public_path('images/carrousel/'.$file_name. '.' . $extension);
	        	if( $file->isValid() &&
	        		in_array($file->extension(), $extensiones_validas) &&
	        		$file->getSize() <= $size_limit){

	        		/*$listado_archivos = Storage::disk('carrusel')->files();

	        		foreach ($listado_archivos as $nombre) {
	        			$aux = explode(".", $nombre);
	        			$nombre_sin_extencion = (isset($aux[0]))?$aux[0]:'';
	        			$extension = (isset($aux[1]))?$aux[1]:'';
	        			if($imagen->gl_nombre == $nombre_sin_extencion){
			        		Storage::disk('carrusel')->delete($imagen->gl_nombre.'.'.$extension);
	        			}
	        		}*/
	        		/**
	        		 * @docs http://image.intervention.io
	        		 */
	        		//$path = 'images/carrousel/'.$file_name. '.' . $extension;
	        		file_put_contents('php://stderr', PHP_EOL . print_r($path, TRUE). PHP_EOL, FILE_APPEND);
	        		//Image::make($file)->fit(144, 144)->save($path);
	        		Image::make($file->getRealPath())->save($path);


	        		/*if (Storage::exists('public/'.$file_name)) {
					    Storage::delete('public/'.$file_name);
					}
	        		$file->storeAs('public',"img_carrusel_".$imagen->id_imagen.".png");*/

	        		$imagen->bo_activo = true;
	        		$imagen->gl_path = 'images/carrousel/'.$file_name. '.' . $extension;
	        		$imagen->id_usuario_actualiza = auth()->id();//registro quien realizó el cambio
	        		$imagen->save();
	        	}
        	}else{
        		if(!$request->get("mostrar_img_carrusel".$imagen->id_imagen)){
	        		$listado_archivos = Storage::disk('carrusel')->files();

	        		foreach ($listado_archivos as $nombre) {
	        			$aux = explode(".", $nombre);
	        			$nombre_sin_extencion = (isset($aux[0]))?$aux[0]:'';
	        			$extension = (isset($aux[1]))?$aux[1]:'';
	        			if($imagen->gl_nombre == $nombre_sin_extencion){
			        		Storage::disk('carrusel')->delete($imagen->gl_nombre.'.'.$extension);
	        			}
	        		}
	        		/*
	        		$path = public_path('images/carrousel/'.$file_name. '.' . $extension);
	        		file_put_contents('php://stderr', PHP_EOL . print_r($path, TRUE). PHP_EOL, FILE_APPEND);
	        		if (Storage::exists($path)) {
	        			file_put_contents('php://stderr', PHP_EOL . print_r($file_name.' existe', TRUE). PHP_EOL, FILE_APPEND);
					    Storage::delete($path);
					}else{
						file_put_contents('php://stderr', PHP_EOL . print_r($file_name.' no existe', TRUE). PHP_EOL, FILE_APPEND);
					}*/
	        		$imagen->bo_activo = false;
	        		$imagen->id_usuario_actualiza = auth()->id();//registro quien realizó el cambio
	        		$imagen->save();
        		}
        		
        	}
        }

        return redirect(route('home_config.carrusel.index'))->with('ok', "Carrusel actualizado correctamente");
           
    }

    


     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\VideoRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VideoRequest $request , $id)
    {

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

        $configuracion->contenido   = Security::validar($video_base, 'string');
        $configuracion->titulo      = Security::validar($titulo, 'string');
        $configuracion->categoria   = Security::validar($categoria, 'string');
        $configuracion->fecha       = Security::revisarString($fecha);//TODO ver que validar usar
        $configuracion->descripcion = Security::validar($descripcion, 'string');
        $configuracion->html        = Security::revisarString($html_descripcion);//TODO ver que validar usar
        $configuracion->estado      = Security::revisarString($mostrar_descripcion_video);//TODO ver que validar usar
        $configuracion->col         = $tamano_columnas;

        $configuracion->save();

        $request->session ()->flash ('ok', __('Settings have been successfully saved. '));

        return redirect()->route('videos.index', ['page' => $request->page]);
    }
   
}
