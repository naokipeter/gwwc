<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('amount', 12, 2);
            $table->enum('currency', array('USD', 'EUR', 'GBP', 'INR', 'AUD', 'CAD', 'ZAR', 'NZD', 'JPY', 'CHF', 'SEK', 'NOK', 'HKD'));
            $table->integer('year');
            $table->integer('percentage_pledged');
            $table->integer('user_id')->unsigned();
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
        Schema::dropIfExists('incomes');
    }
}
