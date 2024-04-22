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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title',512);
            $table->integer('category_id');
            $table->string('link',512);
            $table->string('start_time',255);
            $table->string('speed_per_day',255);
            $table->string('average_time',255);
            $table->string('refill',255);
            $table->text('description');
            $table->float('price',11,2);
            $table->enum('status',['active','inactive'])->default('active');
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
        Schema::dropIfExists('services');
    }
};
