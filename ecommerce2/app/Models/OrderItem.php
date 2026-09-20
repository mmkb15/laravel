<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class OrderItem extends Model
{
    protected $table = 'order_items';
    protected $primaryKey = 'order_item_id';
    public $timestamps = false;
    protected $fillable = ['order_id','sku_id','quantity','price'];
    protected $casts = ['price'=>'decimal:2'];
    public function order() { return $this->belongsTo(Order::class, 'order_id', 'order_id'); }
    public function sku() { return $this->belongsTo(ProductSku::class, 'sku_id', 'sku_id'); }
}
