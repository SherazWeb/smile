<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // Service Name
                TextInput::make('name')
                    ->label('Service Name')
                    ->required()
                    ->maxLength(255)
                    ->reactive(), // allows slug auto-update if needed

                // Description
                Textarea::make('description')
                    ->label('Description')
                    ->rows(4)
                    ->nullable(),

                // Duration in minutes
                TextInput::make('duration_minutes')
                    ->label('Duration (minutes)')
                    ->numeric()
                    ->required()
                    ->default(60),

                // Active toggle
                Toggle::make('is_active')
                    ->label('Active')
                    ->default(true),
            ]);
    }
}
