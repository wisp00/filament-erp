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
        Schema::create('product_variants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products');
            $table->string('sku')->unique();
            $table->string('size');
            $table->string('color');
            $table->decimal('price', 15, 2)->nullable(); //use base price from product table if price is null
            $table->integer('current_stock')->default(0); //cahce of stock movement or just use static stock
            $table->decimal('avg_cost', 15, 2)->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
        });
        DB::statement('ALTER TABLE product_variants ADD CONSTRAINT variant_stock_non_negative CHECK (current_stock >= 0 )');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_variants');
    }
};
