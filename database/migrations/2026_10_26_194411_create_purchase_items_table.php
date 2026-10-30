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
        Schema::create('purchase_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('purchase_id')->constrained('purchases')->cascadeOnDelete();
            $table->foreignId('material_id')->constrained('materials');
            $table->integer('quantity')->notNull();
            $table->decimal('unit_price', 15, 2)->notNull();
            $table->decimal('line_total', 15, 2)->nullable();
            $table->timestamps();
        });
        DB::statement('ALTER TABLE purchase_items ADD CONSTRAINT purchase_item_valid CHECK(quantity > 0 AND unit_price > 0 AND line_total > 0)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_items');
    }
};
