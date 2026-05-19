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
        Schema::create('delivery_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constarained('users')->onDelete('cascade');
            $table->foreignId('runner_id')->nullable()->constarained('users')->onDelete('set null');
            $table->string('pickup_location');
            $table->string('dropoff_location');
            $table->text('item_description');
            $table->decimal('delivery_fee', 8, 2);
            $table->enum('status', ['open', 'accepted', 'picked_up', 'on_the_way', 'delivered', 'cancelled'])->default('open');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_orders');
    }
};
