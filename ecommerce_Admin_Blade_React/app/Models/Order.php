<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = [
        'order_number', 'user_id', 'guest_customer_id', 'subtotal', 'shipping_cost', 'discount', 'total',
        'payment_method', 'payment_status', 'status', 'shipping_name', 'shipping_phone',
        'shipping_address', 'customer_email', 'notes',
    ];

    protected $casts = [
        'subtotal' => 'decimal:2', 'shipping_cost' => 'decimal:2', 'discount' => 'decimal:2', 'total' => 'decimal:2',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function guestCustomer(): BelongsTo
    {
        return $this->belongsTo(GuestCustomer::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
