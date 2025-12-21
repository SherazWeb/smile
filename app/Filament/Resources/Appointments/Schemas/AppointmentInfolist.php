<?php

namespace App\Filament\Resources\Appointments\Schemas;

use App\Models\Appointment;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class AppointmentInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('patient_name'),
                TextEntry::make('patient_email'),
                TextEntry::make('patient_phone'),
                TextEntry::make('age')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('gender')
                    ->placeholder('-'),
                TextEntry::make('service_id')
                    ->numeric(),
                TextEntry::make('appointment_date')
                    ->date(),
                TextEntry::make('appointment_time')
                    ->time(),
                TextEntry::make('notes')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('status'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
