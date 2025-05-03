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
        Schema::create('gem_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('procurement_entry_id')->constrained()->onDelete('cascade');
            $table->string('section')->nullable();
            $table->string('indent_no')->nullable();
            $table->string('date')->nullable();
            $table->string('officer_name')->nullable();
            $table->string('designation')->nullable();
            $table->string('budget_head')->nullable();
            $table->string('indenting_officer')->nullable();
            $table->string('section_head')->nullable();
            $table->string('manager')->nullable();
            $table->string('OSD')->nullable();
            $table->string('gem_approval')->nullable();

            // Payment Approval
            $table->string('gem_contract_date')->nullable();
            $table->string('due_delivery_date')->nullable();
            $table->string('receipt_date')->nullable();
            $table->string('delivery_date_extension')->nullable();
            $table->boolean('with_ld')->default(false);
            $table->boolean('without_ld')->default(false);
            $table->text('delivery_extension_justification')->nullable();
            $table->string('crac_date')->nullable();
            $table->text('inspection_remarks')->nullable();
            $table->text('other_remarks')->nullable();
            $table->string('pao_aao')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gem_entries');
    }
};
