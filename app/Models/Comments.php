<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id_usuario
 * @property int $post_id
 * @property int $parent_id
 * @property int $lft
 * @property int $rgt
 * @property int $depth
 * @property string $body
 * @property Usuario $usuario
 */
class Comments extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id_usuario', 'post_id', 'parent_id', 'lft', 'rgt', 'depth', 'body'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usuario()
    {
        return $this->belongsTo('App\Usuario', 'user_id_usuario', 'id_usuario');
    }
}
