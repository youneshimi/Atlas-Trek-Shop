<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->text('password')->nullable();
            $table->text('pinCode')->nullable();
            $table->text('confirmation_token')->nullable();
            $table->enum('confirmation_object' , ['','SIGNUP_WAITING_EMAIL_VALIDATION','NEW_EMAIL_WAITING_VALIDATION','PASSWORD_CHANGE'])->nullable();
            $table->enum('gender',['HOMME','FEMME','AUTRE'])->nullable();
            $table->enum('etat_compte',['SIGNUP_SOCIAL_WAITING_IDENTITY_VALIDATION','SIGNUP_WAITING_EMAIL_VALIDATION','SIGNUP_WAITING_CGU_VALIDATION','SIGNUP_WAITING_STEP_PACK','SIGNUP_WAITING_STEP_PAYMENT','SIGNUP_WAITING_STEP_CF','SIGNUP_WAITING_STEP_PARTNER_LOGIN','SIGNUP_WAITING_STEP_IMPORT_PASSWORD','ACCOUNT_BANNED','ACCOUNT_ACTIVATED','ACCOUNT_CANCELED','ACCOUNT_DEACTIVATED','ACCOUNT_DELETED'])->default('SIGNUP_WAITING_EMAIL_VALIDATION');
            $table->dateTime('date_derniere_connexion')->nullable();
            $table->enum('profil', ['admin','abonne','client'])->default('abonne');
            $table->enum('type_identification', ['ADL','SOCIAL'])->default('ADL');
            $table->tinyInteger('actif')->default(1);
            $table->date('date_naissance')->nullable();
            $table->string('username')->nullable();
            $table->string('numero_telephone')->nullable();
            $table->string('address')->nullable();
            $table->string('zipCode')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('photo')->default('/img/avatar.png');
            $table->string('last_email')->nullable();
            $table->string('remember_token')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->on('update')->useCurrent();
            $table->integer('seuilId')->nullable();
            $table->integer('parrainId')->nullable();
            $table->enum('etat_relance', ['RELANCE','INSCRIT','REFUSE'])->nullable();
            $table->integer('nombre_relance')->default(0);
            $table->text('refused_token')->nullable();
            $table->date('date_last_relance')->nullable();
            $table->timestamp('deleted_at')->nullable();
        
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
