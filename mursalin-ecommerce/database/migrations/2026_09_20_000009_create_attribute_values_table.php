<?php
use Illuminate\Database\Migrations\Migration; use Illuminate\Database\Schema\Blueprint; use Illuminate\Support\Facades\Schema;
return new class extends Migration { public function up():void{Schema::create('attribute_values',function(Blueprint $t){$t->id('value_id');$t->foreignId('attribute_id')->constrained('attributes','attribute_id')->cascadeOnDelete();$t->string('value',50);$t->index('attribute_id');});} public function down():void{Schema::dropIfExists('attribute_values');}};
