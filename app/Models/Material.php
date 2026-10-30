<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Material extends Model
{
    protected $fillable = [
        'name',
        'code',
        'category',
        'material_type',
        'variety',
        'color',
        'gsm',
        'uom',
        'min_stock',
        'stock_on_hand',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'gsm' => 'integer',
            'min_stock' => 'decimal:2',
            'stock_on_hand' => 'decimal:2',
            'is_active' => 'boolean',
        ];
    }

    public function productMaterials(): HasMany
    {
        return $this->hasMany(ProductMaterial::class);
    }

    public function purchaseItems(): HasMany
    {
        return $this->hasMany(PurchaseItem::class);
    }

    public function productionMaterialUsages(): HasMany
    {
        return $this->hasMany(ProductionMaterialUsage::class);
    }
}