<?php

namespace App\Models;

use App\Models\PaymentAccount;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SalePayment extends Model
{
    protected $fillable = [
        'sale_id',
        'payment_account_id',
        'amount',
        'payment_date',
        'payment_type',
        'payment_method',
        'reference',
        'note'
    ];

    protected function casts() : array
    {
        return [
        'amount' => 'decimal:2',
        'payment_date' => 'date', 
        ];
    }

    public function sale() : BelongsTo
    {
        return $this->belongsTo(Sale::class); 
    }

    public function paymentAccount() : BelongsTo
    {
        return $this->belongsTo(PaymentAccount::class); 
    }


}
