<?php

namespace App\Models;

use App\Models\ProductVariant;
use App\Models\Sale;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SaleItem extends Model
{
    protected $fillable = [
        'sale_id',
        'product_variant_id',
        'quantity',
        'unit_price',
        'discount',
        'line_total',
    ];

    protected function casts(): array{
        [
            'unit_price' => 'decimal:2',
            'discount'=>'decimal:2',
            'line_total' => 'decimal:2',
        ];
         
    }
    public function sales():HasMany
    {
        return $this->hasMany(Sale::class);
    }

    public function sale(): BelongsTo
    {
        return $this->belongsTo(Sale::class);
    }
        
    public function productVariant():BelongsTo
    {
        return $this->belongsTo(ProductVariant::class);
    }

}
