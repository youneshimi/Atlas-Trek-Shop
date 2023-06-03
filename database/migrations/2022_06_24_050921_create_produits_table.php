<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->id('id');
            $table->string('titre');
            $table->longText('description');
            $table->decimal('prix')->default('0');
            $table->longText('image');
            $table->float('note')->default(0)->nullable();
            $table->tinyInteger('actif')->default(1);
            $table->timestamp('updated_at')->useCurrent()->on('update')->useCurrent();
            $table->timestamp('created_at')->useCurrent()->on('update')->useCurrent();
        });
    }

 
    public function down()
    {
        Schema::dropIfExists('produits');
    }
};
