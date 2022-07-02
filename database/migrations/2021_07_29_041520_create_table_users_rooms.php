<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableUsersRooms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_id')->references('id')->on('rooms');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('loto_id')->references('id')->on('loto_cards');
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
        Schema::dropIfExists('rooms_users');
    }
}
