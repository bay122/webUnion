<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $category_id
 * @property int $post_id
 */
class Category_post extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'category_post';

    /**
     * @var array
     */
    protected $fillable = ['category_id', 'post_id'];

}
