<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('patient_encounters', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('patient_id');
            $table->enum('encounter_type', ['emergency','first_visit','follow_up', 'laboratory_test', 'radiology_test', 'medication_refill','inpatient', 'surgery']);
            $table->foreignUlid('clinic_id')->nullable();
            $table->foreignUlid('doctor_id')->nullable();
            $table->string('presentation')->nullable();
            $table->date('encounter_date')->nullable();
            $table->enum('status',['archive','pending', 'in_clinic', 'completed', 'cancelled', 'admission'])->default('pending'); // pending, completed, cancelled
            $table->date('completed_date')->nullable();
            $table->string('remarks')->nullable();
            $table->foreignUlid('revenue_id')->nullable();
            $table->foreignUlid('created_by');
  

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_encounters');
    }
};
