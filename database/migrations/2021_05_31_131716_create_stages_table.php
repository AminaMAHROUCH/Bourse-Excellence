<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('be_stages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->date('debut');
            $table->date('fin');
            $table->string('cne');
            $table->string('cni');
            $table->string('ville');
            $table->longText('explication')->nullable();
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
        Schema::dropIfExists('stages');
    }
}