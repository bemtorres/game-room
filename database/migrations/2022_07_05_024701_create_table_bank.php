<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableBank extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

      Schema::create('bank_transactions', function (Blueprint $table) {
        $table->id();
        $table->foreignId('room_id')->references('id')->on('rooms');
        $table->foreignId('user_room_id')->references('id')->on('rooms_users');
        // $table->integer('user_room_id')->nullable(); //


        $table->integer('type')->nullable(); // IN - OUT
        $table->boolean('money_bank')->default(false); // dinero del banco

        $table->integer('transmitter_user_id')->nullable(); // emisor   - Que envia  [banco -1]
        $table->integer('receiver_user_id')->nullable();    // receptor - Que recibe [banco -1]

        $table->double('money', 15, 2)->default(0);

        $table->json('config')->nullable();
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
        Schema::dropIfExists('table_bank');
    }
}
