<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property string $slug
 */
class Categories extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['title', 'slug'];

}
