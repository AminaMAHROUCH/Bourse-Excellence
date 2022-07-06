<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRenouvellementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('be_renouvellements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom_prenom');
            $table->string('cne');
            $table->string('cni');
            $table->string('universite')->nullable();
            $table->string('ecole')->nullable();
            $table->string('attestation')->nullable();
            $table->string('anneUniversitaire')->nullable(); // 
            $table->string('attestation_reinscription')->nullable();
            $table->longText('justification')->nullable();
            $table->integer('numero_compte')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('renouvellements');
    }
}