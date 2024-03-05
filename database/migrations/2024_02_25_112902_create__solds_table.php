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
        Schema::create('solds', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('property_id');
            $table->string('payment_method');
            $table->string('proof_payment');

            // FK
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solds');
    }
};
