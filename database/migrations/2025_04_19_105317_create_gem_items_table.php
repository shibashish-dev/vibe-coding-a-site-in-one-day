<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('gem_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gem_entry_id')->constrained('gem_entries')->onDelete('cascade');
            $table->text('description')->nullable();
            $table->string('gem_id')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('unit')->nullable();
            $table->decimal('amount', 12, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gem_items');
    }
};
