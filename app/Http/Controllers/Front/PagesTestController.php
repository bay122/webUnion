<?php

namespace App\Http\Controllers\Front;

use App\ {
    Http\Controllers\Controller,
    Http\Requests\SearchRequest,
    Repositories\PostRepository,
    Models\Tag,
    Models\Category
};
use Illuminate\Http\Request;

class PagesTestController extends Controller
{
    public function home()
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
    	return view('uc.welcome', ['categories' => $categories]);
    }

    public function editorial()
    {
        $category = Category::find(1);
        return view('uc.articulos.editorial', ['category' => $category]);
    }

    public function notas()
    {
        $category = Category::find(2);
        return view('uc.articulos.notas', ['category' => $category]);
    }

    public function ministerios()
    {
        $category = Category::find(3);
        return view('uc.articulos.ministerios', ['category' => $category]);
    }

    public function misiones()
    {
       $category = Category::find(4);
        return view('uc.articulos.misiones', ['category' => $category]);
    }

    public function agenda()
    {
        $category = Category::find(5);
        return view('uc.articleView', ['category' => $category]);
    }

    public function galery()
    {
        $category = Category::find(6);
        $newName = "Sociales - ".$category->name;
        $category->name = $newName;
        return view('uc.galery', ['category' => $category]);
    }

    public function sociales()
    {
        $category = Category::find(6);
        $newName = "Sociales - ".$category->name;
        $category->name = $newName;
        return view('uc.galery', ['category' => $category]);
    }

    public function contact()
    {
        return view('uc.contact');
    }

    public function notFound()
    {
        return view('uc.404');
    }

    public function login()
    {
        return view('uc.login');
    }

    private function _getRoute($category){
        $route = "";
        if(strtoupper($category) == "COLUMNA EDITORIAL"){
            $route = "articles/editorial";
        }else if(strtoupper($category) == "NOTAS"){
            $route = "articles/notas";
        }else if(strtoupper($category) == "MINISTERIOS"){
            $route = "articles/ministerios";
        }else if(strtoupper($category) == "MISIONES"){
            $route = "articles/misiones";
        }else if(strtoupper($category) == "AGENDA"){
            $route = "articles/agenda";
        }else if(strtoupper($category) == "SOCIALES"){
            $route = "articles/sociales";
        }else if(strtoupper($category) == "CONTACTO"){
            $route = "articles/contact";
        }
        return $route;
    }

}
