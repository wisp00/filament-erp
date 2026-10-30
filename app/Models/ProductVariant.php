<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductVariant extends Model
{
    protected $fillable =[
        'product_id',
        'sku',
        'size',
        'color',
        'price',
        'current_stock',
        'avg_cost',
        'is_active',
    ];

    protected function casts(): array{
        [
        'price' => 'decimal:2',
        'current_stock' => 'integer',
        'avg_cost' => 'decimal:2',
        'is_active' => 'boolean',
        ];
    }   

    protected function effectivePrice(): Attribute
    {
        return Attribute::get(fn () => $this->price ?? $this->product?->base_price);
    }
    public function products(): BelongsTo
    {
        return $this ->BelongsTo(Product::class);
    }

    public function saleItems(): HasMany
    {
        return $this ->HasMany(SaleItem::class);
    }

    public function productionOutputs(): HasMany
    {
        return $this->HasMany(ProductionOutput::class);
    }
}


