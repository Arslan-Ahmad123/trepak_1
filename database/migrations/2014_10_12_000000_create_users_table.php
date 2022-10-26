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
            $table->string('lname')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role')->nullable();
            $table->string('mobile')->nullable();
            $table->string('engrcategoryid')->nullable();
            $table->string('cv')->nullable();
            $table->string('workplacetype')->nullable();
            $table->string('jobtype')->nullable();
            $table->string('about')->nullable();
            $table->integer('emailcode')->nullable();
            $table->integer('emailstatus')->default(0);       
            $table->integer('docsstatus')->default(0);       
            $table->integer('status')->default(0);
            $table->integer('adminengr')->default(0);
            $table->integer('latitude')->default(0);
            $table->integer('longitude')->default(0);
            $table->string('address')->nullable();
            $table->string('subcity')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('short_country')->nullable();
            $table->integer('signupoption')->default(0);
            $table->string('salary')->nullable();
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
