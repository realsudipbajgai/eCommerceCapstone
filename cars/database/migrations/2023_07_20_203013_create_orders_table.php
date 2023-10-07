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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            //$table->unsignedBigInteger('payment_id');
            $table->string('name');
            $table->string('street');
            $table->string('city');
            $table->string('province_state');
            $table->string('country');
            $table->string('postal_code');
            $table->decimal('sub_total', 9, 2);
            $table->decimal('shipping_cost', 9, 2);
            $table->decimal('gst', 9, 2);
            $table->decimal('pst', 9, 2);
            $table->decimal('total', 9, 2);
            $table->decimal('promote_discount', 9, 2)->default(0);
            $table->enum('order_status', array('Pending', 'Confirmed','Shipped','Delivered'));	
            $table->boolean('is_deleted')->default(false);
            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('users');
            //$table->foreign('payment_id')->references('id')->on('payments');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
