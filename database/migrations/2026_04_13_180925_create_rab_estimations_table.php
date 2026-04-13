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
        Schema::create('rab_estimations', function (Blueprint $table) {
            $table->id();
            $table->string('project_name')->nullable();
            $table->string('building_type')->nullable();
            $table->decimal('building_area', 12, 2)->nullable();
            $table->string('quality_level')->nullable();
            $table->string('location')->nullable();
            $table->json('data_breakdown'); // Stores the items, volumes, etc.
            $table->decimal('total_budget', 15, 2);
            $table->string('status')->default('saved');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rab_estimations');
    }
};
