<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $post_id
 * @property int $tag_id
 */
class Post_tag extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'post_tag';

    /**
     * @var array
     */
    protected $fillable = ['post_id', 'tag_id'];

}
