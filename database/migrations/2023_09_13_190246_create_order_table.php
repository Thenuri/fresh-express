<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger("cart_id");
            $table->foreign('cart_id')->references('id')->on('carts');
            $table->decimal('total', 8, 2);
            $table->string('status')->default('pending');
            $table->string('order_number')->unique();
            $table->text('delivery_address');
            $table->string('ZIP_code');
            $table->string('city');
            $table->string('delivery_type');
            $table->timestamps();
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