<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductionOrder extends Model
{
    protected $fillable = [
        'order_number',
        'product_id',
        'sale_id',
        'planned_quantity',
        'start_date',
        'estimated_finish_date',
        'actual_finish_date',
        'status',
        'created_by',
        'note',
    ];

    protected function casts(): array
    {
        return [
            'order_number' => 'integer',
            'planned_quantity' => 'integer',
            'start_date' => 'date',
            'estimated_finish_date' => 'date',
            'actual_finish_date' => 'date',
        ];
    }

    public function products(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function sales(): BelongsTo
    {
        return $this->belongsTo(Sale::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function materialUsages(): HasMany
    {
        return $this->hasMany(ProductionMaterialUsage::class);
    }

    public function outputs(): HasMany
    {
        return $this->hasMany(ProductionOutput::class);
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(ProductionTask::class);
    }

    public function costs(): HasMany
    {
        return $this->hasMany(ProductionCost::class);
    }
}