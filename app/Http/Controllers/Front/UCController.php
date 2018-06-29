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
        return view('front.index');
    }

    /**
     * Display a listing of the posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function ministerios()
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
}
