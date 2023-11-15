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
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("deliveryMan_id");
            $table->foreign('deliveryMan_id')->references('id')->on('delivery_men')->cascadeOnDelete();
            $table->unsignedBigInteger("order_id");
            $table->foreign('order_id')->references('id')->on('orders')->cascadeOnDelete();
            $table->boolean('is_accepted')->default(false);
            $table->boolean('is_completed')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deliveries');
    }
};
