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

class ImagenesCarrusel extends Model
{
     /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'imagenes_carrusel';
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_imagen';

    /**
     * @var array
     */
    protected $fillable = [
		'id_imagen',
		'gl_nombre',
		'gl_path',
		'bo_activo',
		'bo_estado',
		'id_usuario_crea',
		'id_usuario_actualiza',
		'created_at',
		'updated_at',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
