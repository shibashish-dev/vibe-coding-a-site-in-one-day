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
        Schema::create('pac_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('procurement_entry_id')->constrained()->onDelete('cascade');

            $table->string('indent_no')->nullable();
            $table->string('indent_date')->nullable();
            $table->string('manufacturer')->nullable();
            $table->string('model')->nullable();
            $table->text('justification')->nullable();

            // Indenting Officer
            $table->string('indenting_officer')->nullable();

            // Approving Authority
            $table->string('approving_designation')->nullable();

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pac_entries');
    }
};
