<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductionTask extends Model
{
    protected $fillable = [
        'production_order_id',
        'employee_id',
        'task_type',
        'quantity',
        'rate',
        'total_amount',
        'task_date',
        'payroll_id',
    ];

    protected function casts(): array
    {
        return [
            'quantity' => 'integer',
            'rate' => 'decimal:2',
            'total_amount' => 'decimal:2',
            'task_date' => 'date',
        ];
    }

    public function productionOrder(): BelongsTo
    {
        return $this->belongsTo(ProductionOrder::class);
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function payroll(): BelongsTo
    {
        return $this->belongsTo(Payroll::class);
    }
}