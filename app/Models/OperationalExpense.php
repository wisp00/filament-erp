<?php

namespace App\Models;

use App\Models\ChartOfAccount;
use App\Models\Employee;
use App\Models\PaymentAccount;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OperationalExpense extends Model
{
    protected $fillable = 
    [
        'expense_date',
        'account_id',
        'payment_account_id',
        'amount',
        'description',
        'receipt_path',
        'employee_id',
        'created_by,',
    ];

    protected function casts():array{
        return[
            'amount'=>'decimal:2',
            'expense_date'=>'datetime',
        ];
    }

    public function account():BelongsTo{
        return $this->belongsTo(ChartOfAccount::class);
    }

    public function payment():BelongsTo{
        return $this->belongsTo(PaymentAccount::class);
    }

    public function employee():BelongsTo{
        return $this->belongsTo(Employee::class);
    }

    public function creator():BelongsTo{
        return $this->belongsTo(User::class, 'created_by');
    }
}
