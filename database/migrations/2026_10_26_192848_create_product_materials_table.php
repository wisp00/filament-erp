<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_materials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products');
            $table->foreignId('material_id')->constrained('materials');
            $table->decimal('quantity_per_unit', 15, 2)->default(0);
            $table->string('note')->nullable();
            $table->timestamps();
        });
        DB::statement('ALTER TABLE product_materials ADD CONSTRAINT quantity_per_unit_non_negative CHECK (quantity_per_unit >= 0)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_materials');
    }
};
