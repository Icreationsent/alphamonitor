<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoolingUnitsTable extends Migration
{
    public function up()
    {
        Schema::create('pooling_units', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lga')->nullable();
            $table->string('ward')->nullable();
            $table->string('pu')->unique();
            $table->timestamps();
        });
    }
}
