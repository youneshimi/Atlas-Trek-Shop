<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id('id_comm');
            $table->longText('contenu');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('product_id');
            $table->integer('note')->default(0);
            $table->foreign('product_id')->references('id')->on('produits')->onDelete('cascade');
            $table->timestamp('updated_at')->useCurrent()->on('update')->useCurrent();
            $table->timestamp('created_at')->useCurrent()->on('update')->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
