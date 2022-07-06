<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableRooms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->string('name');
            $table->string('url')->nullable();
            $table->string('password')->nullable();
            $table->string('description')->nullable();
            $table->integer('price')->nullable();
            $table->integer('type')->default(1);
            $table->integer('cont_users')->default(0);
            $table->integer('status')->default(1);
            $table->json('config')->nullable();
            $table->boolean('visible')->default(true);
            $table->boolean('active')->default(true);

            $table->double('banker_money', 15, 2)->nullable(); //dinero del banco

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
        Schema::dropIfExists('rooms');
    }
}
