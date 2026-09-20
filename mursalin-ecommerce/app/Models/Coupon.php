<?php
namespace App\Models; use Illuminate\Database\Eloquent\Model;
class Coupon extends Model {protected $primaryKey='coupon_id';public $timestamps=false;protected $fillable=['code','discount_type','discount_value','min_order_amount','expiry_date','is_active','usage_limit','used_count'];protected $casts=['expiry_date'=>'date','is_active'=>'boolean'];public function orders(){return $this->hasMany(Order::class,'coupon_id','coupon_id');}}
