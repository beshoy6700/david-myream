<?php

namespace App\Filament\Resources\Guests\Schemas;

use App\Enums\GenderEnum;
use App\Enums\GuestGroupEnum;
use App\Enums\GuestSourceEnum;
use App\Enums\GuestTitleEnum;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class GuestForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Guest Information')
                    ->schema([
                        Select::make('guest_title')
                            ->label('Title')
                            ->options(GuestTitleEnum::options())
                            ->searchable(),

                        TextInput::make('full_name')
                            ->label('Full Name')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('greeting_name')
                            ->label('Greeting Name')
                            ->helperText('Leave empty to generate automatically.')
                            ->maxLength(255),

                        TextInput::make('sky_name')
                            ->label('Sky Name')
                            ->helperText('Leave empty to generate automatically.')
                            ->maxLength(255),

                        TextInput::make('phone')
                            ->label('Phone')
                            ->tel()
                            ->maxLength(20),
                    ])
                    ->columns(2),

                Section::make('Classification')
                    ->schema([
                        Select::make('gender')
                            ->options(GenderEnum::options())
                            ->searchable(),

                        Select::make('guest_group')
                            ->required()
                            ->options(GuestGroupEnum::options())
                            ->default(GuestGroupEnum::PUBLIC),

                        Select::make('guest_source')
                            ->required()
                            ->options(GuestSourceEnum::options())
                            ->default(GuestSourceEnum::David),
                    ])
                    ->columns(3),

                Section::make('Invitation')
                    ->schema([
                        Toggle::make('has_reception_invitation')
                            ->label('Reception Invitation')
                            ->default(false),

                        Toggle::make('is_public')
                            ->label('Public Guest')
                            ->default(false),
                    ])
                    ->columns(2),

                Section::make('Notes')
                    ->schema([
                        Textarea::make('notes')
                            ->rows(4)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
