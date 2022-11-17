<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPartiesTable extends Migration
{
    public function up()
    {
        Schema::table('parties', function (Blueprint $table) {
            $table->unsignedBigInteger('party_id')->nullable();
            $table->foreign('party_id', 'party_fk_7634791')->references('id')->on('votes');
        });
    }
}
