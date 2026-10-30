<?php

namespace App\Filament\Resources\ProductionOrders\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProductionOrdersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order_number')
                ->sortable()
                ->searchable(),
                TextColumn::make('product_id')
                ->sortable()
                ->searchable(),
                TextColumn::make('sale_id')
                ->sortable()
                ->searchable(),
                TextColumn::make('planned_quantity')
                ->label('Kuantitas'),
                TextColumn::make('start_Date')
                ->date('d/m/Y'),
                TextColumn::make('estimated_finish_date')
                ->date('d/m/Y'),
                TextColumn::make('actual_finish_date')
                ->date('d/m/Y'),
                TextColumn::make('status')
                ->sortable()
                ->searchable(),

            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
