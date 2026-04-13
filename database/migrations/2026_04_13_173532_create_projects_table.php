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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('sector');
            $table->string('node_id');
            $table->integer('progress')->default(0);
            $table->string('status');
            $table->string('priority');
            $table->string('milestone_name')->nullable();
            $table->date('milestone_date')->nullable();
            $table->string('milestone_status')->nullable();
            $table->integer('team_size')->default(0);
            $table->boolean('is_highlighted')->default(false); // To handle the dark/creative styling
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
