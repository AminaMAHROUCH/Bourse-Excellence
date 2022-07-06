<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvincesTable extends Migration
{
    public function up()
    {
        Schema::create('be_provinces', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom_province');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}