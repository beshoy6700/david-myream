<?php

namespace App\Filament\Resources\WeddingSettings\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class WeddingSettingInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('groom_name'),
                TextEntry::make('bride_name'),
                TextEntry::make('wedding_date')
                    ->dateTime(),
                TextEntry::make('church_name_ar'),
                TextEntry::make('church_name_en')
                    ->placeholder('-'),
                TextEntry::make('church_address_ar')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('church_address_en')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('church_maps_url')
                    ->placeholder('-'),
                TextEntry::make('reception_name_ar')
                    ->placeholder('-'),
                TextEntry::make('reception_name_en')
                    ->placeholder('-'),
                TextEntry::make('reception_address_ar')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('reception_address_en')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('reception_maps_url')
                    ->placeholder('-'),
                TextEntry::make('max_attendees_limit')
                    ->numeric(),
                IconEntry::make('enable_memory_sky')
                    ->boolean(),
                IconEntry::make('enable_ai_replies')
                    ->boolean(),
                TextEntry::make('welcome_message_ar')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('welcome_message_en')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
