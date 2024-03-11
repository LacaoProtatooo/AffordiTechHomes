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
        Schema::create('properties', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('admin_id');
            $table->string('developer');
            $table->decimal('price', 12, 2);
            $table->string('address');
            $table->string('property_type');
            $table->string('description');
            $table->string('rooms');
            $table->integer('sqm');
            $table->string('cr');
            $table->string('block');
            $table->string('unit');
            $table->string('status');
            $table->longText('image_path')->nullable();
            $table->timestamps(); 

            // FK
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
