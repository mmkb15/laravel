<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable = [
        'name','slug','description','image','category_id','brand_id','sku',
        'price','sale_price','stock','status'
    ];

    protected $casts = ['price' => 'decimal:2', 'sale_price' => 'decimal:2'];

    public function category(): BelongsTo { return $this->belongsTo(Category::class); }
    public function brand(): BelongsTo { return $this->belongsTo(Brand::class); }
    public function skus(): HasMany { return $this->hasMany(ProductSku::class); }
    public function orderItems(): HasMany { return $this->hasMany(OrderItem::class); }

    public function getDisplayPriceAttribute(): string
    {
        return number_format((float) ($this->sale_price ?: $this->price), 2);
    }
}
