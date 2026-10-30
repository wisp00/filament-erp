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
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees');
            $table->char('period', 7)->unique();//YYYY-MM
            $table->date('payment_date');
            $table->decimal('base_salary', 15, 2)->default(0);
            $table->decimal('production_wages', 15, 2)->default(0);
            $table->decimal('bonus', 15, 2)->default(0);
            $table->decimal('deductions', 15, 2)->default(0);
            $table->decimal('total_paid', 15, 2)->default(0);
            $table->string('payment_method'); //cash, bank_transfer, credit_card, etc.
            $table->foreignId('payment_account_id')->constrained('payment_accounts');
            $table->string('description')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete(); //created by
            $table->timestamps();
        });
        DB::statement('ALTER TABLE payrolls ADD CONSTRAINT payroll_total_consistent CHECK (total_paid = base_salary + production_wages + bonus - deductions)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payrolls');
    }
};
