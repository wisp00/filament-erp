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
        Schema::create('production_tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('production_order_id')->constrained('production_orders')->cascadeOnDelete();
            $table->foreignId('employee_id')->constrained('employees');
            $table->string('task_type'); //cutting, sewing, finishing
            $table->integer('quantity');
            $table->decimal('rate', 15, 2);
            $table->decimal('total_amount', 15, 2);
            $table->date('task_date');
            $table->foreignId('payroll_id')->nullable()->constrained('payrolls')->nullOnDelete();
            $table->timestamps();
        });
        DB::statement('ALTER TABLE production_tasks ADD CONSTRAINT tasnk_valid CHECK (quantity >= 0 AND rate >= 0 AND total_amount >=0)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('production_tasks');
    }
};
