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
        Schema::create('input_product_usages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('input_observation_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->decimal('quantity', 8, 2)->nullable();
            $table->foreignId('perameter_id')->nullable()->constrained()->onDelete('set null');
            $table->string('unit_perameter')->nullable(); // like 'g/kg', 'L/acre'
            $table->longText('comment')->nullable();
            $table->json('images')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('set null');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('input_product_usages');
    }
};
