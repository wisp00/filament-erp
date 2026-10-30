<?php

namespace App\Filament\Resources\OperationalExpenses\Pages;

use App\Filament\Resources\OperationalExpenses\OperationalExpenseResource;
use Filament\Resources\Pages\CreateRecord;

class CreateOperationalExpense extends CreateRecord
{
    protected static string $resource = OperationalExpenseResource::class;
}
