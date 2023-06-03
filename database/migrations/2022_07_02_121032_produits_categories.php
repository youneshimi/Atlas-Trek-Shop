<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up()
    {
        Schema::create('produits_categories', function (Blueprint $table) {
            $table->unsignedBigInteger('prod_id');
            $table->foreign('prod_id')->references('id')->on('produits')->onDelete('cascade');
            $table->unsignedBigInteger('categorie_id');
            $table->foreign('categorie_id')->references('id_cat')->on('categories')->onDelete('cascade');;
        });
    }

 
    public function down()
    {
        Schema::dropIfExists('produits_categories');
    }
};
