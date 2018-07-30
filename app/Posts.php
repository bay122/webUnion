<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $id_usuario
 * @property string $title
 * @property string $slug
 * @property string $seo_title
 * @property string $excerpt
 * @property string $body
 * @property string $meta_description
 * @property string $meta_keywords
 * @property boolean $active
 * @property string $image
 * @property Usuario $usuario
 */
class Posts extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['id_usuario', 'title', 'slug', 'seo_title', 'excerpt', 'body', 'meta_description', 'meta_keywords', 'active', 'image'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usuario()
    {
        return $this->belongsTo('App\Usuario', 'id_usuario', 'id_usuario');
    }
}
