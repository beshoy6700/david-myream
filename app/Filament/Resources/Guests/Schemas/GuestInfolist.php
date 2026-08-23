<?php

namespace App\Filament\Resources\Guests\Schemas;

use App\Models\Guest;
use Filament\Infolists\Components\IconEntry;
use Filament\Schemas\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class GuestInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Guest Information')
                    ->schema([
                        TextEntry::make('guest_title')
                            ->badge(),

                        TextEntry::make('full_name'),

                        TextEntry::make('greeting_name')
                            ->placeholder('-'),

                        TextEntry::make('sky_name')
                            ->placeholder('-'),

                        TextEntry::make('phone')
                            ->placeholder('-'),

                        TextEntry::make('gender')
                            ->badge()
                            ->placeholder('-'),
                    ])
                    ->columns(2),

                Section::make('Classification')
                    ->schema([
                        TextEntry::make('guest_group')
                            ->badge(),

                        TextEntry::make('guest_source')
                            ->badge(),

                        TextEntry::make('invitedBy.name')
                            ->label('Added By')
                            ->placeholder('-'),
                    ])
                    ->columns(3),

                Section::make('Invitation')
                    ->schema([
                        IconEntry::make('has_reception_invitation')
                            ->label('Reception Invitation')
                            ->boolean(),

                        IconEntry::make('is_public')
                            ->label('Public Guest')
                            ->boolean(),
                    ])
                    ->columns(2),

                Section::make('Notes')
                    ->schema([
                        TextEntry::make('notes')
                            ->placeholder('-'),
                    ]),

                Section::make('System Information')
                    ->schema([
                        TextEntry::make('created_at')
                            ->dateTime(),

                        TextEntry::make('updated_at')
                            ->dateTime(),

                        TextEntry::make('deleted_at')
                            ->dateTime()
                            ->visible(fn(Guest $record) => $record->trashed()),
                    ])
                    ->columns(3),
            ]);
    }
}