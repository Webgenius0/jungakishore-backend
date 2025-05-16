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
        Schema::create('parameters', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['water', 'soil', 'microbe', 'fish', 'other']);
            $table->string('name')->nullable();
            $table->string('short_name')->nullable();
            $table->string('unit')->nullable();
            $table->boolean('is_default')->default(false);
            $table->string('short_code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parameters');
    }
};
