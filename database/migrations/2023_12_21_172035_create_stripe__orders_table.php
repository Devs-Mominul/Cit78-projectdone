<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stripe__orders', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->string('fname');
            $table->string('lname')->nullable();
            $table->integer('country');
            $table->integer('city');
            $table->integer('zip');
            $table->string('company')->nullable();
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('message')->nullable();
            $table->integer('ship_check')->nullable();


            $table->string('ship_fname');
            $table->string('ship_lname')->nullable();
            $table->integer('ship_country');
            $table->integer('ship_city');
            $table->integer('ship_zip');
            $table->string('ship_company')->nullable();
            $table->string('ship_email');
            $table->string('ship_phone');
            $table->string('ship_address');
            $table->integer('charge');
            $table->integer('discount');

            $table->integer('total');
            $table->integer('sub_total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stripe__orders');
    }
};
