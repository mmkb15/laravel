<?php
namespace App\Models; use Illuminate\Database\Eloquent\Model;
class AttributeValue extends Model {protected $primaryKey='value_id';public $timestamps=false;protected $fillable=['attribute_id','value'];public function attribute(){return $this->belongsTo(Attribute::class,'attribute_id','attribute_id');}public function skus(){return $this->belongsToMany(ProductSku::class,'sku_attribute_values','attribute_value_id','sku_id','value_id','sku_id');}}
