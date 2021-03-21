<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Donations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donations', function(Blueprint $table){
            $table->id();
            $table->string('firstName')->nullable();
            $table->string('lastName')->nullable();
            $table->string('email');
            $table->string('phone')->nullable();
            $table->char('gender', 1)->nullable();
            $table->date('birthday')->nullable();
            $table->tinyInteger('canBeContacted');
            $table->char('donationType');
            $table->integer('donationAmount');
            $table->string('donationCurrency');
            $table->string('donationProject');
            $table->tinyInteger('isDedication');
            $table->char('dedicationType', 1)->nullable();
            $table->string('dedicationFirstName')->nullable();
            $table->string('dedicationLastName')->nullable();
            $table->string('receiverEmail')->nullable();
            $table->string('receiverFirstName')->nullable();
            $table->string('receiverLastName')->nullable();
            $table->string('donationId');
            $table->string('donationStatus');
            
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
        Schema::dropIfExists('donations');
    }
}
