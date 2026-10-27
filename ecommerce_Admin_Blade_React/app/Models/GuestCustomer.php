<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class GuestCustomer extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'address', 'image'];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function getImageUrlAttribute(): string
    {
        if (! $this->image) {
            return asset('assets/images/avatar/guest-default.svg');
        }

        return Storage::disk('public')->url($this->image);
    }
}
