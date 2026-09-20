<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'order_id';
    public $timestamps = false;
    protected $fillable = ['order_number','customer_name','phone','email','shipping_address','subtotal','discount_amount','shipping_cost','tax_amount','total_amount','status','order_date'];
    protected $casts = ['order_date'=>'datetime','subtotal'=>'decimal:2','discount_amount'=>'decimal:2','shipping_cost'=>'decimal:2','tax_amount'=>'decimal:2','total_amount'=>'decimal:2'];
    public function items() { return $this->hasMany(OrderItem::class, 'order_id', 'order_id'); }
}
