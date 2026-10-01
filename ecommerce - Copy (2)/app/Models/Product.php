<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    protected $fillable = [
        'name', 'slug', 'description', 'image', 'category_id', 'brand_id', 'sku',
        'price', 'sale_price', 'stock', 'status'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'sale_price' => 'decimal:2',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function skus(): HasMany
    {
        return $this->hasMany(ProductSku::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class)->orderBy('sort_order');
    }

    public function primaryImage(): HasOne
    {
        return $this->hasOne(ProductImage::class)->where('is_primary', true);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getDisplayPriceAttribute(): string
    {
        return number_format((float) ($this->sale_price ?: $this->price), 2);
    }

    public function getImageUrlAttribute(): string
    {
        if ($this->relationLoaded('primaryImage') && $this->getRelation('primaryImage')) {
            return $this->getRelation('primaryImage')->url;
        }

        if ($this->relationLoaded('images')) {
            $images = $this->getRelation('images');
            $primaryImage = $images->firstWhere('is_primary', true) ?? $images->first();

            if ($primaryImage) {
                return $primaryImage->url;
            }
        }

        if (! $this->image) {
            return asset('assets/images/products/1.png');
        }

        return str_starts_with($this->image, 'assets/')
            ? asset($this->image)
            : Storage::disk('public')->url($this->image);
    }
}
