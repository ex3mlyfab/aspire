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
        Schema::create('clinics', function (Blueprint $table) {
            $table->id();
             $table->string('name');
            $table->string('code');
            $table->foreignUlid('department_id');
            $table->enum('clinic_type',['Primary','Secondary', 'Specialist', 'Emergency', 'Other']);
            $table->enum('status',['Active','Inactive'])->default('Active');
            $table->boolean('is_consult_charged')->default(false);
            $table->unsignedBigInteger('consult_charge')->nullable();
            $table->foreignUlid('created_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clinics');
    }
};
