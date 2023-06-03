<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id('id_cat');
            $table->longText('label');
            $table->tinyInteger('actif')->default(1);
        });
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
