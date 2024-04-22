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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->integer('service_id');
            $table->string('order_date',32);
            $table->enum('order_status',['complete','pending','rejected','fake'])->default('pending');
            $table->integer('quantity');
            $table->integer('unit_price');
            $table->float('total_amount',11,2);
            $table->string('payment_method',132);
            $table->text('special_instructions');
            $table->integer('added_by')->unsigned();
            $table->integer('updated_by')->unsigned();
            $table->timestamps();
            $table->softDeletes();
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
};
