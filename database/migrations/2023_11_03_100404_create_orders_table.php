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
            $table->unsignedBigInteger('consumer_id');
            $table->foreign('consumer_id')->references('user_id')->on('consumers');
            $table->unsignedBigInteger('artisan_id');
            $table->foreign('artisan_id')->references('user_id')->on('artisans')->cascadeOnDelete();
            $table->string('adresse');
            $table->string('wilaya');
            $table->string('num_telephone');
            $table->string('email');
            $table->string('status');
            $table->timestamps();
        });

        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders')->cascadeOnDelete();
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->cascadeOnDelete();
            $table->integer('quantity');
            $table->integer('prix_total');
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
