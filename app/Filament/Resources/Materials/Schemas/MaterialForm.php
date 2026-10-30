<?php

namespace App\Filament\Resources\Materials\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class MaterialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                 TextInput::make('name')
                    ->placeholder('e.g Combed 24s')
                    ->maxLength(255)
                    ->columnSpanFull(),
                TextInput::make('code')
                    ->required()
                    ->placeholder('e.g COMB001')
                    ->maxLength(12),
                TextInput::make('category')
                    ->required()
                    ->placeholder('e.g Cotton')
                    ->maxLength(50),
                TextInput::make('material_type')
                    ->label('Material Type')
                    ->placeholder('e.g 24S')
                    ->required(),
                TextInput::make('variety')
                    ->label('Variety')
                    ->placeholder('e.g Polos')
                    ->maxLength(50),
                TextInput::make('color')
                    ->label('Warna')
                    ->placeholder('e.g Cokelat Tua')
                    ->maxLength(50),
                TextInput::make('gsm')
                    ->placeholder('e.g 300'),
                TextInput::make('uom')
                    ->placeholder('e.g gram'),
                TextInput::make('min_stock')
                    ->required(),
                TextInput::make('stock_on_hand'),
                Toggle::make('is_active')
                    ->label('Active Status')
                    ->default(true)
                    ->onColor('success')
                    ->offColor('danger')
                    ->columnSpanFull(),
            ]);
    }
}
