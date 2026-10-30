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
        Schema::create('production_material_usages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('production_order_id')->constrained('production_orders')->unique();
            $table->foreignId('material_id')->constrained('materials')->unique();
            $table->decimal('planned_quantity');
            $table->decimal('actual_quantity');
            $table->decimal('unit_cost', 15, 2);
            $table->timestamps();
        });
        DB::statement('ALTER TABLE production_material_usages ADD CONSTRAINT usage_qty_non_negative CHECK (planned_quantity >= 0 AND actual_quantity >= 0)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('production_material_usages');
    }
};
