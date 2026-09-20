<?php
use Illuminate\Database\Migrations\Migration; use Illuminate\Database\Schema\Blueprint; use Illuminate\Support\Facades\Schema;
return new class extends Migration { public function up():void{Schema::create('brands',function(Blueprint $t){$t->id('brand_id');$t->string('name',100);$t->string('slug',150)->unique();});} public function down():void{Schema::dropIfExists('brands');}};
