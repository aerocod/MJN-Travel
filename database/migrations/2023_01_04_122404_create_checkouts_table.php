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
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id");
            $table->foreignId("destination_id");
            $table->date("date_of_booking");
            $table->integer("quantity");
            $table->integer("price_per_person");
            $table->integer("total");
            $table->string('card_number',20);
            $table->date('expired');
            $table->string('cvc', 3);
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
        Schema::dropIfExists('checkouts');
    }
};
