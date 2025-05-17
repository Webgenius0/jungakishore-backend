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
        Schema::create('input_product_usage_readings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('input_remarks_and_rx_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->nullable()->constrained()->nullOnDelete();
            $table->string('product_name')->nullable();
            $table->decimal('quantity', 8, 2)->nullable();
            $table->string('unit')->nullable(); // e.g., 'g/kg', 'L/acre'
            $table->boolean('applied_or_not')->default(false);
            $table->enum('type', ['commercial', 'trial'])->default('commercial');
            $table->string('time')->nullable(); // e.g., '1hr', '2day'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('input_product_usage_readings');
    }
};
