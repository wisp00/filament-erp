<?php

namespace App\Models;

use App\Models\Material;
use App\Models\ProductionOrder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductMaterial extends Model
{
    protected $fillable =
    [
        'production_order_id',
        'material_id',
        'planned_quantity',
        'actual_quantity',
        'unit_cost',
    ];

    protected function casts(): array{
        [
        'unit_cost'=> 'decimal:2',
        ];
    }

    public function productionOrders(): BelongsTo
    {
        return $this->belongsTo(ProductionOrder::class);
    }

    public function materials(): BelongsTo
    {
        return $this->belongsTo(Material::class);
    }
}
