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
        Schema::create('appointment_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('engrid');
            $table->integer('clientid');
            $table->date('meetingdate');
            $table->integer('bookingfee');
            $table->integer('consultingfee');
            $table->integer('tlprice');
            $table->string('paymentmethod');
            $table->integer('engrstatus')->default(0);
            $table->integer('clientstatus')->default(0);
            $table->timestamps();
            $table->foreign('engrid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointment_infos');
    }
};
