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
        Schema::create('biomass_growths', function (Blueprint $table) {
            $table->id();
            $table->foreignId('biomass_observation_id')->constrained()->onDelete('cascade');
            $table->observationFields();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biomass_growths');
    }
};
