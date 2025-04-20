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
        Schema::create('indent_part_twos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('procurement_entry_id')->constrained()->onDelete('cascade');

            // 1. Cost Related
            $table->string('total_estimated_cost')->nullable();
            $table->string('basic_cost')->nullable();
            $table->string('packing_forwarding')->nullable();
            $table->string('custom_duty')->nullable();
            $table->string('gst_basic')->nullable();
            $table->string('transportation')->nullable();
            $table->string('installation')->nullable();
            $table->string('training')->nullable();
            $table->string('gst_f_g')->nullable();
            $table->string('other_charges')->nullable();

            // 2. Categories
            $table->string('item_category')->nullable();
            $table->string('technical_category')->nullable();
            $table->string('developmental_in_india')->nullable();

            // 3. GeM Info
            $table->string('gem_product_available')->nullable();
            $table->string('gem_additional_parameters')->nullable();
            $table->string('gem_report_upload')->nullable();

            // 4. Availability Lists
            $table->string('gem_list')->nullable();
            $table->string('mse_reserved_list')->nullable();
            $table->string('gte_exempted_list')->nullable();
            $table->string('mii_reserved_list')->nullable();

            // 5. Proprietary
            $table->string('is_proprietary')->nullable();

            // 6. Evaluation
            $table->string('evaluation_basis')->nullable();
            $table->string('bidder_qualification_criteria')->nullable();
            $table->string('financial_criteria_approval')->nullable();
            $table->string('bid_evaluation_criteria')->nullable();
            $table->string('acceptance_criteria')->nullable();

            // 7. Warranty
            $table->string('is_warranty')->nullable();
            $table->string('warranty_period')->nullable();
            $table->string('warranty_psd')->nullable();

            // 8. PDI
            $table->string('is_pdi')->nullable();

            // 9. Installation
            $table->string('installation_scope')->nullable();
            $table->string('site_ready')->nullable();

            // 10. Training
            $table->string('training_required')->nullable();
            $table->string('training_place')->nullable();
            $table->string('training_personnel')->nullable();
            $table->string('training_days')->nullable();

            // 11 to 18
            $table->string('mse_experience_exemption')->nullable();
            $table->string('mse_turnover_exemption')->nullable();
            $table->string('payment_terms')->nullable();
            $table->string('advance_milestone_details')->nullable();
            $table->string('pro_rata_details')->nullable();
            $table->string('is_for_rnd')->nullable();
            $table->string('is_imported')->nullable();
            $table->string('local_content_percent')->nullable();
            $table->string('project_validity')->nullable();
            $table->string('site_visit_approval')->nullable();
            $table->string('evaluation_time')->nullable();

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
        Schema::dropIfExists('indent_part_twos');
    }
};
