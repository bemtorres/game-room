<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableClaim extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('claim', function (Blueprint $table) {
            $table->id();
            $table->foreignId('claim_user_id')->references('id')->on('users');
            $table->integer('validated_user_id')->nullable();
            $table->foreignId('loto_id')->references('id')->on('loto_cards');
            $table->foreignId('room_id')->references('id')->on('rooms');
            $table->foreignId('room_user_id')->references('id')->on('rooms_users');
            $table->integer('status')->default(1);
            $table->integer('position')->nullable();
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
        Schema::dropIfExists('claim');
    }
}
