<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Brand extends Model
{
    protected $fillable = ['name', 'slug', 'image', 'description', 'status'];
    public function products() { return $this->hasMany(Product::class); }

    public function getImageUrlAttribute(): ?string
    {
        if (! $this->image) {
            return null;
        }

        return str_starts_with($this->image, 'assets/')
            ? asset($this->image)
            : Storage::disk('public')->url($this->image);
    }
}
