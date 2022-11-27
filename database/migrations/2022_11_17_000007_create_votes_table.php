<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotesTable extends Migration
{
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lga');
            $table->string('ward');
            $table->string('pooling_unit');
            $table->string('agent');
            $table->string('phone');
            $table->string('party');
            $table->integer('number_of_votes');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
