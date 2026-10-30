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
        Schema::create('chart_of_accounts', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_account_id')->constrained('chart_of_accounts')->nullOnDelete();
            $table->string('code')->unique();
            $table->string('name');
            $table->string('type'); //asset, liability, equity, revenue,cogs, expense
            $table->string('normal_balance'); //debit, credit
            $table->boolean('is_postable')->default(true); //false = heading account, true = postable account
            $table->boolean('is_active')->default(true);
            $table->string('description')->nullable();
            $table->timestamps();
        });
        DB::statement("ALTER TABLE chart_of_accounts ADD CONSTRAINT coa_type_valid CHECK (type IN ('asset', 'liability', 'equity', 'revenue', 'cogs', 'expense'))");
        DB::statement("ALTER TABLE chart_of_accounts ADD CONSTRAINT coa_normal_balance_valid CHECK (normal_balance IN ('debit', 'credit'))");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chart_of_accounts');
    }
};
