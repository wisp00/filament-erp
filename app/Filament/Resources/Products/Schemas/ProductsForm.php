<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ProductsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('product_category_id')
                ->label('Id Category')
                ->relationship('product_category_id,'),
                TextInput::make('name')
                ->required()
                ->maxLength(50),
                TextInput::make('description')
                ->maxLength(255),
                TextInput::make('base_price')
                ->required()
                ->prefix('Rp. '),
                Toggle::make('status')
                ->default(true)
                ->onColor('success')
                ->offColor('danger'),
            ]);
    }
}
