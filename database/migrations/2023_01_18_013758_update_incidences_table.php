<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('incidences', function($table) {
            $table->string('name');
            $table->string('phone');
            $table->string('lga');
            $table->string('ward');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('incidences', function($table) {
            $table->string('name');
            $table->string('phone');
            $table->string('lga');
            $table->string('ward');
        });
    }
};
