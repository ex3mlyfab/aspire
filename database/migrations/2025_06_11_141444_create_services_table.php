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
        Schema::create('services', function (Blueprint $table) {
             $table->id();
            $table->string('name');
            $table->string('code');
            $table->foreignUlid('department_id');
            $table->foreignUlid('account_head_id');
            $table->enum('service_type',['Procedure','Consultation','Others']);
            $table->string('unit_duration')->nullable();
            $table->enum('coverage_type', ['not_applicable','capitated', 'claims']);
            $table->enum('unit',['Hour','Day','Week','Month','Year', 'End of Day', 'N/A'])->default('N/A');
            $table->foreignUlid('created_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
