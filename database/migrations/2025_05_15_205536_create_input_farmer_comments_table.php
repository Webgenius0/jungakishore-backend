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
        Schema::create('input_farmer_comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('input_observation_id')->constrained()->onDelete('cascade');
            $table->text('pond_positive')->nullable();
            $table->text('pond_negative')->nullable();
            $table->longText('comment')->nullable();
            $table->json('images')->nullable();
            $table->defaultMeta();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('input_farmer_comments');
    }
};
