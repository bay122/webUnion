<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $id_rol
 * @property int $id_usuario_usuario
 */
class PerfilUsuario extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'perfiles_usuario';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_perfil_usuario';

    /**
     * @var array
     */
    protected $fillable = [
    	'id_perfil_usuario', 
    	'id_perfil',
    	'id_usuario',
    	'bo_activo',
    	'bo_estado',
    ];


    /**
     * One to Many relation
     * [Relationship with conditions and ordering]
     * 		Docs: https://laravel-news.com/eloquent-tips-tricks
     * @return [type] [description]
     */
    public function perfil(){
    	return $this->belongsTo(Perfil::class, 'id_perfil', 'id_perfil')->where('bo_activo', true)->where('bo_estado', 1);//->orderBy('email');
    }

    /**
     * One to Many relation
     * [Relationship with conditions and ordering]
     * 		Docs: https://laravel-news.com/eloquent-tips-tricks
     * @return [type] [description]
     */
    public function usuario(){
    	return $this->belongsTo(User::class, 'id_usuario', 'id_usuario')->where('bo_activo', true)->where('bo_estado', 1);//->orderBy('email');
    }


}
