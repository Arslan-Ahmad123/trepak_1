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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('pic');
            $table->string('fname');
            $table->string('lname');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role');
            $table->string('mobile');
            $table->string('engrcategoryid')->nullable();
            $table->string('education')->nullable();
            $table->string('university')->nullable();
            $table->string('degreedate')->nullable();
            $table->string('specialization')->nullable();
            $table->string('services')->nullable();
            $table->string('aboutme')->nullable();
            $table->integer('experience')->nullable();
            $table->integer('pricerange')->nullable();
            $table->string('company')->nullable();
            $table->integer('emailstatus')->default(0);
            $table->integer('emailcode')->nullable();
            $table->integer('latitude')->default(0);
            $table->integer('longitude')->default(0);
            $table->integer('status')->default(0);
            $table->integer('adminengr')->default(0);
            $table->string('address')->nullable();
            $table->string('subcity')->default(0);
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
