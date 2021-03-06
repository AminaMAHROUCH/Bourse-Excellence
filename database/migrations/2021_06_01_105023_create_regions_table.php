<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegionsTable extends Migration
{
    public function up()
    {
        Schema::create('be_regions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom_region');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}