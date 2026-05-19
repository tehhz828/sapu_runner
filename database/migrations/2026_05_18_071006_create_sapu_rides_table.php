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
        Schema::create('sapu_rides', function (Blueprint $table) {
            $table->id();
            $table->foreignId('driver_id')->constrained('users')->onDelete('cascade');
            $table->string('origin');
            $table->string('destination');
            $table->dateTime('departure_time');
            $table->integer('seats_total');
            $table->integer('seats_available');
            $table->decimal('fare', 8, 2);
            $table->enum('status', ['open', 'full', 'ongoing', 'completed', 'cancelled'])->default('open');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sapu_rides');
    }
};
