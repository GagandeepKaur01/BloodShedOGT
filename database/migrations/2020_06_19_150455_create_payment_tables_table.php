<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_tables', function (Blueprint $table) {
            $table->id();
            $table->string('event_id');
            $table->string('user_email');
            $table->string('order_id')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('payment_status')->default('0');
            $table->string('price')->nullable();
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
        Schema::dropIfExists('payment_tables');
    }
}
