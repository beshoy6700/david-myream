<?php

namespace App\Filament\Resources\Guests\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Actions\Action as SchemaAction;
use Filament\Schemas\Components\Text;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class GuestsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')

            ->columns([
                TextColumn::make('full_name')
                    ->label('Guest')
                    ->description(fn($record) => $record->guest_title?->value)
                    ->searchable()
                    ->sortable(),

                TextColumn::make('phone')
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('gender')
                    ->badge()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('guest_group')
                    ->badge()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('guest_source')
                    ->badge()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                IconColumn::make('has_reception_invitation')
                    ->label('Reception')
                    ->boolean(),

                IconColumn::make('is_public')
                    ->label('Public')
                    ->boolean()
                    ->toggleable(isToggledHiddenByDefault: true),

                IconColumn::make('invitationLink.opened_at')
                    ->label('Opened')
                    ->boolean(fn($state) => filled($state)),

                TextColumn::make('invitationLink.visits_count')
                    ->label('Visits')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('rsvp.status')
                    ->label('RSVP')
                    ->badge()
                    ->placeholder('Pending'),

                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])

            ->filters([
                TrashedFilter::make(),
            ])

            ->recordActions([

                Action::make('copy')
                    ->label('نسخ رسالة الدعوة')
                    ->icon('heroicon-o-clipboard-document')
                    ->action(function ($record) {

                        Notification::make()
                            ->title('تم تجهيز الرسالة')
                            ->body('يمكنك نسخها من النافذة التالية.')
                            ->success()
                            ->send();
                    })

                    ->modalHeading('رسالة الدعوة')

                    ->modalContent(fn($record) => new \Illuminate\Support\HtmlString("
        <textarea
            onclick='this.select();navigator.clipboard.writeText(this.value)'
            readonly
            style='width:100%;height:240px;padding:15px;border-radius:12px'
        >{$record->whatsapp_message}</textarea>
    "))

                    ->modalSubmitAction(false)

                    ->modalCancelActionLabel('إغلاق'),

                Action::make('whatsapp')
                    ->label('واتساب')
                    ->icon('heroicon-o-chat-bubble-left-right')
                    ->color('success')
                    ->url(function ($record) {

                        $phone = preg_replace('/\D/', '', $record->phone);

                        if (str_starts_with($phone, '01')) {
                            $phone = '2' . $phone;
                        }

                        return 'https://wa.me/' . $phone .
                            '?text=' . rawurlencode(
                                mb_convert_encoding(
                                    $record->whatsapp_message,
                                    'UTF-8',
                                    'UTF-8'
                                )
                            );
                    })
                    ->openUrlInNewTab(),

                Action::make('openInvitation')
                    ->label('فتح الدعوة')
                    ->icon('heroicon-o-arrow-top-right-on-square')
                    ->url(
                        fn($record) => $record->invitation_url,
                        shouldOpenInNewTab: true
                    ),

                ViewAction::make(),

                EditAction::make(),

            ])

            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
