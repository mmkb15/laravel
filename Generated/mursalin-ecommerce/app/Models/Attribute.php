<?php
namespace App\Models; use Illuminate\Database\Eloquent\Model;
class Attribute extends Model {protected $primaryKey='attribute_id';public $timestamps=false;protected $fillable=['name'];public function values(){return $this->hasMany(AttributeValue::class,'attribute_id','attribute_id');}}
