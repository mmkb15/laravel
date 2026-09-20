<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class ProductSku extends Model
{
    protected $table = 'product_skus';
    protected $primaryKey = 'sku_id';
    protected $fillable = ['product_id','sku_code','price','stock_quantity','image_url'];
    protected $casts = ['price'=>'decimal:2'];
    public function product() { return $this->belongsTo(Product::class, 'product_id', 'product_id'); }
}
