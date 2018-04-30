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
        $categories = Category::all();
        foreach ($categories as $category) {
            $category->route = $this->_getRoute($category->name);
        }

        //$lastArticleNotas = User::orderby('created_at', 'desc')->first();
    	return view('front.uc.welcome', ['categories' => $categories]);
    }

    public function editorial()
    {
        $category = Category::find(1);
        return view('front.uc.articulos.editorial', ['category' => $category]);
    }

    public function notas()
    {
        $category = Category::find(2);
        return view('front.uc.articulos.notas', ['category' => $category]);
    }

    public function ministerios()
    {
        $category = Category::find(3);
        return view('front.uc.articulos.ministerios', ['category' => $category]);
    }

    public function misiones()
    {
       $category = Category::find(4);
        return view('front.uc.articulos.misiones', ['category' => $category]);
    }

    public function agenda()
    {
        $category = Category::find(5);
        return view('front.uc.articleView',front.uc. ['category' => $category]);
    }

    public function galery()
    {
        $category = Category::find(6);
        $newName = "Sociales - ".$category->name;
        $category->name = $newName;
        return view('front.uc.galery', ['category' => $category]);
    }

    public function sociales()
    {
        $category = Category::find(6);
        $newName = "Sociales - ".$category->name;
        $category->name = $newName;
        return view('front.uc.galery', ['category' => $category]);
    }

    public function contact()
    {
        return view('front.uc.contact');
    }

    public function notFound()
    {
        return view('front.uc.404');
    }

    public function login()
    {
        return view('front.uc.login');
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
