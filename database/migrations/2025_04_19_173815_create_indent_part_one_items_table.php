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
        Schema::create('indent_part_one_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('indent_part_one_form_id')->constrained()->onDelete('cascade');

            $table->text('description')->nullable();
            $table->string('quantity')->nullable();
            $table->string('unit')->nullable();
            $table->decimal('estimated_cost', 15, 2)->nullable();

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indent_part_one_items');
    }
};
