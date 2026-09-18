<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'slug', 'description', 'image',
        'category_id', 'brand_id', 'vendor_id', 'status'
    ];

    // Product belongs to a Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Product has many SKUs
    public function skus()
    {
        return $this->hasMany(ProductSku::class);
    }
}