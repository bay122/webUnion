<?php

namespace App\Http\Controllers\Front;

use App\ {
    Http\Controllers\Controller
};
use Illuminate\Http\Request;

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
        /*$categories = Category::all();
        foreach ($categories as $category) {
            $category->route = $this->_getRoute($category->name);
        }
        */
        $category1 = (object)array(
            "image" => (object)array("route" => "images/categories/EDITORIAL.jpg"),
            "route" => "route",
            "name" => "COLUMNA EDITORIAL",
            "description" => (object)array("label" => "VER NOTICIAS")
        );
        $category2 = (object)array(
            "image" => (object)array("route" => "images/categories/NOTAS.jpg"),
            "route" => "route",
            "name" => "NOTAS",
            "description" => (object)array("label" => "VER NOTICIAS")
        );
        $category3 = (object)array(
            "image" => (object)array("route" => "images/categories/MINISTERIOS.jpg"),
            "route" => "route",
            "name" => "MINISTERIOS",
            "description" => (object)array("label" => "VER NOTICIAS")
        );
        $category4 = (object)array(
            "image" => (object)array("route" => "images/categories/MISIONES.jpg"),
            "route" => "route",
            "name" => "MISIONES",
            "description" => (object)array("label" => "VER NOTICIAS")
        );
        $category5 = (object)array(
            "image" => (object)array("route" => "images/categories/AGENDA.jpg"),
            "route" => "route",
            "name" => "AGENDA",
            "description" => (object)array("label" => "PROXIMOS EVENTOS")
        );
        $category6 = (object)array(
            "image" => (object)array("route" => "images/categories/GALERIA.jpg"),
            "route" => "route",
            "name" => "GALERIA",
            "description" => (object)array("label" => "VER FOTOS")
        );

        $categories = array($category1,$category2,$category3,$category4,$category5,$category6);
        //$lastArticleNotas = User::orderby('created_at', 'desc')->first();
        return view('front.index', ['categories' => $categories]);
    }
}
