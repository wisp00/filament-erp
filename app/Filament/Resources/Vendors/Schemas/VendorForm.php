<?php

namespace App\Filament\Resources\Vendors\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class VendorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('address'),
                TextInput::make('phone_Number'),
                TextInput::make('email')
                    ->label('Email address')
                    ->email(),
                TextInput::make('contact_person')
                    ->required(),
            ]);
    }
}
