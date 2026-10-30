<?php

namespace App\Filament\Resources\ProductionOrders\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProductionOrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('order_number')
                ->required()
                ->maxLength(20)
                ->placeholder('e.g ORD-001'),
                Select::make('product_id')
                ->label('Product Id')
                ->preload()
                ->relationship('product_id,'),
                Select::make('sale_id')
                ->label('Sale Id')
                ->preload()
                ->relationship('sale_id,'),
                TextInput::make('planned_quantity')
                ->required()
                ->placeholder('e.g 10'),
                DatePicker::make('start_date')
                ->required(),
                DatePicker::make('estimated_finish_date'),
                DatePicker::make('actual_finish_date'),
                TextInput::make('status')
                ->required()
                ->placeholder('e.g Potong'),
                TextInput::make('note'),
            ]);
    }
}
