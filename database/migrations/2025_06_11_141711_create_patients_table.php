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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->ulid('id')->primary();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('phone');
            $table->string('address');
            $table->string('city');
            $table->string('country');
            $table->string('state_of_origin');
            $table->string('state_of_residence');
            $table->string('religion');
            $table->string('tribe');
            $table->string('occupation')->nullable();
            $table->string('marital_status');
            $table->string('nationality')->nullable();
            $table->string('next_of_kin');
            $table->string('next_of_kin_phone');
            $table->string('next_of_kin_address');
            $table->string('next_of_kin_city');
            $table->string('hospital_id')->unique('hospital_id');           
            $table->string('next_of_kin_relationship');
            $table->string('next_of_kin_email')->nullable();
            $table->enum('gender',['male','female']);
            $table->date('date_of_birth');
            $table->string('blood_group')->nullable();      
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignUlid('created_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
