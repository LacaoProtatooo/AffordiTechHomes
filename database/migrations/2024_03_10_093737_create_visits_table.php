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
        Schema::create('visits', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->dateTime('schedule');
            $table->string('convoy_type');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('agent_id');
            $table->unsignedBigInteger('property_id');
            $table->string('approval_status');

            // FK
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('agent_id')->references('id')->on('agents')->onDelete('cascade');
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visits');
    }
};
