<?php
namespace App\Models; use Illuminate\Database\Eloquent\Model;
class Address extends Model {protected $primaryKey='address_id';public $timestamps=false;protected $fillable=['user_id','address_type','address_line_1','address_line_2','city','state','postal_code','country'];public function user(){return $this->belongsTo(User::class,'user_id','user_id');}}
