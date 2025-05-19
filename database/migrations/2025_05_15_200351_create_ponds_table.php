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
        Schema::create('ponds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('enter_prise_id')->nullable()->constrained('enterprises')->onDelete('set null');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('size')->nullable(); // e.g., "1 acre", "5000 sqft"
            $table->json('images')->nullable(); // Storing multiple image paths
            $table->string('location')->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->defaultMeta();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ponds');
    }
};
