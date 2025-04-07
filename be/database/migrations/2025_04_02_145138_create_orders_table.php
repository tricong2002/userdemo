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
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('address_id')->references('id')->on('addresses');
            $table->enum('payment_method', ['bank', 'momo', 'walet'])->default('walet');
            $table->enum('payment_status', ['pending', 'done'])->default('pending');
            $table->enum('status', ['pending', 'shipping', 'success', 'cancle'])->default('pending');
            $table->softDeletes();
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
