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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('nick_name')->default('');
            $table->string('user_name')->default('');
            $table->string('phone')->default('');
            $table->string('address')->default('');
            $table->float('commission_upto_1000',11,2)->default(0.0);
            $table->float('commission_above_1000',11,2)->default(0.0);
            $table->enum('access_level',['from_all','ip_restricted'])->default('ip_restricted');
            // $table->tinyInteger('assigned_agents')->default(NULL);
            $table->string('mail_email')->default('');
            $table->string('mail_password')->default('');
            $table->tinyInteger('is_active')->default(1);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('added_by')->default(1);
            $table->integer('updated_by')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
