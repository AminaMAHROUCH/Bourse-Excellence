<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaniersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('be_paniers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("num_panier");
            $table->timestamp("date_creation") ; 
            $table->string("etat");
            $table->string("listes");
            $table->bigInteger("code");
            $table->string("status");
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
        Schema::dropIfExists('be_paniers');
    }
}