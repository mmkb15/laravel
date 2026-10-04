<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class ProductImage extends Model
{
    protected $fillable = ['product_id', 'path', 'is_primary', 'sort_order'];

    protected $casts = [
        'is_primary' => 'boolean',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function getUrlAttribute(): string
    {
        if (str_starts_with($this->path, 'assets/')) {
            return file_exists(public_path($this->path))
                ? asset($this->path)
                : asset('assets/images/products/1.png');
        }

        return Storage::disk('public')->exists($this->path)
            ? Storage::disk('public')->url($this->path)
            : asset('assets/images/products/1.png');
    }
}
