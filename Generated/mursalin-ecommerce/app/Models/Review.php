<?php
namespace App\Models; use Illuminate\Database\Eloquent\Model;
class Review extends Model {protected $primaryKey='review_id';public $timestamps=false;protected $fillable=['user_id','product_id','rating','comment'];protected $casts=['created_at'=>'datetime'];public function user(){return $this->belongsTo(User::class,'user_id','user_id');}public function product(){return $this->belongsTo(Product::class,'product_id','product_id');}}
