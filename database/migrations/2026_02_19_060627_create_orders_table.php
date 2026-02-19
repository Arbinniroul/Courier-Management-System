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
            $table->string('order_number')->unique();
            $table->foreignId('customer_id')->constrained();
            $table->string('pickup_address');
            $table->string('delivery_address');
            $table->enum('status',['pending','assigned','in_transit','delivered','cancelled'])->default('pending');
            $table->text('description')->nullable();
            $table->decimal('weight',8,2)->nullable();
            $table->text('special_instructions');
            $table->timestamp('scheduled_pickup')->nullable();
            $table->timestamp('scheduled_delivery')->nullable();
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
