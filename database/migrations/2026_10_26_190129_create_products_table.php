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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->dropForeignId(['product_categories_id']);
            $table->renameColumn('product_categories_id', 'product_category_id');
            $table->foreignId('product_category_id')->reference('id')->on('product_category')->constrained('product_category');
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('base_price', 15, 2)->default(0);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products', function (Blueprint $table) {
            $table->dropForeign(['product_category_id']);
            $table->renameColumn('product_category_id', 'product_categories_id');
            $table->foreign('product_categories_id')->references('id')->on('product_categories');
        });
    }
};
