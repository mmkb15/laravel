<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
    protected $primaryKey = 'product_id';
    protected $fillable = ['category_id','brand_id','name','slug','description','is_active'];
    protected $casts = ['is_active'=>'boolean'];
    public function category() { return $this->belongsTo(Category::class); }
    public function brand() { return $this->belongsTo(Brand::class); }
    public function skus() { return $this->hasMany(ProductSku::class, 'product_id', 'product_id'); }
    public function getPrimarySkuAttribute() { return $this->skus->first(); }
}
