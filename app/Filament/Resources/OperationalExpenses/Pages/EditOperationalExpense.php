<?php

namespace App\Filament\Resources\OperationalExpenses\Pages;

use App\Filament\Resources\OperationalExpenses\OperationalExpenseResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditOperationalExpense extends EditRecord
{
    protected static string $resource = OperationalExpenseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
