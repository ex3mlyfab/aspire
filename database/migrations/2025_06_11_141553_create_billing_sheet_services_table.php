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
        Schema::create('billing_sheet_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('billing_sheet_id');
            $table->morphs('serviceable');
            $table->integer('patient_percentage');
            $table->integer('company_percentage');
            $table->double('price', 20,2);
            $table->integer('status')->default(1);
            $table->double('patient_pays', 20,2);
            $table->double('company_pays', 20,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('billing_sheet_services');
    }
};
