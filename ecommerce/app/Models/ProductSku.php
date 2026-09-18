<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSku extends Model
{
    protected $fillable = [
        'product_id', 'sku', 'price', 'stock', 'image', 'status'
    ];

    // SKU belongs to a Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}