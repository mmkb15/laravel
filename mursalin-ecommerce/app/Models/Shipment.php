<?php
namespace App\Models; use Illuminate\Database\Eloquent\Model;
class Shipment extends Model {protected $primaryKey='shipment_id';public $timestamps=false;protected $fillable=['order_id','shipping_provider','tracking_number','status','estimated_delivery'];protected $casts=['estimated_delivery'=>'date'];public function order(){return $this->belongsTo(Order::class,'order_id','order_id');}}
