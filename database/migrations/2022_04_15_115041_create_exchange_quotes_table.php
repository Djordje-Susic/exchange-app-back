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
        Schema::create('exchange_quotes', function (Blueprint $table) {
            $table->id();
            $table->string('key', 6)->unique();
            $table->string('base_currency_code', 3);
            $table->string('quote_currency_code', 3);
            $table->double('exchange_rate');
            $table->double('surcharge_percentage');
            $table->integer('discount_percentage')->default(0);
            $table->boolean('send_email')->default(0);
            $table->timestamps();

            $table->foreign('base_currency_code')->references('code')->on('currencies');
            $table->foreign('quote_currency_code')->references('code')->on('currencies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exchange_quotes');
    }
};
