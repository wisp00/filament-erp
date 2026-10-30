<?php

namespace App\Filament\Resources\Customers\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class CustomerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->placeholder('e.g john duran')
                    ->maxLength(255)
                    ->columnSpanFull(),
                TextInput::make('address'),
                TextInput::make('phone_number')
                    ->label('Phone Number')
                    ->tel()
                    ->maxLength(20),
                TextInput::make('email')
                    ->label('email address')
                    ->email(),
                TextInput::make('contact_person'),
                Toggle::make('is_active')
                    ->label('Active Status')
                    ->default(true)
                    ->onColor('success')
                    ->offColor('danger')
                    ->columnSpanFull(),
            ]);
    }
}
