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
        Schema::create('indent_part_threes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('procurement_entry_id')->constrained()->onDelete('cascade');

            $table->string('split_quantity')->nullable();
            $table->string('prebid_meeting')->nullable();
            $table->string('sample_required')->nullable();
            $table->string('fim_involved')->nullable();
            $table->string('fim_available')->nullable();
            $table->string('fim_description')->nullable();
            $table->string('fim_quantity')->nullable();
            $table->string('fim_value')->nullable();
            $table->string('fim_loss')->nullable();
            $table->string('fim_rejection_deduction')->nullable();
            $table->string('buy_back')->nullable();
            $table->string('post_supply_inspection')->nullable();
            $table->string('store_availability')->nullable();
            $table->string('request_to_dps')->nullable();

            // Indenting Officer
            $table->string('indenting_officer')->nullable();
            $table->string('indenting_unit')->nullable();
            $table->string('indenting_phone')->nullable();
            $table->string('indenting_email')->nullable();

            // Approving Authority
            $table->string('approving_authority')->nullable();
            $table->string('approving_phone')->nullable();
            $table->string('approving_email')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indent_part_threes');
    }
};
