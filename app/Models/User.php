<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_usuario
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $rol
 * @property string $size
 * @property boolean $valid
 * @property int $bo_bloqueado
 * @property int $bo_tripulante
 * @property boolean $bo_corporacion
 * @property Comment[] $comments
 * @property Post[] $posts
 */
class User extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_usuario';

    /**
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'rol', 'valid', 'bo_bloqueado', 'bo_tripulante', 'bo_corporacion'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Comment', 'id_usuario', 'id_usuario');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany('App\Post', 'id_usuario', 'id_usuario');
    }
}
