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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payer_id')->constrained('users')->onDelete('cascade');
            $table->enum('ref_type', ['ride_booking','delivery_order']);
            $table->unsignedBigInteger('ref_id');
            $table->decimal('amount', 8, 2);
            $table->enum('method', ['cash','online'])->default('cash');
            $table->enum('status', ['pending','paid','refunded'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
