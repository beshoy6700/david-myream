<?php

namespace App\Filament\Resources\WeddingSettings\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class WeddingSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Wedding Information')
                    ->columns(3)
                    ->schema([

                        TextInput::make('groom_name')
                            ->label('Groom Name')
                            ->required(),

                        TextInput::make('bride_name')
                            ->label('Bride Name')
                            ->required(),

                        DateTimePicker::make('wedding_date')
                            ->label('Wedding Date')
                            ->required(),

                        FileUpload::make('cover_image')
                            ->image()
                            ->directory('wedding')
                            ->columnSpanFull(),

                    ]),

                Section::make('Church')
                    ->columns(2)
                    ->schema([

                        TextInput::make('church_name_ar')
                            ->required(),

                        TextInput::make('church_name_en'),

                        TextInput::make('church_maps_url')
                            ->url()
                            ->columnSpanFull(),

                        Textarea::make('church_address_ar')
                            ->columnSpanFull(),

                        Textarea::make('church_address_en')
                            ->columnSpanFull(),

                    ]),

                Section::make('Reception')
                    ->columns(2)
                    ->schema([

                        TextInput::make('reception_name_ar'),

                        TextInput::make('reception_name_en'),

                        TextInput::make('reception_maps_url')
                            ->url()
                            ->columnSpanFull(),

                        Textarea::make('reception_address_ar')
                            ->columnSpanFull(),

                        Textarea::make('reception_address_en')
                            ->columnSpanFull(),

                    ]),

                Section::make('Messages')
                    ->schema([

                        Textarea::make('welcome_message_ar')
                            ->rows(4)
                            ->columnSpanFull(),

                        Textarea::make('welcome_message_en')
                            ->rows(4)
                            ->columnSpanFull(),

                    ]),

                Section::make('Features')
                    ->columns(3)
                    ->schema([

                        TextInput::make('max_attendees_limit')
                            ->numeric()
                            ->required()
                            ->default(20),

                        Toggle::make('enable_memory_sky')
                            ->default(true),

                        Toggle::make('enable_ai_replies')
                            ->default(true),

                    ]),
            ]);
    }
}