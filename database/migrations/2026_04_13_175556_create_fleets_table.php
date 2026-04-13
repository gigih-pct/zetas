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
        Schema::create('fleets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('serial_plate')->unique();
            $table->string('type'); // e.g., Heavy Equipment, Logistics
            $table->string('location'); // e.g., Site C3, Bekasi Hub
            $table->string('status'); // e.g., Operational, Maintenance, Off-Hire
            $table->decimal('usage_value', 10, 1); // e.g., 10200.5
            $table->string('usage_unit'); // e.g., Hours, KM
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fleets');
    }
};
