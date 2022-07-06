<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntermediairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('be_intermediaires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("nom_prenom");
            $table->string("cni") ; 
            $table->integer("rib");
            $table->double("montant")->nullable()->default("0");
            $table->string("annee_bourse");
            $table->timestamps();
        });
    }
 
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('be_intermediaires');
    }
}