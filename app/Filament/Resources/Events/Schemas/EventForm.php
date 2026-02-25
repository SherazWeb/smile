<?php

namespace App\Filament\Resources\Events\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TagsInput;
use Illuminate\Support\Str;
use Filament\Forms\Components\Select;

class EventForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                // Category (relationship)
                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),

                // Title
                TextInput::make('title')
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set, callable $get) {
                        if (!$get('slug')) {
                            $set('slug', Str::slug($state));
                        }
                    }),

                // Slug
                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true),

                // Description
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),

                // Location
                TextInput::make('location')
                    ->required(),

                // Dates
                DatePicker::make('event_date')
                    ->required(),

                DatePicker::make('event_end_date')
                    ->afterOrEqual('event_date'),

                // Main Image
                FileUpload::make('image_path')
                    ->image()
                    ->directory('events/main-images')
                    ->disk('public')
                    ->visibility('public'),

                // Gallery (MULTIPLE images) ⭐ FIXED
                FileUpload::make('gallery_folder')
                    ->label('Gallery Images')
                    ->multiple()
                    ->image()
                    ->directory('events/gallery')
                    ->disk('public')
                    ->visibility('public')
                    ->reorderable()
                    ->appendFiles()
                    ->columnSpanFull(),

                // Participants count
                TextInput::make('participant_count')
                    ->numeric()
                    ->minValue(0),

                // Participant unit
                Select::make('participant_unit')
                    ->options([
                        'participants' => 'Participants',
                        'students' => 'Students',
                        'people' => 'People',
                        'attendees' => 'Attendees',
                        'companies' => 'Companies',
                    ])
                    ->default('participants')
                    ->required(),

                // Tags ⭐ FIXED
                TagsInput::make('tags')
                    ->columnSpanFull(),

                // Badge
                TextInput::make('badge_text')
                    ->required()
                    ->placeholder('Workshop, Seminar, Free Camp'),

            ]);
    }
}
