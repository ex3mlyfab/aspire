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
        Schema::create('bed_model_histories', function (Blueprint $table) {
           
            $table->id();
            $table->string('bed_model_id');
            $table->ulid('patient_id');
            $table->dateTime('admitted');
            $table->dateTime('discharged')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bed_model_histories');
    }
};
