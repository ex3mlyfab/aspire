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
        Schema::create('revenues', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->nullableMorphs('revenueable');
            $table->string('description')->nullable();
            $table->double('amount_paid', 40,2);
            $table->foreignUlid('created_by');
            $table->enum('status', ['paid', 'unpaid', 'Credit', 'Waived', 'Reversed', 'Partial-Pay'])->default('unpaid');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('revenues');
    }
};
