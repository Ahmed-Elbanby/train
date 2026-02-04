<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Product extends Model
{
    use Translatable;

    protected $fillable = [
        'category_id',
        'price',
        'has_offer',
        'offer_type',
        'offer_amount',
        'final_price'
    ];

    public $translatedAttributes = ['name', 'details'];
    
    // Cast boolean for has_offer
    protected $casts = [
        'has_offer' => 'boolean',
    ];

    // Calculate final price before saving
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($product) {
            if ($product->has_offer) {
                if ($product->offer_type === 'percent') {
                    $product->final_price = $product->price - ($product->price * ($product->offer_amount / 100));
                } elseif ($product->offer_type === 'value') {
                    $product->final_price = $product->price - $product->offer_amount;
                }
            } else {
                $product->final_price = $product->price;
            }
        });
    }

    /**
     * Category relation
     */
    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class);
    }

    // Accessor for final price
    public function getFinalPriceAttribute($value)
    {
        if ($this->has_offer) {
            return $value ?? $this->price;
        }
        return $this->price;
    }
}
