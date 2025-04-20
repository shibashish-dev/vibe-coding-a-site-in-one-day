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
        Schema::create('vec_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vec_entry_id')->constrained('vec_entries')->onDelete('cascade');

            $table->string('description')->nullable();
            $table->string('unit')->nullable();
            $table->string('qty_installed')->nullable();
            $table->string('consumption_rate')->nullable();
            $table->string('stock_position')->nullable();
            $table->string('qty_pipeline')->nullable();
            $table->string('indented_qty')->nullable();

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vec_items');
    }
};
