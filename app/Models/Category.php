<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Category extends Model
{
    use Translatable;

    protected $fillable = ['photo', 'parent_category'];

    public $translatedAttributes = ['name'];

    /**
     * Products relation
     */
    public function products()
    {
        return $this->hasMany(\App\Models\Product::class);
    }

    /**
     * Parent category relation
     */
    public function parent()
    {
        return $this->belongsTo(__CLASS__, 'parent_category');
    }

    /**
     * Children categories relation
     */
    public function children()
    {
        return $this->hasMany(__CLASS__, 'parent_category');
    }
}
