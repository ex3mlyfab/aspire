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
        Schema::create('wallets', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('patient_id');
            $table->string('description');
            $table->decimal('amount', 20, 2);
            $table->enum('type', ['credit', 'debit']); // 'credit' for income, 'debit' for expenses
            $table->enum('status', ['pending', 'approved', 'rejected','reversed'])->default('pending'); // 'pending', 'approved', or 'rejected
            $table->decimal('balance', 20, 2);
            $table->foreignUlid('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wallets');
    }
};
