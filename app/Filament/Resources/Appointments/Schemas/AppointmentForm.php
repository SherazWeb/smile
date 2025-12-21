<?php

namespace App\Filament\Resources\Appointments\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TimePicker;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;

class AppointmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('patient_name')
                    ->required(),
                TextInput::make('patient_email')
                    ->email()
                    ->required(),
                TextInput::make('patient_phone')
                    ->tel()
                    ->required(),
                TextInput::make('age')
                    ->numeric(),
                TextInput::make('gender'),
                TextInput::make('service_id')
                    ->required()
                    ->numeric(),
                DatePicker::make('appointment_date')
                    ->required(),
                TimePicker::make('appointment_time')
                    ->required(),
                Textarea::make('notes')
                    ->columnSpanFull(),
                Select::make('status')
                    ->options([
                        'pending'   => 'Pending',
                        'confirmed' => 'Confirmed',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ])
                    ->default('pending')
                    ->required(),
            ]);
    }
}
