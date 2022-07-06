<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeExceptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('be_exceptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom_prenom');
            $table->string('cne');
            $table->string('cni');
            $table->string('universite')->nullable();
            $table->string('annee_universitaire')->nullable();
            $table->string('ecole')->nullable(); 
            $table->string('filiere')->nullable();
            $table->string('nbre_exception')->nullable();
            $table->string('status')->nullable(); 
            $table->string('boursier')->nullable();
            $table->string('promotion')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('be_exceptions');
    }
}