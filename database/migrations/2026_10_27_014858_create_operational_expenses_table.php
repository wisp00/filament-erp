<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('operational_expenses', function (Blueprint $table) {
            $table->id();
            $table->date('expense_date')->index();
            $table->foreignId('account_id')->constrained('chart_of_accounts');
            $table->foreignId('payment_account_id')->constrained('payment_accounts');
            $table->decimal('amount', 15, 2);
            $table->string('description')->nullable();
            $table->string('receipt_path')->nullable();
            $table->foreignId('employee_id')->nullable()->constrained('employees')->nullOnDelete();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete(); //creted by
            $table->timestamps();
        });
        DB::statement('ALTER TABLE operational_expenses ADD CONSTRAINT expense_amount_posistive CHECK (AMOUNT > 0 )');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operational_expenses');
    }
};
