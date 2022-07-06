<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReclamationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('be_reclamations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('objet')->nullable();
            $table->longText('contenu')->nullable(); 
            $table->datetime('publier')->nullable();
            $table->string('cne');
            $table->string('cni'); 
            $table->string("status")->default('مفتوحة') ;
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
        Schema::dropIfExists('reclamations');
    }
}