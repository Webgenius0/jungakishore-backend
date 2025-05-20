<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fish_readings', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['stock', 'growth', 'harvest', 'transfer', 'mortality']);
            $table->unsignedBigInteger('related_id'); // ID from respective biomass_* table
            $table->foreignId('parameter_id')->nullable()->constrained()->onDelete('set null');
            $table->integer('quantity')->nullable();
            $table->decimal('average_weight_g', 8, 2)->nullable();
            $table->decimal('total_weight_kg', 8, 2)->nullable();
            $table->timestamps();

            // Optional index for fast lookup
            $table->index(['type', 'related_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fish_readings');
    }
};
