<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

  /**
     * @property int $id
     * @property string $contenido
     * @property string $col
     * @property string $descripcion
     * @property int $estado
     */

class Configuracion extends Model
{
     /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'configuraciones';
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */
    protected $fillable = ['contenido', 'col', 'descripcion', 'estado'];



  

}
