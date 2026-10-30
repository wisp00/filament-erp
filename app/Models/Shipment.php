<?php

namespace App\Models;

use App\Models\Sale;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Shipment extends Model
{
    protected $fillable =
    [
        'sale_id',
        'trackin_number',
        'expedition_name',
        'shipped_date',
        'arrival_date',
        'shipping_cost',
        'status',
        'note',
    ];

    protected function casts(): array
    {
        return[
            'shipped_date' => 'date',
            'arrival_date' => 'date',
        ];
    }

    public function sale() : BelongsTo
    {
        return $this->belongsTo(Sale::class);
    }
}
