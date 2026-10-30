<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductionMaterialUsage extends Model
{
    protected $fillable = [
        'production_order_id',
        'material_id',
        'planned_quantity',
        'actual_quantity',
        'unit_cost',
    ];

    protected function casts(): array
    {
        return [
            'planned_quantity' => 'decimal:2',
            'actual_quantity' => 'decimal:2',
            'unit_cost' => 'decimal:2',
        ];
    }

    public function productionOrder(): BelongsTo
    {
        return $this->belongsTo(ProductionOrder::class);
    }

    public function material(): BelongsTo
    {
        return $this->belongsTo(Material::class);
    }
}