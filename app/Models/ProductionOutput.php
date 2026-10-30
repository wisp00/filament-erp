<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductionOutput extends Model
{
    protected $fillable = [
        'production_order_id',
        'product_variant_id',
        'quantity',
        'defective_quantity',
        'produced_date',
    ];

    protected function casts(): array
    {
        return [
            'quantity' => 'integer',
            'defective_quantity' => 'integer',
            'produced_date' => 'date',
        ];
    }

    public function productionOrder(): BelongsTo
    {
        return $this->belongsTo(ProductionOrder::class);
    }

    public function productVariant(): BelongsTo
    {
        return $this->belongsTo(ProductVariant::class);
    }
}