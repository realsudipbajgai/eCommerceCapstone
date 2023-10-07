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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('brand_id');
            $table->string('make');
            $table->string('model');
            $table->integer('year');
            $table->decimal('price',9,2);
            $table->double('mileage', 10, 2);	
            $table->string('color');
            $table->string('fuel_type');
            $table->text('description');
            $table->string('image');
            $table->boolean('is_deleted')->default(false);
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('brand_id')->references('id')->on('brands');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
