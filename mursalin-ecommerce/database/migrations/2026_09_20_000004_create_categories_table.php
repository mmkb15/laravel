<?php
use Illuminate\Database\Migrations\Migration; use Illuminate\Database\Schema\Blueprint; use Illuminate\Support\Facades\Schema;
return new class extends Migration { public function up():void{Schema::create('categories',function(Blueprint $t){$t->id('category_id');$t->foreignId('parent_id')->nullable()->constrained('categories','category_id')->nullOnDelete();$t->string('name',100);$t->string('slug',150)->unique();$t->text('description')->nullable();});} public function down():void{Schema::dropIfExists('categories');}};
