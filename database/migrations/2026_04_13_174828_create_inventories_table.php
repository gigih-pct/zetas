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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category'); // e.g., Binder, Structure, Agregat
            $table->integer('stock');
            $table->string('unit'); // e.g., Zak, Btg, m3
            $table->string('status'); // e.g., Stable, Low, Critical, Incoming
            $table->decimal('unit_price', 15, 2); // for valuation
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
