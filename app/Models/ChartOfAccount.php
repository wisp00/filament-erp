<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ChartOfAccount extends Model
{
    protected $fillable = [
        'parent_account_id',
        'code',
        'name',
        'type',
        'normal_balance',
        'is_postable',
        'is_active',
        'description',
    ];

    protected function casts(): array
    {
        return [
            'is_postable' => 'boolean',
            'is_active' => 'boolean',
        ];
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(ChartOfAccount::class, 'parent_account_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(ChartOfAccount::class, 'parent_account_id');
    }

    public function paymentAccounts(): HasMany
    {
        // Column name matches the migration as written (typo: "accoun").
        return $this->hasMany(PaymentAccount::class, 'chart_of_accoun_id');
    }

    public function journalLines(): HasMany
    {
        return $this->hasMany(JournalLine::class, 'account_id');
    }

    public function operationalExpenses(): HasMany
    {
        return $this->hasMany(OperationalExpense::class, 'account_id');
    }
}