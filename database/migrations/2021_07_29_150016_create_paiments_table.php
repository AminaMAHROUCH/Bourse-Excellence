<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaimentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('be_paiments', function (Blueprint $table) {
            $table->id();
            $table->string('numero_panier');
            $table->date('date_creation')->nullable();
            $table->date('date_panier')->nullable();
            $table->string('compte_debiter')->default('-')->nullable();
            $table->string('intitule_compte')->default('-')->nullable();
            $table->string('numero_operation')->default('-')->nullable();
            $table->string('etat')->nullable();
            $table->string('demande');
            $table->string('total');
            $table->text('description')->nullable();
            $table->string('detail')->default('-')->nullable();
            $table->string('user_name')->default('-')->nullable();

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
        Schema::dropIfExists('paiments');
    }
}