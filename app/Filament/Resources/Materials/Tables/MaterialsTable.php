<?php

namespace App\Filament\Resources\Materials\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class MaterialsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                 TextColumn::make('code')
                ->label('Kode Bahan')
                ->searchable(),
                TextColumn::make('category')
                ->label('Kategori Bahan')
                ->searchable(),
                TextColumn::make('material_type')
                ->label('Tipe Material'),
                TextColumn::make('Variety')
                ->label('Variasi'),
                TextColumn::make('color')
                ->label('Warna'),
                TextColumn::make('gsm')
                ->label('GSM / Gramasi'),
                TextColumn::make('uom')
                ->label('Tipe Pengukur'),
                TextColumn::make('min_stock')
                ->label('Minimal Stok')
                ->numeric(decimalPlaces:2),
                TextColumn::make('stock_on_hand')
                ->label('Stok Tersedia')
                ->numeric(decimalPlaces:2),
                ToggleColumn::make('is_active')
                ->label('Active Status')
                ->onColor('success')
                ->offColor('danger'),
                TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('code'),
                SelectFilter::make('category'),
                SelectFilter::make('position'),
                SelectFilter::make('is_active')
                    ->label('Active Status')
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
