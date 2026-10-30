<?php

namespace App\Filament\Resources\Employees\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class EmployeeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->placeholder('e.g John Dukun')
                    ->maxLength(255)
                    ->columnSpanFull(),
                TextInput::make('position')
                    ->required()
                    ->placeholder('e.g Mandor Konveksi')
                    ->maxLength(255),
                Toggle::make('gender')
                    ->default(true)
                    ->onColor('succes')
                    ->offColor('danger'),
                TextInput::make('email')
                    ->label('email address')
                    ->placeholder('e.g email@gmail.com')
                    ->email(),
                TextInput::make('phone_number')
                    ->label('Phone Number')
                    ->tel()
                    ->placeholder('e.g +62 85271352926')
                    ->maxLength(20),
                TextInput::make('address')
                    ->placeholder('e.g Tebet, Jakarta Barat')
                    ->maxLength(255),
                DatePicker::make('join_date')
                    ->required(),
                DatePicker::make('end_date'),
                TextInput::make('salary')
                    ->required()
                    ->prefix('Rp. ')
                    ->placeholder('2000000'),
                Toggle::make('is_active')
                    ->label('Active Status')
                    ->default(true)
                    ->onColor('success')
                    ->offColor('danger')
                    ->columnSpanFull(),
            ]);
    }
}
