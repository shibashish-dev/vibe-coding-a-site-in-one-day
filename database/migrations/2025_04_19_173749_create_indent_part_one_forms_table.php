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
        Schema::create('indent_part_one_forms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('procurement_entry_id')->constrained()->onDelete('cascade');
            $table->string('user_unit')->nullable();
            $table->string('indent_type')->nullable();
            $table->string('desired_delivery')->nullable();

            $table->string('indenting_officer')->nullable();
            $table->string('designation')->nullable();
            $table->string('group_division_section')->nullable();
            $table->string('email_contact')->nullable();
            $table->string('place_of_delivery')->nullable();

            $table->string('approving_authority_name')->nullable();
            $table->string('approving_authority_designation')->nullable();
            $table->string('approving_authority_section')->nullable();
            $table->string('approving_authority_email')->nullable();
            $table->text('declaration_text')->nullable();

            $table->string('total_estimated_cost_words')->nullable();
            $table->string('classification')->nullable();
            $table->string('previous_purchase_ref')->nullable();
            $table->string('financial_sanction')->nullable();
            $table->string('budget_head')->nullable();
            $table->text('other_info')->nullable();
            $table->string('proposed_vendors')->nullable();

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indent_part_one_forms');
    }
};
