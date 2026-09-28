<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_number','user_id','subtotal','shipping_cost','discount','total',
        'payment_method','payment_status','status','shipping_name','shipping_phone',
        'shipping_address','notes'
    ];

    protected $casts = [
        'subtotal' => 'decimal:2','shipping_cost' => 'decimal:2','discount' => 'decimal:2','total' => 'decimal:2'
    ];

    public function user() { return $this->belongsTo(User::class); }
    public function items() { return $this->hasMany(OrderItem::class); }
}
