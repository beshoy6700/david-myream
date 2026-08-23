<?php

namespace App\Filament\Resources\GuestMessages\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class GuestMessageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('guest_id')
                    ->relationship('guest', 'id')
                    ->required(),
                Textarea::make('message')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('ai_reply')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('status')
                    ->required()
                    ->default('pending'),
                TextInput::make('star_number')
                    ->numeric()
                    ->default(null),
                TextInput::make('star_size')
                    ->required()
                    ->numeric()
                    ->default(1),
                Toggle::make('is_featured')
                    ->required(),
                TextInput::make('approved_by')
                    ->numeric()
                    ->default(null),
                DateTimePicker::make('approved_at'),
                DateTimePicker::make('reviewed_at'),
            ]);
    }
}
