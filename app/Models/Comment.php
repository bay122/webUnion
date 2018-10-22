<?php

namespace App\Models;

use App\Events\ModelCreated;
use Baum\Node;

/**
 * @property int $id
 * @property int $id_usuario
 * @property int $post_id
 * @property int $parent_id
 * @property int $lft
 * @property int $rgt
 * @property int $depth
 * @property string $body
 * @property Usuario $usuario
 */
class Comment extends Node
{
    use IngoingTrait;

    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => ModelCreated::class,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['body', 'post_id', 'id_usuario', 'parent_id', 'lft', 'rgt', 'depth', 'body'];

    /**
     * One to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
        //return $this->belongsTo('App\Usuario', 'id_usuario', 'id_usuario');
    }

    /**
     * One to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post()
    {
        return $this->belongsTo (Post::class);
    }
}
