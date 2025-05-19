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
        Schema::create('pond_soils', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pond_observation_id')->constrained()->onDelete('cascade');
            $table->text('comment')->nullable();
            $table->json('images')->nullable();
            $table->defaultMeta();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pond_soils');
    }
};
