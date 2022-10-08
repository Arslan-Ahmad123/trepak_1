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
        Schema::create('one_chats', function (Blueprint $table) {
            $table->id();
           
            $table->unsignedBigInteger('clientid');
            $table->integer('engrid');
            $table->integer('senderid');
            $table->integer('reciverid');
            $table->string('message');
            $table->timestamps();
            $table->foreign('clientid')->references('id')->on('users'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('one_chats');
    }
};
