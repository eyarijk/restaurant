<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('table_id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->text('note')->nullable();
            $table->integer('total_price');
            $table->string('payment');
            $table->boolean('is_finished')->default(false);
            $table->dateTime('time');
            $table->timestamps();

            $table->foreign('table_id')->references('id')->on('tables')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
