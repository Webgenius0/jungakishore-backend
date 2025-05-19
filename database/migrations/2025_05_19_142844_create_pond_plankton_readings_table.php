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
        Schema::create('pond_plankton_readings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pond_plankton_id')->constrained()->onDelete('cascade');
            $table->foreignId('plankton_subcategory_id')->constrained()->onDelete('cascade');
            $table->string('value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pond_plankton_readings');
    }
};
