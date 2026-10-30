<?php

namespace App\Filament\Resources\Employees\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class EmployeesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                ->searchable(),
                TextColumn::make('position')
                ->searchable(),
                ToggleColumn::make('gender')
                ->label('Gender')
                    ->onColor('success')
                    ->offColor('danger'),
                TextColumn::make('email')
                ->label('Email Address'),
                TextColumn::make('phone_number')
                ->label('Phone Number'),
                TextColumn::make('address')
                ->label('Address'),
                TextColumn::make('join_date')
                ->date('d/m/Y')
                ->label('Join Date'),
                TextColumn::make('end_date')
                ->date('d/m/Y')
                ->label('Leaving or Quit Date'),
                TextColumn::make('salary')
                    ->label('Gaji Pokok')
                    ->money('IDR')
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
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
