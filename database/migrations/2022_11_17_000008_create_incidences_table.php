<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidencesTable extends Migration
{
    public function up()
    {
        Schema::create('incidences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('subject');
            $table->longText('observations');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
