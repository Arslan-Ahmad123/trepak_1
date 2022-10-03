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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->integer('clientid');
            $table->unsignedBigInteger('engrid');
            $table->integer('service');
            $table->integer('response');
            $table->string('comment');
            $table->string('replies')->nullable(); 
            $table->date('repliesdate')->nullable(); 
            $table->integer('engrstatus')->default(0); 
            $table->foreign('engrid')->references('id')->on('users'); 
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
        Schema::dropIfExists('comments');
    }
};
