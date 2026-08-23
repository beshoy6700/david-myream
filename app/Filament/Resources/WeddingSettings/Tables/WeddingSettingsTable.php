<?php

namespace App\Filament\Resources\WeddingSettings\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class WeddingSettingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('groom_name')
                    ->label('Groom')
                    ->searchable(),

                TextColumn::make('bride_name')
                    ->label('Bride')
                    ->searchable(),

                TextColumn::make('wedding_date')
                    ->dateTime('d M Y h:i A')
                    ->sortable(),

                TextColumn::make('church_name_ar')
                    ->label('Church'),

                TextColumn::make('reception_name_ar')
                    ->label('Reception')
                    ->placeholder('-'),

                IconColumn::make('enable_memory_sky')
                    ->label('Memory Sky')
                    ->boolean(),

                IconColumn::make('enable_ai_replies')
                    ->label('AI Replies')
                    ->boolean(),

            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->defaultSort('id');
    }
}