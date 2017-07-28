<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('charity');
            $table->decimal('amount', 12, 2);
            $table->enum('currency', array('USD', 'EUR', 'GBP', 'INR', 'AUD', 'CAD', 'ZAR', 'NZD', 'JPY', 'CHF', 'SEK', 'NOK', 'HKD'));
            $table->integer('user_id')->unsigned();
            $table->date('date');
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
