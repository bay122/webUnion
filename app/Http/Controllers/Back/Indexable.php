<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Services\Thumb;

/**
 * Un "Rasgo" (trait) es similar a una clase abstracta, ya que no se puede crear una instancia de sí mismo, 
 * pero contiene métodos que se pueden usar en una clase concreta. Los rasgos se introdujeron en PHP 
 * en la versión 5.4 y se usan ampliamente en el marco de trabajo de Laravel. 
 * Son ideales para reducir el efecto limitante de la herencia única, lo que permite 
 * la exposición de los métodos como si estuvieran definidos en la clase de llamada. 
 *
 * 
 * Docs: https://www.conetix.com.au/blog/simple-guide-using-traits-laravel-5
 *
 * Indexable: Se encarga de procesar la paginación de las grillas o listados que no se crean a partir 
 * de un Datatables.
 */
trait Indexable
{
    /**
     * The PostRepository instance.
     *
     * @var \App\Repositories\PostRepository
     */
    protected $repository;

    /**
     * The table.
     *
     * @var string
     */
    protected $table;

    /**
     * Display a listing of the records.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $parameters = $this->getParameters ($request);

        /**
         * La función config() carga los campos de la configuración definidos en el archivo config/app.php
         * $repository y $table se definen en los controladores que usan indexable.
         */
        // Get records and generate links for pagination
        $records = $this->repository->getAll (config ("app.nbrPages.back.$this->table"), $parameters);
        $links = $records->appends ($parameters)->links ('back.pagination');

        // Ajax response
        if ($request->ajax ()) {
            return response ()->json ([
                'table' => view ("back.$this->table.table", [$this->table => $records])->render (),
                'pagination' => $links->toHtml (),
            ]);
        }

        return view ("back.$this->table.index", [$this->table => $records, 'links' => $links]);
    }

    /**
     * Get parameters.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    protected function getParameters($request)
    {
        // Default parameters
        $parameters = config("parameters.$this->table");

        // Build parameters with request
        foreach ($parameters as $parameter => &$value) {
            if (isset($request->$parameter)) {
                $value = $request->$parameter;
            }
        }

        return $parameters;
    }
}