<?php

namespace App\Filament\Resources\ProductCategories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProductCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                ->required()
                ->maxLength(255)
                ->label('nama')
                ->placeholder('e.g Kaos Pria'),
                TextInput::make('model')
                ->required()
                ->maxLength(255)
                ->label('model')
                ->placeholder('e.g Oversize Bordir'),
                TextInput::make('description')
                ->maxLength(255)
                ->columnSpanFull()
                ->placeholder('e.g Deskripsi'),
            ]);
    }
}
