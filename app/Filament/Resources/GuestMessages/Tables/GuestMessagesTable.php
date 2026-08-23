<?php

namespace App\Filament\Resources\GuestMessages\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Support\Collection;

class GuestMessagesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('guest.full_name')
                    ->label('Guest')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('status')
                    ->badge()
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'approved',
                        'danger'  => 'rejected',
                    ])
                    ->icons([
                        'heroicon-o-clock' => 'pending',
                        'heroicon-o-check-circle' => 'approved',
                        'heroicon-o-x-circle' => 'rejected',
                    ]),
                TextColumn::make('message')
                    ->label('Message')
                    ->limit(80)
                    ->wrap()
                    ->searchable(),
                TextColumn::make('star_number')
                    ->badge()
                    ->color('warning'),
                TextColumn::make('star_size')
                    ->formatStateUsing(fn($state) => match ($state) {

                        1 => '⭐',

                        2 => '⭐⭐',

                        3 => '⭐⭐⭐',

                        default => '-',
                    })
                    ->toggleable(isToggledHiddenByDefault: true),
                IconColumn::make('is_featured')
                    ->boolean(),
                TextColumn::make('approver.name')
                    ->label('Approved By')
                    ->placeholder('-'),
                TextColumn::make('approved_at')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('reviewed_at')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([

                SelectFilter::make('status')
                    ->options([

                        'pending' => 'Pending',

                        'approved' => 'Approved',

                        'rejected' => 'Rejected',

                    ]),

                TernaryFilter::make('is_featured'),

            ], layout: FiltersLayout::AboveContent)
            ->recordActions([

                ViewAction::make(),

                Action::make('approve')
                    ->label('Approve')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->visible(fn($record) => $record->status !== 'approved')
                    ->requiresConfirmation()
                    ->action(function ($record) {

                        $record->update([

                            'status' => 'approved',

                            'approved_by' => auth()->id(),

                            'approved_at' => now(),

                        ]);
                    }),

                Action::make('reject')
                    ->label('Reject')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->visible(fn($record) => $record->status !== 'rejected')
                    ->requiresConfirmation()
                    ->action(function ($record) {

                        $record->update([

                            'status' => 'rejected',

                        ]);
                    }),

                Action::make('feature')
                    ->label('Feature')
                    ->icon('heroicon-o-star')
                    ->color('warning')
                    ->action(fn($record) => $record->update([
                        'is_featured' => !$record->is_featured
                    ])),

                EditAction::make(),

            ])
            ->toolbarActions([
                BulkActionGroup::make([

                    BulkAction::make('approve')

                        ->icon('heroicon-o-check')

                        ->color('success')

                        ->requiresConfirmation()

                        ->action(
                            fn(Collection $records) =>

                            $records->each->update([

                                'status' => 'approved',

                                'approved_by' => auth()->id(),

                                'approved_at' => now(),

                            ])

                        ),

                    BulkAction::make('reject')

                        ->icon('heroicon-o-x-mark')

                        ->color('danger')

                        ->requiresConfirmation()

                        ->action(
                            fn(Collection $records) =>

                            $records->each->update([

                                'status' => 'rejected'

                            ])

                        ),

                    DeleteBulkAction::make(),

                ])
            ]);
    }
}
