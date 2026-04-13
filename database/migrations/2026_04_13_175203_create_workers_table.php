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
        Schema::create('workers', function (Blueprint $table) {
            $table->id();
            $table->string('registration_id')->unique(); // ZT-OP-XXX
            $table->string('name');
            $table->string('position'); // e.g., Mandor Utama, Site Engineer
            $table->string('security_level'); // e.g., Level 4 Security
            $table->string('sector'); // e.g., Jakarta, BSD, Bekasi
            $table->integer('efficiency'); // 1-100
            $table->string('contact')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workers');
    }
};
