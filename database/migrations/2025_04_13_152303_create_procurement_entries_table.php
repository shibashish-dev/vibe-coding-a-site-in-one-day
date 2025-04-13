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
        Schema::create('procurement_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('procurement_users')->onDelete('cascade');
            $table->foreignId('section_id')->constrained()->onDelete('cascade');
            $table->foreignId('procurement_type_id')->constrained()->onDelete('cascade');

            $table->string('email')->nullable();
            $table->string('telephone')->nullable();

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('procurement_entries');
    }
};
