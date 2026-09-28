<?php
namespace App\Models; use Illuminate\Database\Eloquent\Model; use Illuminate\Database\Eloquent\Factories\HasFactory;
class Brand extends Model {use HasFactory;protected $primaryKey='brand_id';public $timestamps=false;protected $fillable=['name','slug'];public function products(){return $this->hasMany(Product::class,'brand_id','brand_id');}}
