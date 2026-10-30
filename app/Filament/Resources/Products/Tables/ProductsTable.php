<?php

namespace App\Filament\Resources\Products\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('product_category_id')
                ->label('Id Kategori'),
                TextColumn::make('name')
                ->label('Nama Product')
                ->searchable(),
                TextColumn::make('description'),
                TextColumn::make('base_price')
                ->label('Harga Pokok'),
                ToggleColumn::make('status')
                ->label('Status Aktif Barang')
                ->onColor('success')
                ->offColor('offColor'),
            ])
            ->filters([
                SelectFilter::make('name'),
                SelectFilter::make('status')
                    ->label('Status Aktif Barang')
                    ->options([
                        '1'=> 'Active',
                        '0'=>'Inactive',
                    ]),
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
