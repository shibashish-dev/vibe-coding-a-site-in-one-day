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
        Schema::create('vec_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('procurement_entry_id')->constrained()->onDelete('cascade');

            $table->string('description')->nullable(); // A
            $table->string('functional_requirement')->nullable(); // B

            // D–M Fields
            $table->string('equipment_cost')->nullable();
            $table->string('nature_item_maintenance')->nullable();
            $table->string('nature_item_consumables')->nullable();
            $table->string('nature_item_origin')->nullable();
            $table->string('additional_info')->nullable();
            $table->string('quantity_other_hwps')->nullable();
            $table->string('min_max_stock')->nullable();
            $table->string('indented_qty_and_efforts')->nullable();
            $table->string('expected_delivery')->nullable();
            $table->string('usage_period')->nullable();
            $table->string('prev_supplier')->nullable();
            $table->string('prev_cost_year')->nullable();
            $table->string('prev_qty')->nullable();
            $table->string('supplier_suggestion')->nullable();
            $table->string('cost_justification')->nullable();
            $table->string('budget_provision')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vec_entries');
    }
};
