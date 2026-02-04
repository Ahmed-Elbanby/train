<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Category extends Model
{
    use Translatable;

    protected $fillable = ['photo'];

    public $translatedAttributes = ['name'];

    /**
     * Products relation
     */
    public function products()
    {
        return $this->hasMany(\App\Models\Product::class);
    }
}
